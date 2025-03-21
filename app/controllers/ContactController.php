<?php
/**
 * Classe ContactController
 * Responsável por gerenciar a página de contato e o envio de formulários
 */
class ContactController extends Controller
{
    private $contactModel;
    private $metaPixel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
        $this->metaPixel = new MetaPixelHelper();
    }

    /**
     * Página de contato
     */
    public function index()
    {
        $this->render('contato');
    }
    
    /**
     * Salva parcialmente os dados de contato quando o usuário avança no formulário
     */
    public function savePartial()
    {
        // Verificar se é uma requisição POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Método não permitido']);
            exit;
        }
        
        // Verificar token CSRF se estiver disponível
        if (isset($_POST['csrf_token']) && !csrf_check($_POST['csrf_token'])) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Erro de segurança']);
            exit;
        }
        
        // Obter dados do POST
        $nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $telefone = isset($_POST['telefone']) ? trim($_POST['telefone']) : '';
        $servico = isset($_POST['servicoInteresse']) ? trim($_POST['servicoInteresse']) : '';
        
        // Validar campos mínimos necessários
        if (empty($nome) || empty($email) || empty($servico)) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Dados incompletos']);
            exit;
        }
        
        // Validar formato de e-mail
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'E-mail inválido']);
            exit;
        }
        
        // Salvar no banco de dados
        $data = [
            'nome' => $nome,
            'email' => $email,
            'telefone' => $telefone,
            'servico' => $servico,
            'mensagem' => '', // Será preenchido depois
            'prefere_whatsapp' => isset($_POST['contatoWhatsapp']) ? 1 : 0
        ];
        
        $contactId = $this->contactModel->save($data);
        
        if ($contactId) {
            // Se houver ID de sessão, armazenar para vincular com a submissão final
            session_start();
            $_SESSION['partial_contact_id'] = $contactId;
            
            // Enviar evento de conversão parcial para o Meta Pixel
            $userData = [
                'em' => $this->metaPixel->hash($email),
                'ph' => $this->metaPixel->hash(preg_replace('/[^0-9]/', '', $telefone)),
                'fn' => $this->metaPixel->hash($nome)
            ];

            $customData = [
                'content_name' => 'Dados de Contato Parcial',
                'status' => 'partial_lead',
                'service_type' => $servico
            ];

            // Enviar evento Lead parcial
            $this->metaPixel->sendEvent('InitiateCheckout', $userData, $customData);
            
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => 'Dados salvos parcialmente']);
            exit;
        } else {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Erro ao salvar dados']);
            exit;
        }
    }
    
    /**
     * Processa o envio do formulário de contato
     */
    public function send()
    {
        // Verificar se é uma requisição POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect(base_url('contato'));
        }
        
        // Verificar token CSRF
        if (!isset($_POST['csrf_token']) || !csrf_check($_POST['csrf_token'])) {
            set_flash_message('error', 'Erro de segurança. Por favor, tente novamente.');
            redirect(base_url('contato'));
        }
        
        // Validar campos obrigatórios
        $nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $telefone = isset($_POST['telefone']) ? trim($_POST['telefone']) : '';
        $servico = isset($_POST['servicoInteresse']) ? trim($_POST['servicoInteresse']) : '';
        $mensagem = isset($_POST['mensagem']) ? trim($_POST['mensagem']) : '';
        $prazo = isset($_POST['prazo']) ? trim($_POST['prazo']) : '';
        $prefere_whatsapp = isset($_POST['contatoWhatsapp']) ? 1 : 0;
        
        $errors = [];
        
        if (empty($nome)) {
            $errors[] = 'O nome é obrigatório.';
        }
        
        if (empty($email)) {
            $errors[] = 'O e-mail é obrigatório.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'O e-mail informado é inválido.';
        }
        
        if (empty($servico)) {
            $errors[] = 'O serviço de interesse é obrigatório.';
        }
        
        // Se houver erros, redirecionar de volta para o formulário
        if (!empty($errors)) {
            set_flash_message('error', implode('<br>', $errors));
            redirect(base_url('contato'));
        }
        
        // Verificar se já existe um contato parcial salvo na sessão
        session_start();
        $contactId = isset($_SESSION['partial_contact_id']) ? $_SESSION['partial_contact_id'] : null;
        
        // Dados completos do contato
        $data = [
            'nome' => $nome,
            'email' => $email,
            'telefone' => $telefone,
            'servico' => $servico,
            'mensagem' => $mensagem,
            'prazo_projeto' => $prazo,
            'prefere_whatsapp' => $prefere_whatsapp
        ];
        
        $success = false;
        
        if ($contactId) {
            // Atualizar contato existente
            $success = $this->contactModel->update($contactId, $data);
            unset($_SESSION['partial_contact_id']);
        } else {
            // Criar novo contato
            $success = $this->contactModel->save($data);
        }

        if ($success) {
            // Enviar evento de conversão para o Meta Pixel
            $userData = [
                'em' => $this->metaPixel->hash($email), // Email hash
                'ph' => $this->metaPixel->hash(preg_replace('/[^0-9]/', '', $telefone)), // Phone hash
                'fn' => $this->metaPixel->hash($nome) // First name hash
            ];

            $customData = [
                'currency' => 'BRL',
                'service_type' => $servico,
                'content_name' => 'Formulário de Contato'
            ];

            // Enviar evento Lead
            $this->metaPixel->sendEvent('Lead', $userData, $customData);

            set_flash_message('success', 'Mensagem enviada com sucesso! Em breve entraremos em contato.');
        } else {
            set_flash_message('error', 'Erro ao enviar mensagem. Por favor, tente novamente.');
        }

        redirect(base_url('contato'));
    }
} 