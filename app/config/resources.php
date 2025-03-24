<?php
/**
 * Configuração de recursos e CDNs
 * Este arquivo contém as configurações para otimizar o carregamento de recursos
 * usando HTTP/2 e precarregamento de recursos críticos
 */

// URLs base para CDNs usando HTTP/2
$config['cdn'] = [
    'bootstrap' => 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3',
    'jquery' => 'https://cdn.jsdelivr.net/npm/jquery@3.6.0',
    'fontawesome' => 'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4',
    'aos' => 'https://cdn.jsdelivr.net/npm/aos@2.3.4',
    'owl_carousel' => 'https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4',
    'animate_css' => 'https://cdn.jsdelivr.net/npm/animate.css@4.1.1'
];

// Recursos críticos que devem ser precarregados
$config['preload'] = [
    // CSS crítico
    [
        'href' => asset_url('css/critical.css'),
        'as' => 'style',
        'type' => 'text/css',
        'crossorigin' => false
    ],
    // JavaScript crítico
    [
        'href' => asset_url('js/critical.js'),
        'as' => 'script',
        'type' => 'text/javascript',
        'crossorigin' => false
    ],
    // Fontes principais
    [
        'href' => '/fonts/fontawesome/webfonts/fa-solid-900.woff2',
        'as' => 'font',
        'type' => 'font/woff2',
        'crossorigin' => true
    ]
];

// Recursos que devem ser carregados com HTTP/2 Server Push
$config['server_push'] = [
    'css/style.css',
    'js/critical.js',
    'js/engagement.js',
    'fonts/fontawesome/webfonts/fa-solid-900.woff2'
];

// Domínios que devem ser pré-conectados para melhorar o tempo de carregamento
$config['preconnect'] = [
    [
        'href' => 'https://cdn.jsdelivr.net',
        'crossorigin' => true
    ],
    [
        'href' => 'https://fonts.googleapis.com',
        'crossorigin' => true
    ],
    [
        'href' => 'https://fonts.gstatic.com',
        'crossorigin' => true
    ]
];

/**
 * Gera as tags HTML para precarregar recursos críticos
 * @return string HTML com as tags de preload
 */
function generate_preload_tags() {
    global $config;
    $html = '';
    
    foreach ($config['preload'] as $resource) {
        $html .= '<link rel="preload" href="' . $resource['href'] . '" as="' . $resource['as'] . '"';
        
        if (!empty($resource['type'])) {
            $html .= ' type="' . $resource['type'] . '"';
        }
        
        if ($resource['crossorigin']) {
            $html .= ' crossorigin';
        }
        
        $html .= '>' . PHP_EOL;
    }
    
    return $html;
}

/**
 * Gera as tags HTML para pré-conectar domínios
 * @return string HTML com as tags de preconnect
 */
function generate_preconnect_tags() {
    global $config;
    $html = '';
    
    foreach ($config['preconnect'] as $domain) {
        $html .= '<link rel="preconnect" href="' . $domain['href'] . '"';
        
        if ($domain['crossorigin']) {
            $html .= ' crossorigin';
        }
        
        $html .= '>' . PHP_EOL;
    }
    
    return $html;
}

/**
 * Retorna a URL para um recurso CDN
 * @param string $cdn Nome do CDN
 * @param string $resource Caminho do recurso
 * @return string URL completa do recurso
 */
function cdn_url($cdn, $resource) {
    global $config;
    
    if (isset($config['cdn'][$cdn])) {
        return $config['cdn'][$cdn] . '/' . $resource;
    }
    
    return asset_url($resource);
} 