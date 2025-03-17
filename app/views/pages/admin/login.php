<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Área Administrativa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            background-color: #f8f9fa;
        }
        .login-form {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <form class="login-form" method="POST" action="<?= base_url('admin/login') ?>">
            <h1 class="h3 mb-3 font-weight-normal text-center">Área Administrativa</h1>
            
            <?php $flashMessage = get_flash_message(); ?>
            <?php if ($flashMessage): ?>
            <div class="alert alert-<?= $flashMessage['type'] == 'error' ? 'danger' : $flashMessage['type'] ?> alert-dismissible fade show" role="alert">
                <?= $flashMessage['message'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="username">Usuário</label>
                <input type="text" id="username" name="username" class="form-control" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 