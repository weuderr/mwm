<?php
/**
 * Arquivo para testar se o mod_rewrite está funcionando
 */

// Definir uma URL de teste
$test_url = 'test_rewrite_target';

// Gerar um token único para esta sessão
$token = md5(uniqid(rand(), true));

// Salvar o token em um arquivo temporário
file_put_contents('rewrite_test_token.txt', $token);

// Exibir a página HTML
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste de Rewrite</title>
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
        pre {
            background-color: #f5f5f5;
            padding: 10px;
            border-radius: 4px;
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Teste de URL Rewriting</h1>
        
        <div class="test-box">
            <h2>Informações do Teste</h2>
            <p>Este teste verifica se o mod_rewrite do Apache está funcionando corretamente.</p>
            <p>Token de teste: <code><?php echo $token; ?></code></p>
            <p>URL de teste: <code><?php echo $test_url; ?></code></p>
            
            <h3>Como funciona:</h3>
            <ol>
                <li>Um token único foi gerado e salvo em um arquivo temporário.</li>
                <li>Ao clicar no botão abaixo, uma requisição AJAX será feita para uma URL amigável.</li>
                <li>Se o mod_rewrite estiver funcionando, a requisição será redirecionada para o arquivo correto.</li>
                <li>O resultado será exibido abaixo.</li>
            </ol>
            
            <button id="testButton">Testar mod_rewrite</button>
            
            <div id="result" style="margin-top: 20px; display: none;">
                <h3>Resultado:</h3>
                <div id="resultContent"></div>
            </div>
        </div>
        
        <div class="test-box">
            <h2>Configuração do .htaccess</h2>
            <p>Verifique se seu arquivo .htaccess contém as seguintes regras:</p>
            <pre>
RewriteEngine On
RewriteBase /

# Regra para o teste de rewrite
RewriteRule ^test_rewrite_target$ rewrite_test_target.php [L]

# Regras gerais para o MVC
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [QSA,L]
            </pre>
        </div>
    </div>
    
    <script>
        document.getElementById('testButton').addEventListener('click', function() {
            var resultDiv = document.getElementById('result');
            var resultContent = document.getElementById('resultContent');
            
            resultDiv.style.display = 'block';
            resultContent.innerHTML = '<p>Testando...</p>';
            
            fetch('<?php echo $test_url; ?>')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro na resposta: ' + response.status);
                    }
                    return response.text();
                })
                .then(data => {
                    if (data.includes('<?php echo $token; ?>')) {
                        resultContent.innerHTML = '<p class="success">✅ O mod_rewrite está funcionando corretamente!</p>' +
                            '<p>A URL amigável foi redirecionada com sucesso para o arquivo alvo.</p>' +
                            '<p>Resposta recebida:</p>' +
                            '<pre>' + data + '</pre>';
                    } else {
                        resultContent.innerHTML = '<p class="error">❌ O mod_rewrite parece estar funcionando, mas o token não corresponde.</p>' +
                            '<p>Isso pode indicar um problema na configuração.</p>' +
                            '<p>Resposta recebida:</p>' +
                            '<pre>' + data + '</pre>';
                    }
                })
                .catch(error => {
                    resultContent.innerHTML = '<p class="error">❌ Erro ao testar o mod_rewrite:</p>' +
                        '<p>' + error.message + '</p>' +
                        '<p>Possíveis causas:</p>' +
                        '<ul>' +
                        '<li>O mod_rewrite não está habilitado</li>' +
                        '<li>As regras no .htaccess estão incorretas</li>' +
                        '<li>O arquivo .htaccess não está sendo lido (AllowOverride)</li>' +
                        '</ul>';
                });
        });
    </script>
</body>
</html> 