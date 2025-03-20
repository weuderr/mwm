<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= SITE_NAME ?> - Soluções em Desenvolvimento de Software</title>
    <meta name="description" content="MWM Softwares - Soluções completas em desenvolvimento e produção de software. Criação de sites, sistemas web e aplicativos.">
    
    <!-- Preconectar com domínios externos para carregar recursos mais rápido -->
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Preload de recursos críticos -->
    <link rel="preload" href="<?= asset_url('img/logo-ret.png') ?>" as="image">
    <link rel="preload" href="<?= asset_url('css/style.css') ?>" as="style">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" as="style">

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
        
        /* Indicador de carregamento inicial */
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
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }
        
        .loader-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid #007bff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
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
            if (loader) {
                setTimeout(function() {
                    loader.style.opacity = '0';
                    setTimeout(function() {
                        loader.style.display = 'none';
                    }, 500);
                }, 300); // Tempo suficiente para a página carregar visualmente
            }
            
            // Destaque para primeiro acesso (referências do Facebook)
            if (document.referrer.includes('facebook.com')) {
                localStorage.setItem('fromFacebook', 'true');
            }
            
            // Verificar se é uma primeira visita do Facebook
            if (localStorage.getItem('fromFacebook') === 'true' && !localStorage.getItem('welcomeShown')) {
                // Marcar que já mostrou o destaque
                localStorage.setItem('welcomeShown', 'true');
                
                // Adicionar destaque aos elementos principais
                setTimeout(function() {
                    document.querySelectorAll('.hero-content, .welcome-section').forEach(function(element) {
                        element.classList.add('welcome-highlight');
                    });
                }, 1000);
            }
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
</head>
<body>
    <!-- Indicador de carregamento inicial -->
    <div id="page-loader" class="page-loader">
        <div class="loader-spinner"></div>
    </div>

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
