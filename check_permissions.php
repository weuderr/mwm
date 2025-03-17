<?php
/**
 * Script para verificar e corrigir permissões de arquivos e diretórios
 */

// Definir constantes
define('ROOT_PATH', __DIR__);

// Função para verificar e corrigir permissões
function checkAndFixPermissions($path, $dirPermission = 0755, $filePermission = 0644) {
    echo "Verificando: $path<br>";
    
    if (!file_exists($path)) {
        echo "Erro: O caminho $path não existe.<br>";
        return;
    }
    
    // Verificar se é um diretório
    if (is_dir($path)) {
        // Corrigir permissão do diretório
        chmod($path, $dirPermission);
        echo "Permissão do diretório $path definida para " . decoct($dirPermission) . "<br>";
        
        // Obter conteúdo do diretório
        $files = scandir($path);
        
        foreach ($files as $file) {
            if ($file != '.' && $file != '..') {
                $fullPath = $path . '/' . $file;
                checkAndFixPermissions($fullPath, $dirPermission, $filePermission);
            }
        }
    } else {
        // Corrigir permissão do arquivo
        chmod($path, $filePermission);
        echo "Permissão do arquivo $path definida para " . decoct($filePermission) . "<br>";
    }
}

// Verificar e corrigir permissões do diretório raiz
echo "<h1>Verificando e corrigindo permissões</h1>";
checkAndFixPermissions(ROOT_PATH);
echo "<h2>Concluído!</h2>";

// Verificar se o arquivo .htaccess existe e tem o conteúdo correto
echo "<h1>Verificando arquivo .htaccess</h1>";
$htaccessPath = ROOT_PATH . '/.htaccess';

if (file_exists($htaccessPath)) {
    echo "O arquivo .htaccess existe.<br>";
    
    // Verificar permissões
    $perms = fileperms($htaccessPath);
    echo "Permissões atuais: " . decoct($perms & 0777) . "<br>";
    
    // Corrigir permissões se necessário
    if (($perms & 0777) != 0644) {
        chmod($htaccessPath, 0644);
        echo "Permissões do .htaccess corrigidas para 0644.<br>";
    }
} else {
    echo "Erro: O arquivo .htaccess não existe.<br>";
}

// Verificar configuração do PHP
echo "<h1>Informações do PHP</h1>";
echo "Versão do PHP: " . phpversion() . "<br>";
echo "Módulos carregados:<br>";
echo "<pre>";
print_r(get_loaded_extensions());
echo "</pre>";

// Verificar configurações do servidor
echo "<h1>Informações do Servidor</h1>";
echo "Software do servidor: " . $_SERVER['SERVER_SOFTWARE'] . "<br>";
echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "<br>";
echo "Script Filename: " . $_SERVER['SCRIPT_FILENAME'] . "<br>";

// Verificar se o mod_rewrite está habilitado
if (function_exists('apache_get_modules')) {
    $modules = apache_get_modules();
    $mod_rewrite = in_array('mod_rewrite', $modules);
    echo "mod_rewrite está " . ($mod_rewrite ? "habilitado" : "desabilitado") . "<br>";
} else {
    echo "Não foi possível verificar se o mod_rewrite está habilitado.<br>";
} 