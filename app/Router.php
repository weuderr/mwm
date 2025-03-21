<?php
/**
 * Classe Router
 * Responsável pelo roteamento da aplicação
 */
class Router
{
    /**
     * Rotas registradas
     * @var array
     */
    private $routes = [];

    /**
     * Construtor
     */
    public function __construct()
    {
        // Registrar rotas padrão
        $this->registerRoutes();
    }

    /**
     * Registra as rotas da aplicação
     */
    private function registerRoutes()
    {
        // Página inicial
        $this->routes[''] = [
            'controller' => 'HomeController',
            'action' => 'index'
        ];
        
        $this->routes['home'] = [
            'controller' => 'HomeController',
            'action' => 'index'
        ];
        
        // Página sobre
        $this->routes['sobre'] = [
            'controller' => 'HomeController',
            'action' => 'sobre'
        ];
        
        // Página serviços
        $this->routes['servicos'] = [
            'controller' => 'HomeController',
            'action' => 'servicos'
        ];
        
        // Página portfólio
        $this->routes['portfolio'] = [
            'controller' => 'HomeController',
            'action' => 'portfolio'
        ];
        
        // Página contato
        $this->routes['contato'] = [
            'controller' => 'ContactController',
            'action' => 'index'
        ];
        
        // Envio de formulário de contato
        $this->routes['enviar-contato'] = [
            'controller' => 'ContactController',
            'action' => 'send'
        ];
        
        // Salvar contato parcial (AJAX)
        $this->routes['salvar-contato-parcial'] = [
            'controller' => 'ContactController',
            'action' => 'savePartial'
        ];

        // Rotas administrativas
        $this->routes['admin/login'] = [
            'controller' => 'AdminController',
            'action' => 'login'
        ];

        $this->routes['admin/dashboard'] = [
            'controller' => 'AdminController',
            'action' => 'dashboard'
        ];

        $this->routes['admin/logout'] = [
            'controller' => 'AdminController',
            'action' => 'logout'
        ];

        $this->routes['admin/delete-contact'] = [
            'controller' => 'AdminController',
            'action' => 'deleteContact'
        ];

        $this->routes['admin/update-contact'] = [
            'controller' => 'AdminController',
            'action' => 'updateContact'
        ];
    }

    /**
     * Despacha a requisição para o controller apropriado
     */
    public function dispatch()
    {
        // Obter a URL atual
        $url = isset($_GET['url']) ? $_GET['url'] : '';
        $url = rtrim($url, '/');
        
        // Verificar se a rota existe
        if (array_key_exists($url, $this->routes)) {
            $route = $this->routes[$url];
            $controller = $route['controller'];
            $action = $route['action'];
            
            // Instanciar o controller
            $controllerInstance = new $controller();
            
            // Chamar a ação
            if (method_exists($controllerInstance, $action)) {
                $controllerInstance->$action();
            } else {
                $this->notFound();
            }
        } else {
            $this->notFound();
        }
    }

    /**
     * Exibe a página 404
     */
    private function notFound()
    {
        header("HTTP/1.0 404 Not Found");
        include VIEWS_PATH . '/pages/404.php';
        exit;
    }
} 