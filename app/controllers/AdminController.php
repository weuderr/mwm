<?php

class AdminController extends Controller
{
    private $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
        $this->checkAuth();
    }

    private function checkAuth()
    {
        // Ignorar verificação na página de login
        if (isset($_GET['url']) && $_GET['url'] === 'admin/login') {
            return;
        }

        // Verificar se está logado
        if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
            redirect(base_url('admin/login'));
        }
    }

    public function login()
    {
        // Se já estiver logado, redirecionar para o dashboard
        if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
            redirect(base_url('admin/dashboard'));
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = isset($_POST['username']) ? trim($_POST['username']) : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            if ($username === ADMIN_USER && password_verify($password, ADMIN_PASS)) {
                $_SESSION['admin_logged_in'] = true;
                redirect(base_url('admin/dashboard'));
            } else {
                set_flash_message('error', 'Usuário ou senha inválidos');
            }
        }

        $this->renderPartial('admin/login');
    }

    public function dashboard()
    {
        $contacts = $this->contactModel->getAll();
        $this->renderAdmin('admin/dashboard', ['contacts' => $contacts]);
    }

    public function logout()
    {
        unset($_SESSION['admin_logged_in']);
        session_destroy();
        redirect(base_url('admin/login'));
    }

    public function deleteContact()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $id = (int)$_POST['id'];
            if ($this->contactModel->delete($id)) {
                set_flash_message('success', 'Contato excluído com sucesso');
            } else {
                set_flash_message('error', 'Erro ao excluir contato');
            }
        }
        redirect(base_url('admin/dashboard'));
    }

    public function updateContact()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

            $data = [
                'nome' => isset($_POST['nome']) ? trim($_POST['nome']) : '',
                'email' => isset($_POST['email']) ? trim($_POST['email']) : '',
                'telefone' => isset($_POST['telefone']) ? trim($_POST['telefone']) : '',
                'servico' => isset($_POST['servico']) ? trim($_POST['servico']) : '',
                'mensagem' => isset($_POST['mensagem']) ? trim($_POST['mensagem']) : '',
                'observacao' => isset($_POST['observacao']) ? trim($_POST['observacao']) : ''
            ];

            // Validar campos obrigatórios
            if (empty($data['nome']) || empty($data['email']) || empty($data['telefone']) || empty($data['servico'])) {
                set_flash_message('error', 'Todos os campos obrigatórios devem ser preenchidos');
                redirect(base_url('admin/dashboard'));
                return;
            }

            // Validar e-mail
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                set_flash_message('error', 'O e-mail informado é inválido');
                redirect(base_url('admin/dashboard'));
                return;
            }

            if ($this->contactModel->update($id, $data)) {
                set_flash_message('success', 'Contato atualizado com sucesso');
            } else {
                set_flash_message('error', 'Erro ao atualizar contato');
            }
        }
        redirect(base_url('admin/dashboard'));
    }
}
