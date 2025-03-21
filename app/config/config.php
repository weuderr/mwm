<?php
/**
 * Arquivo de configuração da aplicação
 */

// Configurações de ambiente
define('ENVIRONMENT', 'production'); // development, production

// Detectar URL base automaticamente
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
define('BASE_URL', $protocol . $host);

define('SITE_NAME', 'MWM Softwares');

// Configurações do Meta Pixel
define('META_ACCESS_TOKEN', 'EAAIxaPg8WxQBOwiv3xoZBME9cRDHIpO2GmkodeS3xlFEjG9UnodePUWh2tTq1yKQUKve33wFenNIx45ZAUgCUc1KVJ3zo4eUOW0TioqEIrU0vSPXnFiRob08jCE1ZA9BP5Tnw4OwBDS9MvMfZATTwdNXd4Ahs5CX0ZCZANrXx3I37AGknNla4KzzasteHMPeF5cgZDZD');
define('META_PIXEL_ID', '1097174152174144'); // Adicione seu Pixel ID aqui

// Configurações do SQLite
$tmpDir = sys_get_temp_dir();
define('DB_FILE', $tmpDir . '/mwm_site.db');

// Configurações do Admin
define('ADMIN_USER', 'admin');
define('ADMIN_PASS', password_hash('admin123', PASSWORD_DEFAULT)); // Senha padrão: admin123

// Configurações de banco de dados (se necessário)
define('DB_HOST', 'localhost');
define('DB_NAME', 'mwm_site');
define('DB_USER', 'root');
define('DB_PASS', '');

// Configurações de e-mail
define('MAIL_HOST', 'langlearners.com');
define('MAIL_PORT', 587);
define('MAIL_USER', 'not-replay@langlearners.com');
define('MAIL_PASS', 'HlG6VN3jDXJnEW3');
define('MAIL_FROM', 'mwmechnology@gmail.com');
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
