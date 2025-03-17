<?php
/**
 * Classe Autoloader
 * Responsável por carregar automaticamente as classes do sistema
 */
class Autoloader
{
    /**
     * Registra o autoloader
     */
    public function register()
    {
        spl_autoload_register([$this, 'loadClass']);
    }

    /**
     * Carrega uma classe
     * 
     * @param string $className Nome da classe a ser carregada
     * @return bool
     */
    private function loadClass($className)
    {
        // Mapeamento de namespaces para diretórios
        $directories = [
            'Controller' => CONTROLLERS_PATH,
            'Model' => MODELS_PATH,
            'Helper' => HELPERS_PATH
        ];

        // Verifica se a classe pertence a algum dos namespaces conhecidos
        foreach ($directories as $namespace => $directory) {
            if (strpos($className, $namespace) !== false) {
                $classFile = $directory . '/' . $className . '.php';
                if (file_exists($classFile)) {
                    require_once $classFile;
                    return true;
                }
            }
        }

        // Tenta carregar a classe diretamente
        $classFile = APP_PATH . '/' . $className . '.php';
        if (file_exists($classFile)) {
            require_once $classFile;
            return true;
        }

        return false;
    }
} 