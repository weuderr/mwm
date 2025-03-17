<?php
/**
 * Classe ContactController
 * Responsável por gerenciar a página de contato e o envio de formulários
 */
class ContactController extends Controller
{
    private $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
    }

    /**
     * Página de contato
     */
    public function index()
    {
        $this->render('contato');
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
        
        // Salvar no banco de dados
        $data = [
            'nome' => $nome,
            'email' => $email,
            'telefone' => $telefone,
            'servico' => $servico,
            'mensagem' => $mensagem
        ];

        if ($this->contactModel->save($data)) {
            set_flash_message('success', 'Mensagem enviada com sucesso! Em breve entraremos em contato.');
        } else {
            set_flash_message('error', 'Erro ao enviar mensagem. Por favor, tente novamente.');
        }

        redirect(base_url('contato'));
    }
} 