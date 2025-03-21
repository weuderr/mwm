<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= SITE_NAME ?> - Soluções em Desenvolvimento de Software</title>
    <meta name="description" content="MWM Softwares - Soluções completas em desenvolvimento e produção de software. Criação de sites, sistemas web e aplicativos.">
    
    <!-- Resource Hints -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    
    <!-- PWA -->
    <link rel="manifest" href="<?= base_url('manifest.json') ?>">
    <meta name="theme-color" content="#2196F3">
    
    <!-- Preload Critical Assets -->
    <link rel="preload" href="<?= base_url('assets/css/critical.css') ?>" as="style">
    <link rel="preload" href="<?= base_url('assets/js/critical.js') ?>" as="script">
    <link rel="preload" href="<?= base_url('assets/fonts/your-main-font.woff2') ?>" as="font" type="font/woff2" crossorigin>
    
    <!-- Critical CSS -->
    <style>
        /* Inline critical CSS here */
        /* This will be generated automatically by a build tool */
        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }
        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
        .lazy-load {
            opacity: 0;
            transition: opacity 0.3s ease-in;
        }
        .lazy-load.loaded {
            opacity: 1;
        }
        .page-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.95);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.3s ease;
        }
        .loader-spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #007bff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        #page-content {
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        #page-content.loaded {
            opacity: 1;
        }
    </style>
    
    <!-- Async CSS Loading -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" media="print" onload="this.media='all'">
    <noscript>
        <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    </noscript>
    
    <!-- Prefetch -->
    <link rel="prefetch" href="<?= base_url('assets/js/contact.js') ?>">
    <link rel="prefetch" href="<?= base_url('assets/js/portfolio.js') ?>">
    
    <!-- Intersection Observer Polyfill -->
    <script>
        if (!('IntersectionObserver' in window)) {
            document.write('<script src="https://polyfill.io/v3/polyfill.min.js?features=IntersectionObserver"><\/script>');
        }
    </script>
    
    <!-- Lazy Loading Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var lazyImages = [].slice.call(document.querySelectorAll('img.lazy-load'));
            
            if ('IntersectionObserver' in window) {
                let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            let lazyImage = entry.target;
                            lazyImage.src = lazyImage.dataset.src;
                            if (lazyImage.dataset.srcset) {
                                lazyImage.srcset = lazyImage.dataset.srcset;
                            }
                            lazyImage.classList.add('loaded');
                            lazyImageObserver.unobserve(lazyImage);
                        }
                    });
                });
                
                lazyImages.forEach(function(lazyImage) {
                    lazyImageObserver.observe(lazyImage);
                });
            }
        });
    </script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= asset_url('img/favicon.ico') ?>" type="image/x-icon">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    
    <!-- Font Awesome (carregado assincronamente) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"></noscript>
    
    <!-- Owl Carousel CSS (carregamento condicional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" media="print" onload="this.media='all'">
    <noscript>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    </noscript>
    
    <!-- Animate.css (carregamento condicional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"></noscript>
    
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="<?= asset_url('css/style.css') ?>">
    
    <!-- Estilos adicionais para melhorar a interatividade -->
    <style>
        /* Melhorar visualização de elementos clicáveis */
        .nav-link, .btn, a[href]:not(.navbar-brand) {
            transition: all 0.2s ease;
            position: relative;
        }
        
        .nav-link:hover, .btn:hover, a[href]:not(.navbar-brand):hover {
            transform: translateY(-2px);
        }
        
        .nav-link.active {
            font-weight: bold;
            border-bottom: 2px solid #fff;
        }
        
        /* Feedback visual para cliques */
        .btn:active, a[href]:active {
            transform: translateY(1px);
        }
        
        /* Breadcrumbs para melhorar navegação */
        .breadcrumb {
            background-color: transparent;
            padding-left: 0;
            margin-top: 75px;
        }
        
        /* Melhorar visualização de cards e elementos clicáveis */
        .card, .clickable {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }
        
        .card:hover, .clickable:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        /* Realçar botões e call-to-actions */
        .btn-primary, .btn-success {
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .btn-primary:hover, .btn-success:hover {
            box-shadow: 0 6px 8px rgba(0,0,0,0.15);
        }
        
        /* Esqueleto de carregamento para melhorar percepção de velocidade */
        .skeleton-loader {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
            border-radius: 4px;
            min-height: 20px;
            margin-bottom: 10px;
        }
        
        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
        
        /* Destaque para primeira visita */
        .welcome-highlight {
            animation: welcome-pulse 2s ease-out;
        }
        
        @keyframes welcome-pulse {
            0% { box-shadow: 0 0 0 0 rgba(0, 123, 255, 0.7); }
            70% { box-shadow: 0 0 0 15px rgba(0, 123, 255, 0); }
            100% { box-shadow: 0 0 0 0 rgba(0, 123, 255, 0); }
        }
    </style>

    <!-- Scripts críticos (inline para evitar bloqueio de renderização) -->
    <script>
        // Indicador de carregamento
        document.addEventListener('DOMContentLoaded', function() {
            const loader = document.getElementById('page-loader');
            const content = document.getElementById('page-content');

            // Garantir que o conteúdo esteja oculto inicialmente
            content.style.opacity = '0';

            // Quando a página estiver totalmente carregada
            window.addEventListener('load', function() {
                // Primeiro mostra o conteúdo
                content.style.opacity = '1';
                content.classList.add('loaded');

                // Depois remove o loader
                setTimeout(function() {
                    loader.style.opacity = '0';
                    setTimeout(function() {
                        loader.style.display = 'none';
                    }, 300);
                }, 200);
            });
        });
    </script>

    <!-- Clarity Analytics (carregado de forma assíncrona) -->
    <script type="text/javascript" async>
        (function(c,l,a,r,i,t,y){
            c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
            y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
        })(window, document, "clarity", "script", "q0gbssty8b");
    </script>

    <!-- Meta Pixel Code (carregado de forma assíncrona) -->
    <script async>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '<?= META_PIXEL_ID ?>');
    fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=<?= META_PIXEL_ID ?>&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Meta Pixel Code -->

    <!-- Favicon e ícones -->
    <link rel="icon" type="image/png" href="<?= asset_url('img/favicon.png') ?>">
    <link rel="apple-touch-icon" href="<?= asset_url('img/apple-touch-icon.png') ?>">
    
    <!-- Meta tags -->
    <meta name="keywords" content="desenvolvimento web, aplicativos, software, consultoria em TI">
    
    <!-- Preload de recursos críticos -->
    <link rel="preload" href="<?= asset_url('fonts/fontawesome/webfonts/fa-solid-900.woff2') ?>" as="font" type="font/woff2" crossorigin>
    
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="<?= asset_url('css/style.css') ?>">
    
    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" defer></script>
</head>
<body>
    <!-- Único loader para a página -->
    <div id="page-loader" class="page-loader">
        <div class="loader-spinner"></div>
    </div>
    
    <!-- Conteúdo principal -->
    <div id="page-content">
        <!-- Barra de Navegação -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url() ?>">
                    <img
                        src="<?= asset_url('img/logo-ret.png') ?>"
                        width="70"
                        height="30"
                        class="d-inline-block align-top"
                        alt="Logo MWM Softwares"
                    />
                    MWM Softwares
                </a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item <?= empty($_GET['url']) ? 'active' : '' ?>">
                            <a class="nav-link" href="<?= base_url() ?>"><i class="fas fa-home mr-1"></i>Início</a>
                        </li>
                        <li class="nav-item <?= isset($_GET['url']) && $_GET['url'] == 'sobre' ? 'active' : '' ?>">
                            <a class="nav-link" href="<?= base_url('sobre') ?>"><i class="fas fa-info-circle mr-1"></i>Sobre Nós</a>
                        </li>
                        <li class="nav-item <?= isset($_GET['url']) && $_GET['url'] == 'servicos' ? 'active' : '' ?>">
                            <a class="nav-link" href="<?= base_url('servicos') ?>"><i class="fas fa-cogs mr-1"></i>Serviços</a>
                        </li>
                        <li class="nav-item <?= isset($_GET['url']) && $_GET['url'] == 'portfolio' ? 'active' : '' ?>">
                            <a class="nav-link" href="<?= base_url('portfolio') ?>"><i class="fas fa-briefcase mr-1"></i>Portfólio</a>
                        </li>
                        <li class="nav-item <?= isset($_GET['url']) && $_GET['url'] == 'contato' ? 'active' : '' ?>">
                            <a class="nav-link" href="<?= base_url('contato') ?>"><i class="fas fa-envelope mr-1"></i>Contato</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Breadcrumbs para melhorar a navegação -->
        <?php if (!empty($_GET['url'])): ?>
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Início</a></li>
                    <?php
                    $url = $_GET['url'];
                    switch ($url) {
                        case 'sobre':
                            echo '<li class="breadcrumb-item active" aria-current="page">Sobre Nós</li>';
                            break;
                        case 'servicos':
                            echo '<li class="breadcrumb-item active" aria-current="page">Serviços</li>';
                            break;
                        case 'portfolio':
                            echo '<li class="breadcrumb-item active" aria-current="page">Portfólio</li>';
                            break;
                        case 'contato':
                            echo '<li class="breadcrumb-item active" aria-current="page">Contato</li>';
                            break;
                        case 'admin/dashboard':
                            echo '<li class="breadcrumb-item">Admin</li>';
                            echo '<li class="breadcrumb-item active" aria-current="page">Dashboard</li>';
                            break;
                        default:
                            // Fragmentar a URL para detectar subpáginas
                            $parts = explode('/', $url);
                            if (count($parts) > 1) {
                                for ($i = 0; $i < count($parts) - 1; $i++) {
                                    echo '<li class="breadcrumb-item"><a href="' . base_url(implode('/', array_slice($parts, 0, $i + 1))) . '">' . ucfirst($parts[$i]) . '</a></li>';
                                }
                                echo '<li class="breadcrumb-item active" aria-current="page">' . ucfirst(end($parts)) . '</li>';
                            } else {
                                echo '<li class="breadcrumb-item active" aria-current="page">' . ucfirst($url) . '</li>';
                            }
                    }
                    ?>
                </ol>
            </nav>
        </div>
        <?php endif; ?>

        <!-- Mensagens Flash -->
        <?php $flashMessage = get_flash_message(); ?>
        <?php if ($flashMessage): ?>
        <div class="container mt-2">
            <div class="alert alert-<?= $flashMessage['type'] == 'error' ? 'danger' : $flashMessage['type'] ?> alert-dismissible fade show" role="alert">
                <?= $flashMessage['message'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        <?php endif; ?>

        <!-- Conteúdo principal -->
    </div>
</body>
</html> 
