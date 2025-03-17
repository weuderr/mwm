<?php
/**
 * Arquivo de teste para verificar o funcionamento do servidor
 */

// Informações básicas
echo "<h1>Teste de Funcionamento do Servidor</h1>";
echo "<p>Se você está vendo esta página, o PHP está funcionando corretamente.</p>";

// Verificar versão do PHP
echo "<h2>Informações do PHP</h2>";
echo "<p>Versão do PHP: " . phpversion() . "</p>";

// Verificar configurações do servidor
echo "<h2>Informações do Servidor</h2>";
echo "<p>Software do servidor: " . $_SERVER['SERVER_SOFTWARE'] . "</p>";
echo "<p>Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "</p>";
echo "<p>Script Filename: " . $_SERVER['SCRIPT_FILENAME'] . "</p>";
echo "<p>Request URI: " . $_SERVER['REQUEST_URI'] . "</p>";

// Verificar se o mod_rewrite está habilitado
echo "<h2>Módulos do Apache</h2>";
if (function_exists('apache_get_modules')) {
    $modules = apache_get_modules();
    echo "<p>mod_rewrite está " . (in_array('mod_rewrite', $modules) ? "habilitado" : "desabilitado") . "</p>";
    
    // Listar todos os módulos
    echo "<p>Módulos carregados:</p>";
    echo "<ul>";
    foreach ($modules as $module) {
        echo "<li>$module</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Não foi possível verificar os módulos do Apache.</p>";
}

// Verificar permissões do diretório
echo "<h2>Permissões de Diretórios</h2>";
$directories = [
    '.' => 'Diretório atual',
    'app' => 'Diretório app',
    'assets' => 'Diretório assets',
    'assets/css' => 'Diretório CSS',
    'assets/js' => 'Diretório JS',
    'assets/img' => 'Diretório imagens'
];

echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Diretório</th><th>Existe</th><th>Permissões</th><th>Leitura</th><th>Escrita</th></tr>";

foreach ($directories as $dir => $desc) {
    echo "<tr>";
    echo "<td>$desc ($dir)</td>";
    
    // Verificar se o diretório existe
    $exists = is_dir($dir);
    echo "<td>" . ($exists ? "Sim" : "Não") . "</td>";
    
    if ($exists) {
        // Verificar permissões
        $perms = fileperms($dir);
        echo "<td>" . decoct($perms & 0777) . "</td>";
        
        // Verificar se é legível
        echo "<td>" . (is_readable($dir) ? "Sim" : "Não") . "</td>";
        
        // Verificar se é gravável
        echo "<td>" . (is_writable($dir) ? "Sim" : "Não") . "</td>";
    } else {
        echo "<td colspan='3'>N/A</td>";
    }
    
    echo "</tr>";
}

echo "</table>";

// Verificar arquivo .htaccess
echo "<h2>Arquivo .htaccess</h2>";
$htaccess = '.htaccess';
if (file_exists($htaccess)) {
    $perms = fileperms($htaccess);
    echo "<p>O arquivo .htaccess existe com permissões " . decoct($perms & 0777) . ".</p>";
    
    // Verificar se é legível
    if (is_readable($htaccess)) {
        echo "<p>O arquivo .htaccess é legível.</p>";
    } else {
        echo "<p>O arquivo .htaccess não é legível.</p>";
    }
} else {
    echo "<p>O arquivo .htaccess não existe.</p>";
}

// Testar conexão com o banco de dados (se configurado)
echo "<h2>Teste de Conexão com o Banco de Dados</h2>";
if (defined('DB_HOST') && defined('DB_NAME') && defined('DB_USER') && defined('DB_PASS')) {
    try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<p>Conexão com o banco de dados estabelecida com sucesso!</p>";
    } catch(PDOException $e) {
        echo "<p>Erro na conexão com o banco de dados: " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p>Constantes de banco de dados não definidas.</p>";
}

// Verificar constantes definidas
echo "<h2>Constantes Definidas</h2>";
$constants = [
    'ROOT_PATH', 'APP_PATH', 'CONFIG_PATH', 'CONTROLLERS_PATH', 
    'MODELS_PATH', 'VIEWS_PATH', 'HELPERS_PATH', 'ASSETS_PATH',
    'BASE_URL', 'SITE_NAME', 'ENVIRONMENT'
];

echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Constante</th><th>Definida</th><th>Valor</th></tr>";

foreach ($constants as $constant) {
    echo "<tr>";
    echo "<td>$constant</td>";
    
    // Verificar se a constante está definida
    $defined = defined($constant);
    echo "<td>" . ($defined ? "Sim" : "Não") . "</td>";
    
    // Mostrar o valor se estiver definida
    if ($defined) {
        echo "<td>" . constant($constant) . "</td>";
    } else {
        echo "<td>N/A</td>";
    }
    
    echo "</tr>";
}

echo "</table>";

// Incluir link para o arquivo de verificação de permissões
echo "<h2>Ferramentas Adicionais</h2>";
echo "<p><a href='check_permissions.php'>Verificar e Corrigir Permissões</a></p>"; 