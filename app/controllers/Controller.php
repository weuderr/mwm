<?php
/**
 * Classe Controller
 * Classe base para todos os controllers
 */
class Controller
{
    /**
     * Renderiza uma view
     * 
     * @param string $view Nome da view a ser renderizada
     * @param array $data Dados a serem passados para a view
     * @return void
     */
    protected function render($view, $data = [])
    {
        // Extrair os dados para que fiquem disponíveis na view
        extract($data);
        
        // Incluir o cabeçalho
        include VIEWS_PATH . '/templates/header.php';
        
        // Incluir a view
        include VIEWS_PATH . '/pages/' . $view . '.php';
        
        // Incluir o rodapé
        include VIEWS_PATH . '/templates/footer.php';
    }
    
    /**
     * Renderiza uma view com o template administrativo
     * 
     * @param string $view Nome da view a ser renderizada
     * @param array $data Dados a serem passados para a view
     * @return void
     */
    protected function renderAdmin($view, $data = [])
    {
        // Extrair os dados para que fiquem disponíveis na view
        extract($data);
        
        // Incluir o layout administrativo
        include VIEWS_PATH . '/templates/admin_layout.php';
    }
    
    /**
     * Renderiza uma view sem o template
     * 
     * @param string $view Nome da view a ser renderizada
     * @param array $data Dados a serem passados para a view
     * @return void
     */
    protected function renderPartial($view, $data = [])
    {
        // Extrair os dados para que fiquem disponíveis na view
        extract($data);
        
        // Incluir a view
        include VIEWS_PATH . '/pages/' . $view . '.php';
    }
    
    /**
     * Retorna uma resposta JSON
     * 
     * @param array $data Dados a serem retornados como JSON
     * @return void
     */
    protected function json($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
} 