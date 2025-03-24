<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Preload de recursos críticos -->
    <link rel="preload" href="<?= asset_url('img/hero-bg.webp') ?>" as="image">
    <link rel="preload" href="<?= asset_url('fonts/roboto.woff2') ?>" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?= asset_url('css/critical.css') ?>" as="style">
    <link rel="preload" href="<?= asset_url('js/critical.js') ?>" as="script">

    <!-- Preconnect para domínios externos -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="preconnect" href="https://www.clarity.ms" crossorigin>
    <link rel="preconnect" href="https://connect.facebook.net" crossorigin>

    <!-- DNS Prefetch -->
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="https://www.clarity.ms">
    <link rel="dns-prefetch" href="https://connect.facebook.net">

    <title><?= $title ?? 'MWM Softwares - Soluções em Desenvolvimento de Software' ?></title>
    <meta name="description" content="<?= $description ?? 'MWM Softwares - Desenvolvimento profissional de sites, sistemas web, aplicativos mobile e soluções digitais personalizadas para sua empresa.' ?>">
    <meta name="keywords" content="desenvolvimento web, aplicativos mobile, sistemas web, software personalizado, consultoria em TI, desenvolvimento de sites, programação, tecnologia">
    <meta name="author" content="MWM Softwares">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="7 days">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= $title ?? 'MWM Softwares - Soluções em Desenvolvimento de Software' ?>">
    <meta property="og:description" content="<?= $description ?? 'MWM Softwares - Desenvolvimento profissional de sites, sistemas web, aplicativos mobile e soluções digitais personalizadas para sua empresa.' ?>">
    <meta property="og:image" content="<?= asset_url('img/logo.png') ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:site_name" content="MWM Softwares">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= $title ?? 'MWM Softwares - Soluções em Desenvolvimento de Software' ?>">
    <meta name="twitter:description" content="<?= $description ?? 'MWM Softwares - Desenvolvimento profissional de sites, sistemas web, aplicativos mobile e soluções digitais personalizadas para sua empresa.' ?>">
    <meta name="twitter:image" content="<?= asset_url('img/logo.png') ?>">

    <!-- Mobile Meta -->
    <meta name="theme-color" content="#2196F3">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="MWM Softwares">
    <meta name="application-name" content="MWM Softwares">

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
        /* Estilos críticos para LCP */
        .hero {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7));
            min-height: 500px;
            display: flex;
            align-items: center;
            position: relative;
        }
        .hero-content {
            position: relative;
            z-index: 2;
            color: #fff;
        }
        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }
        .hero .lead {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }
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

    <!-- Carregamento otimizado de fontes -->
    <link rel="stylesheet" href="<?= asset_url('fonts/roboto.css') ?>" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="<?= asset_url('fonts/roboto.css') ?>"></noscript>

    <!-- Bootstrap CSS (carregado de forma assíncrona) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"></noscript>

    <!-- Font Awesome (carregado de forma assíncrona) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"></noscript>

    <!-- Scripts críticos inline -->
    <script>
        // Otimização do carregamento de imagens
        document.addEventListener('DOMContentLoaded', function() {
            // Carregar imagem hero de forma otimizada
            const heroBg = new Image();
            heroBg.src = '<?= asset_url('img/hero-bg.webp') ?>';
            heroBg.onload = function() {
                document.querySelector('.hero').style.backgroundImage = 
                    `linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('${this.src}')`;
            };

            // Lazy loading otimizado
            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            img.src = img.dataset.src;
                            if (img.dataset.srcset) {
                                img.srcset = img.dataset.srcset;
                            }
                            img.classList.add('loaded');
                            observer.unobserve(img);
                        }
                    });
                });

                document.querySelectorAll('img.lazy-load').forEach(img => {
                    imageObserver.observe(img);
                });
            }
        });
    </script>

    <!-- Scripts não críticos carregados de forma assíncrona -->
    <script async src="<?= asset_url('js/non-critical.js') ?>"></script>
    <script async src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script async src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"></script>
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
