<?php
/**
 * Arquivo alvo para o teste de rewrite
 * Este arquivo é acessado através da URL amigável 'test_rewrite_target'
 */

// Verificar se o arquivo de token existe
if (file_exists('rewrite_test_token.txt')) {
    // Ler o token
    $token = file_get_contents('rewrite_test_token.txt');
    
    // Exibir o resultado
    echo "REWRITE_TEST_SUCCESS\n";
    echo "Token: $token\n";
    echo "Timestamp: " . date('Y-m-d H:i:s') . "\n";
    echo "Este arquivo foi acessado através de uma URL amigável, o que indica que o mod_rewrite está funcionando corretamente.";
} else {
    // Se o arquivo de token não existir
    echo "REWRITE_TEST_ERROR\n";
    echo "O arquivo de token não foi encontrado. Isso pode indicar que o teste não foi iniciado corretamente.";
} 