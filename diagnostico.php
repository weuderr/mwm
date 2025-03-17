<?php
/**
 * Página de diagnóstico para identificar problemas comuns
 * ATENÇÃO: Este arquivo deve ser removido em ambiente de produção por questões de segurança
 */

// Função para verificar se um módulo está carregado
function check_module($module) {
    if (function_exists('apache_get_modules')) {
        $modules = apache_get_modules();
        return in_array($module, $modules);
    } else {
        return false;
    }
}

// Função para verificar se uma extensão PHP está carregada
function check_extension($extension) {
    return extension_loaded($extension);
}

// Função para verificar permissões de diretório
function check_directory_permissions($dir) {
    if (!file_exists($dir)) {
        return [
            'exists' => false,
            'readable' => false,
            'writable' => false,
            'permissions' => 'N/A'
        ];
    }
    
    return [
        'exists' => true,
        'readable' => is_readable($dir),
        'writable' => is_writable($dir),
        'permissions' => decoct(fileperms($dir) & 0777)
    ];
}

// Função para verificar se o arquivo .htaccess está funcionando
function check_htaccess() {
    $htaccess_file = '.htaccess';
    $htaccess_exists = file_exists($htaccess_file);
    $htaccess_readable = $htaccess_exists && is_readable($htaccess_file);
    
    return [
        'exists' => $htaccess_exists,
        'readable' => $htaccess_readable,
        'content' => $htaccess_readable ? file_get_contents($htaccess_file) : null
    ];
}

// Função para verificar a configuração do PHP
function check_php_config() {
    return [
        'version' => phpversion(),
        'display_errors' => ini_get('display_errors'),
        'error_reporting' => ini_get('error_reporting'),
        'max_execution_time' => ini_get('max_execution_time'),
        'memory_limit' => ini_get('memory_limit'),
        'post_max_size' => ini_get('post_max_size'),
        'upload_max_filesize' => ini_get('upload_max_filesize'),
        'date.timezone' => ini_get('date.timezone')
    ];
}

// Função para verificar o servidor web
function check_web_server() {
    return [
        'software' => $_SERVER['SERVER_SOFTWARE'] ?? 'Desconhecido',
        'document_root' => $_SERVER['DOCUMENT_ROOT'] ?? 'Desconhecido',
        'server_name' => $_SERVER['SERVER_NAME'] ?? 'Desconhecido',
        'server_addr' => $_SERVER['SERVER_ADDR'] ?? 'Desconhecido',
        'server_port' => $_SERVER['SERVER_PORT'] ?? 'Desconhecido',
        'request_uri' => $_SERVER['REQUEST_URI'] ?? 'Desconhecido',
        'script_filename' => $_SERVER['SCRIPT_FILENAME'] ?? 'Desconhecido'
    ];
}

// Realizar verificações
$modules = [
    'mod_rewrite' => check_module('mod_rewrite'),
    'mod_headers' => check_module('mod_headers'),
    'mod_expires' => check_module('mod_expires'),
    'mod_deflate' => check_module('mod_deflate')
];

$extensions = [
    'pdo' => check_extension('pdo'),
    'pdo_mysql' => check_extension('pdo_mysql'),
    'mbstring' => check_extension('mbstring'),
    'json' => check_extension('json'),
    'gd' => check_extension('gd'),
    'curl' => check_extension('curl')
];

$directories = [
    '.' => check_directory_permissions('.'),
    'app' => check_directory_permissions('app'),
    'assets' => check_directory_permissions('assets')
];

$htaccess = check_htaccess();
$php_config = check_php_config();
$web_server = check_web_server();

// Verificar problemas comuns
$issues = [];

if (!$modules['mod_rewrite']) {
    $issues[] = 'O módulo mod_rewrite não está habilitado. Este módulo é necessário para as URLs amigáveis funcionarem.';
}

if (!$extensions['pdo'] || !$extensions['pdo_mysql']) {
    $issues[] = 'As extensões PDO e/ou PDO_MySQL não estão habilitadas. Estas extensões são necessárias para a conexão com o banco de dados.';
}

if (!$htaccess['exists']) {
    $issues[] = 'O arquivo .htaccess não existe. Este arquivo é necessário para as URLs amigáveis funcionarem.';
}

foreach ($directories as $dir => $perms) {
    if (!$perms['exists']) {
        $issues[] = "O diretório '$dir' não existe.";
    } elseif (!$perms['readable']) {
        $issues[] = "O diretório '$dir' não tem permissão de leitura.";
    } elseif (!$perms['writable']) {
        $issues[] = "O diretório '$dir' não tem permissão de escrita.";
    }
}

// Exibir a página HTML
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnóstico do Sistema</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h1, h2, h3 {
            color: #2c3e50;
        }
        h1 {
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
        }
        .section {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .success {
            color: #27ae60;
            font-weight: bold;
        }
        .warning {
            color: #f39c12;
            font-weight: bold;
        }
        .error {
            color: #e74c3c;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        pre {
            background-color: #f5f5f5;
            padding: 10px;
            border-radius: 4px;
            overflow-x: auto;
            max-height: 300px;
        }
        .tools {
            margin-top: 20px;
        }
        .tools a {
            display: inline-block;
            margin-right: 10px;
            background-color: #3498db;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 4px;
        }
        .tools a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Diagnóstico do Sistema</h1>
        
        <?php if (!empty($issues)): ?>
        <div class="section">
            <h2>Problemas Encontrados</h2>
            <ul class="error">
                <?php foreach ($issues as $issue): ?>
                <li><?php echo $issue; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php else: ?>
        <div class="section">
            <h2 class="success">Nenhum problema crítico encontrado!</h2>
            <p>O sistema parece estar configurado corretamente.</p>
        </div>
        <?php endif; ?>
        
        <div class="section">
            <h2>Módulos do Apache</h2>
            <table>
                <tr>
                    <th>Módulo</th>
                    <th>Status</th>
                </tr>
                <?php foreach ($modules as $module => $enabled): ?>
                <tr>
                    <td><?php echo $module; ?></td>
                    <td class="<?php echo $enabled ? 'success' : 'error'; ?>">
                        <?php echo $enabled ? 'Habilitado' : 'Desabilitado'; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        
        <div class="section">
            <h2>Extensões do PHP</h2>
            <table>
                <tr>
                    <th>Extensão</th>
                    <th>Status</th>
                </tr>
                <?php foreach ($extensions as $extension => $enabled): ?>
                <tr>
                    <td><?php echo $extension; ?></td>
                    <td class="<?php echo $enabled ? 'success' : 'error'; ?>">
                        <?php echo $enabled ? 'Habilitada' : 'Desabilitada'; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        
        <div class="section">
            <h2>Permissões de Diretórios</h2>
            <table>
                <tr>
                    <th>Diretório</th>
                    <th>Existe</th>
                    <th>Permissões</th>
                    <th>Leitura</th>
                    <th>Escrita</th>
                </tr>
                <?php foreach ($directories as $dir => $perms): ?>
                <tr>
                    <td><?php echo $dir; ?></td>
                    <td class="<?php echo $perms['exists'] ? 'success' : 'error'; ?>">
                        <?php echo $perms['exists'] ? 'Sim' : 'Não'; ?>
                    </td>
                    <td><?php echo $perms['permissions']; ?></td>
                    <td class="<?php echo $perms['readable'] ? 'success' : 'error'; ?>">
                        <?php echo $perms['readable'] ? 'Sim' : 'Não'; ?>
                    </td>
                    <td class="<?php echo $perms['writable'] ? 'success' : 'error'; ?>">
                        <?php echo $perms['writable'] ? 'Sim' : 'Não'; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        
        <div class="section">
            <h2>Arquivo .htaccess</h2>
            <?php if ($htaccess['exists']): ?>
                <p class="success">O arquivo .htaccess existe.</p>
                <?php if ($htaccess['readable']): ?>
                    <h3>Conteúdo do arquivo:</h3>
                    <pre><?php echo htmlspecialchars($htaccess['content']); ?></pre>
                <?php else: ?>
                    <p class="error">O arquivo .htaccess não é legível.</p>
                <?php endif; ?>
            <?php else: ?>
                <p class="error">O arquivo .htaccess não existe.</p>
            <?php endif; ?>
        </div>
        
        <div class="section">
            <h2>Configuração do PHP</h2>
            <table>
                <tr>
                    <th>Configuração</th>
                    <th>Valor</th>
                </tr>
                <?php foreach ($php_config as $key => $value): ?>
                <tr>
                    <td><?php echo $key; ?></td>
                    <td><?php echo $value; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        
        <div class="section">
            <h2>Informações do Servidor Web</h2>
            <table>
                <tr>
                    <th>Configuração</th>
                    <th>Valor</th>
                </tr>
                <?php foreach ($web_server as $key => $value): ?>
                <tr>
                    <td><?php echo $key; ?></td>
                    <td><?php echo $value; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        
        <div class="section tools">
            <h2>Ferramentas Adicionais</h2>
            <a href="test.php">Teste Básico</a>
            <a href="test_rewrite.php">Teste de Rewrite</a>
            <a href="phpinfo.php">PHP Info</a>
            <a href="test_db.php">Teste de Banco de Dados</a>
            <a href="check_permissions.php">Verificar Permissões</a>
        </div>
    </div>
</body>
</html> 