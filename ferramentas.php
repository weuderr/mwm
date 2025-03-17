<?php
/**
 * Página de índice para as ferramentas de diagnóstico
 * ATENÇÃO: Este arquivo deve ser removido em ambiente de produção por questões de segurança
 */
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferramentas de Diagnóstico - MWM Softwares</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #f5f5f5;
        }
        header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
        }
        h1 {
            margin: 0;
        }
        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        .warning {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #f5c6cb;
        }
        .tools {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .tool-card {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .tool-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .tool-card h2 {
            margin-top: 0;
            color: #2c3e50;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }
        .tool-card p {
            margin-bottom: 20px;
        }
        .tool-card a {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .tool-card a:hover {
            background-color: #2980b9;
        }
        footer {
            text-align: center;
            padding: 20px;
            margin-top: 20px;
            background-color: #f9f9f9;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <header>
        <h1>Ferramentas de Diagnóstico - MWM Softwares</h1>
    </header>
    
    <div class="container">
        <div class="warning">
            <strong>Atenção!</strong> Estas ferramentas são destinadas apenas para diagnóstico e devem ser removidas em ambiente de produção por questões de segurança.
        </div>
        
        <h2>Ferramentas Disponíveis</h2>
        <p>Utilize as ferramentas abaixo para diagnosticar problemas no seu site:</p>
        
        <div class="tools">
            <div class="tool-card">
                <h2>Diagnóstico Completo</h2>
                <p>Realiza uma verificação completa do sistema, identificando possíveis problemas de configuração.</p>
                <a href="diagnostico.php">Executar Diagnóstico</a>
            </div>
            
            <div class="tool-card">
                <h2>Teste Básico</h2>
                <p>Verifica informações básicas do servidor, PHP e permissões de diretórios.</p>
                <a href="test.php">Executar Teste</a>
            </div>
            
            <div class="tool-card">
                <h2>Teste de URL Rewriting</h2>
                <p>Verifica se o mod_rewrite está funcionando corretamente para URLs amigáveis.</p>
                <a href="test_rewrite.php">Testar Rewrite</a>
            </div>
            
            <div class="tool-card">
                <h2>Informações do PHP</h2>
                <p>Exibe informações detalhadas sobre a configuração do PHP no servidor.</p>
                <a href="phpinfo.php">Ver PHP Info</a>
            </div>
            
            <div class="tool-card">
                <h2>Teste de Banco de Dados</h2>
                <p>Verifica a conexão com o banco de dados e permite testar diferentes configurações.</p>
                <a href="test_db.php">Testar Banco de Dados</a>
            </div>
            
            <div class="tool-card">
                <h2>Verificação de Permissões</h2>
                <p>Verifica e corrige as permissões de arquivos e diretórios do projeto.</p>
                <a href="check_permissions.php">Verificar Permissões</a>
            </div>
        </div>
        
        <div style="margin-top: 30px;">
            <h2>Como Usar</h2>
            <ol>
                <li>Execute o <strong>Diagnóstico Completo</strong> para identificar possíveis problemas.</li>
                <li>Se encontrar problemas específicos, utilize as ferramentas individuais para investigar mais a fundo.</li>
                <li>Após resolver os problemas, execute novamente o diagnóstico para confirmar que tudo está funcionando corretamente.</li>
                <li><strong>Importante:</strong> Remova todas estas ferramentas antes de colocar o site em produção.</li>
            </ol>
        </div>
    </div>
    
    <footer>
        <p>&copy; <?php echo date('Y'); ?> MWM Softwares - Ferramentas de Diagnóstico</p>
    </footer>
</body>
</html> 