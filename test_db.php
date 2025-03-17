<?php
/**
 * Arquivo para testar a conexão com o banco de dados
 * ATENÇÃO: Este arquivo deve ser removido em ambiente de produção por questões de segurança
 */

// Definir constantes de conexão (substitua pelos valores corretos)
define('DB_HOST', 'localhost');
define('DB_NAME', 'nome_do_banco');
define('DB_USER', 'usuario');
define('DB_PASS', 'senha');

// Exibir a página HTML
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste de Conexão com Banco de Dados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h1 {
            color: #2c3e50;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .test-box {
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
        .error {
            color: #e74c3c;
            font-weight: bold;
        }
        pre {
            background-color: #f5f5f5;
            padding: 10px;
            border-radius: 4px;
            overflow-x: auto;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Teste de Conexão com Banco de Dados</h1>
        
        <div class="test-box">
            <h2>Configuração Atual</h2>
            <p>Host: <code><?php echo DB_HOST; ?></code></p>
            <p>Banco de Dados: <code><?php echo DB_NAME; ?></code></p>
            <p>Usuário: <code><?php echo DB_USER; ?></code></p>
            <p>Senha: <code>********</code></p>
            
            <h3>Resultado do Teste:</h3>
            <?php
            try {
                // Tentar conectar ao banco de dados
                $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
                
                // Definir o modo de erro para exceção
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                // Exibir mensagem de sucesso
                echo '<p class="success">✅ Conexão estabelecida com sucesso!</p>';
                
                // Verificar versão do MySQL
                $stmt = $conn->query('SELECT version()');
                $version = $stmt->fetchColumn();
                echo '<p>Versão do MySQL: ' . $version . '</p>';
                
                // Listar tabelas
                $stmt = $conn->query('SHOW TABLES');
                $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
                
                if (count($tables) > 0) {
                    echo '<h3>Tabelas encontradas:</h3>';
                    echo '<ul>';
                    foreach ($tables as $table) {
                        echo '<li>' . $table . '</li>';
                    }
                    echo '</ul>';
                } else {
                    echo '<p>Nenhuma tabela encontrada no banco de dados.</p>';
                }
            } catch(PDOException $e) {
                // Exibir mensagem de erro
                echo '<p class="error">❌ Erro na conexão: ' . $e->getMessage() . '</p>';
                echo '<p>Verifique se:</p>';
                echo '<ul>';
                echo '<li>O servidor MySQL está em execução</li>';
                echo '<li>As credenciais estão corretas</li>';
                echo '<li>O banco de dados existe</li>';
                echo '<li>O usuário tem permissão para acessar o banco de dados</li>';
                echo '</ul>';
            }
            ?>
        </div>
        
        <div class="test-box">
            <h2>Testar Outra Configuração</h2>
            <form method="post" action="">
                <label for="host">Host:</label>
                <input type="text" id="host" name="host" value="<?php echo DB_HOST; ?>">
                
                <label for="dbname">Nome do Banco de Dados:</label>
                <input type="text" id="dbname" name="dbname" value="<?php echo DB_NAME; ?>">
                
                <label for="user">Usuário:</label>
                <input type="text" id="user" name="user" value="<?php echo DB_USER; ?>">
                
                <label for="pass">Senha:</label>
                <input type="password" id="pass" name="pass" value="">
                
                <button type="submit" name="test">Testar Conexão</button>
            </form>
            
            <?php
            // Verificar se o formulário foi enviado
            if (isset($_POST['test'])) {
                // Obter os valores do formulário
                $host = $_POST['host'];
                $dbname = $_POST['dbname'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                
                echo '<h3>Resultado do Teste:</h3>';
                
                try {
                    // Tentar conectar ao banco de dados
                    $conn = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $user, $pass);
                    
                    // Definir o modo de erro para exceção
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    // Exibir mensagem de sucesso
                    echo '<p class="success">✅ Conexão estabelecida com sucesso!</p>';
                    echo '<p>A configuração está correta. Você pode atualizar o arquivo de configuração com estes valores.</p>';
                } catch(PDOException $e) {
                    // Exibir mensagem de erro
                    echo '<p class="error">❌ Erro na conexão: ' . $e->getMessage() . '</p>';
                }
            }
            ?>
        </div>
        
        <div class="test-box">
            <h2>Exemplo de Configuração</h2>
            <p>Adicione o seguinte código ao seu arquivo de configuração:</p>
            <pre>
// Configuração do Banco de Dados
define('DB_HOST', 'localhost');
define('DB_NAME', 'nome_do_banco');
define('DB_USER', 'usuario');
define('DB_PASS', 'senha');
            </pre>
        </div>
    </div>
</body>
</html> 