<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= SITE_NAME ?> - Soluções em Desenvolvimento de Software</title>
    <meta name="description" content="MWM Softwares - Soluções completas em desenvolvimento e produção de software. Criação de sites, sistemas web e aplicativos.">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= asset_url('img/favicon.ico') ?>" type="image/x-icon">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="<?= asset_url('css/style.css') ?>">
</head>
<body>
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
                        <a class="nav-link" href="<?= base_url() ?>">Início</a>
                    </li>
                    <li class="nav-item <?= isset($_GET['url']) && $_GET['url'] == 'sobre' ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url('sobre') ?>">Sobre Nós</a>
                    </li>
                    <li class="nav-item <?= isset($_GET['url']) && $_GET['url'] == 'servicos' ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url('servicos') ?>">Serviços</a>
                    </li>
                    <li class="nav-item <?= isset($_GET['url']) && $_GET['url'] == 'portfolio' ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url('portfolio') ?>">Portfólio</a>
                    </li>
                    <li class="nav-item <?= isset($_GET['url']) && $_GET['url'] == 'contato' ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url('contato') ?>">Contato</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Mensagens Flash -->
    <?php $flashMessage = get_flash_message(); ?>
    <?php if ($flashMessage): ?>
    <div class="container mt-5 pt-3">
        <div class="alert alert-<?= $flashMessage['type'] == 'error' ? 'danger' : $flashMessage['type'] ?> alert-dismissible fade show" role="alert">
            <?= $flashMessage['message'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <?php endif; ?>

    <!-- Conteúdo principal --> 