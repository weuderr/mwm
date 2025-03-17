<?php
/**
 * Arquivo de funções auxiliares
 */

/**
 * Redireciona para uma URL
 * 
 * @param string $url URL para redirecionamento
 * @return void
 */
function redirect($url)
{
    header('Location: ' . $url);
    exit;
}

/**
 * Retorna a URL base do site
 * 
 * @param string $path Caminho a ser adicionado à URL base
 * @return string
 */
function base_url($path = '')
{
    return BASE_URL . '/' . ltrim($path, '/');
}

/**
 * Retorna a URL para um asset
 * 
 * @param string $path Caminho do asset
 * @return string
 */
function asset_url($path)
{
    return base_url('assets/' . ltrim($path, '/'));
}

/**
 * Escapa HTML para evitar XSS
 * 
 * @param string $string String a ser escapada
 * @return string
 */
function escape($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

/**
 * Gera um token CSRF
 * 
 * @return string
 */
function csrf_token()
{
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Verifica se um token CSRF é válido
 * 
 * @param string $token Token a ser verificado
 * @return bool
 */
function csrf_check($token)
{
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Exibe uma mensagem flash
 * 
 * @param string $type Tipo da mensagem (success, error, warning, info)
 * @param string $message Mensagem a ser exibida
 * @return void
 */
function set_flash_message($type, $message)
{
    $_SESSION['flash_message'] = [
        'type' => $type,
        'message' => $message
    ];
}

/**
 * Retorna uma mensagem flash
 * 
 * @return array|null
 */
function get_flash_message()
{
    if (isset($_SESSION['flash_message'])) {
        $message = $_SESSION['flash_message'];
        unset($_SESSION['flash_message']);
        return $message;
    }
    return null;
} 