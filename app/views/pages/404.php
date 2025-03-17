<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página Não Encontrada - <?= SITE_NAME ?></title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="<?= asset_url('css/style.css') ?>">
    
    <style>
        body {
            background-color: #f8f9fa;
        }
        .error-container {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .error-code {
            font-size: 150px;
            font-weight: bold;
            color: #007bff;
            line-height: 1;
        }
        .error-message {
            font-size: 24px;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container error-container">
        <div class="error-code">404</div>
        <div class="error-message">Página Não Encontrada</div>
        <p class="mb-4">A página que você está procurando não existe ou foi movida.</p>
        <div>
            <a href="<?= base_url() ?>" class="btn btn-primary btn-lg">
                <i class="fas fa-home mr-2"></i> Voltar para a Página Inicial
            </a>
        </div>
    </div>
    
    <!-- Bootstrap JS (dependências Popper e jQuery) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 