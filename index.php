<?php
/**
 * Arquivo principal de entrada da aplicação
 * MWM Softwares - Site Institucional
 */

// Definir constantes do sistema
define('ROOT_PATH', __DIR__);
define('APP_PATH', ROOT_PATH . '/app');
define('CONFIG_PATH', APP_PATH . '/config');
define('CONTROLLERS_PATH', APP_PATH . '/controllers');
define('MODELS_PATH', APP_PATH . '/models');
define('VIEWS_PATH', APP_PATH . '/views');
define('HELPERS_PATH', APP_PATH . '/helpers');
define('ASSETS_PATH', ROOT_PATH . '/assets');

// Carregar configurações
require_once CONFIG_PATH . '/config.php';

// Carregar autoloader
require_once HELPERS_PATH . '/Autoloader.php';
$autoloader = new Autoloader();
$autoloader->register();

// Carregar helper de funções
require_once HELPERS_PATH . '/functions.php';

// Iniciar sessão
session_start();

// Inicializar o roteador
$router = new Router();
$router->dispatch(); 