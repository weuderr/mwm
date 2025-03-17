<?php
/**
 * Arquivo de configuração da aplicação
 */

// Configurações de ambiente
define('ENVIRONMENT', 'development'); // development, production
define('BASE_URL', 'http://localhost/mwm');
define('SITE_NAME', 'MWM Softwares');

// Configurações de banco de dados (se necessário)
define('DB_HOST', 'localhost');
define('DB_NAME', 'mwm_site');
define('DB_USER', 'root');
define('DB_PASS', '');

// Configurações de e-mail
define('MAIL_HOST', 'smtp.example.com');
define('MAIL_PORT', 587);
define('MAIL_USER', 'contato@mwmsoftwares.com');
define('MAIL_PASS', 'sua_senha');
define('MAIL_FROM', 'contato@mwmsoftwares.com');
define('MAIL_FROM_NAME', 'MWM Softwares');

// Configurações de segurança
define('HASH_COST', 10); // Custo do bcrypt

// Configurações de erro
if (ENVIRONMENT === 'development') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
} 