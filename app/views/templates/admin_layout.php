<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - MWM Softwares</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/img/favicon.png') ?>" type="image/x-icon">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    
    <!-- Estilos personalizados para o admin -->
    <style>
        :root {
            --primary: #007bff;
            --secondary: #6c757d;
            --success: #28a745;
            --danger: #dc3545;
            --sidebar-width: 250px;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            overflow-x: hidden;
        }
        
        /* Layout do admin */
        .admin-container {
            display: flex;
            min-height: 100vh;
        }
        
        /* Barra lateral */
        .admin-sidebar {
            width: var(--sidebar-width);
            background-color: #212529;
            color: #fff;
            transition: all 0.3s;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            height: 100%;
            z-index: 1000;
        }
        
        .admin-sidebar.collapsed {
            margin-left: calc(var(--sidebar-width) * -1);
        }
        
        .admin-sidebar-header {
            padding: 1.5rem 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .admin-sidebar-menu {
            padding: 1rem;
        }
        
        .admin-sidebar-menu h6 {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.8rem;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }
        
        .admin-sidebar-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .admin-sidebar-menu ul li {
            margin-bottom: 0.5rem;
        }
        
        .admin-sidebar-menu ul li a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            border-radius: 4px;
            transition: all 0.2s;
        }
        
        .admin-sidebar-menu ul li a:hover,
        .admin-sidebar-menu ul li a.active {
            background-color: var(--primary);
            color: #fff;
        }
        
        .admin-sidebar-menu ul li a i {
            margin-right: 0.75rem;
            width: 20px;
            text-align: center;
        }
        
        /* Conteúdo principal */
        .admin-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: all 0.3s;
        }
        
        .admin-content.expanded {
            margin-left: 0;
        }
        
        /* Barra superior */
        .admin-topbar {
            background-color: #fff;
            padding: 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .admin-toggle-btn {
            background: none;
            border: none;
            font-size: 1.25rem;
            color: var(--secondary);
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 4px;
        }
        
        .admin-toggle-btn:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }
        
        .admin-user-menu {
            display: flex;
            align-items: center;
        }
        
        .admin-user-menu a {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: var(--secondary);
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            background-color: var(--primary);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.75rem;
        }
        
        /* Conteúdo da página */
        .admin-main {
            padding: 2rem;
        }
        
        /* Cards */
        .admin-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
        }
        
        .admin-card-header {
            padding: 1.25rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }
        
        .admin-card-title {
            margin: 0;
            font-size: 1.1rem;
            font-weight: 600;
        }
        
        .admin-card-body {
            padding: 1.25rem;
        }
        
        /* Responsividade */
        @media (max-width: 768px) {
            .admin-sidebar {
                margin-left: calc(var(--sidebar-width) * -1);
            }
            
            .admin-sidebar.mobile-show {
                margin-left: 0;
            }
            
            .admin-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <!-- Barra lateral -->
        <nav class="admin-sidebar" id="adminSidebar">
            <div class="admin-sidebar-header">
                <h4 class="mb-0">MWM Softwares</h4>
            </div>
            
            <div class="admin-sidebar-menu">
                <h6>Menu Principal</h6>
                <ul>
                    <li>
                        <a href="<?= base_url('admin/dashboard') ?>" class="<?= isset($_GET['url']) && $_GET['url'] === 'admin/dashboard' ? 'active' : '' ?>">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/dashboard') ?>" class="<?= isset($_GET['url']) && $_GET['url'] === 'admin/contacts' ? 'active' : '' ?>">
                            <i class="fas fa-address-book"></i>
                            <span>Contatos</span>
                        </a>
                    </li>
                </ul>
                
                <h6 class="mt-4">Configurações</h6>
                <ul>
                    <li>
                        <a href="<?= base_url() ?>" target="_blank">
                            <i class="fas fa-external-link-alt"></i>
                            <span>Ver Site</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/logout') ?>">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Sair</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <!-- Conteúdo principal -->
        <div class="admin-content" id="adminContent">
            <!-- Barra de navegação superior -->
            <header class="admin-topbar">
                <button class="admin-toggle-btn" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="admin-user-menu dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <div class="user-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <span>Administrador</span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="<?= base_url('admin/logout') ?>">
                            <i class="fas fa-sign-out-alt mr-2"></i> Sair
                        </a>
                    </div>
                </div>
            </header>
            
            <!-- Conteúdo da página -->
            <main class="admin-main">
                <?php include VIEWS_PATH . '/pages/' . $view . '.php'; ?>
            </main>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    
    <!-- Scripts personalizados -->
    <script>
        $(document).ready(function() {
            // Inicializar DataTables
            if ($('#contatosTable').length) {
                $('#contatosTable').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json"
                    },
                    "order": [[0, "desc"]], // Ordenar por data (primeira coluna) decrescente
                    "responsive": true
                });
            }
            
            // Alternar sidebar
            $('#sidebarToggle').on('click', function() {
                $('#adminSidebar').toggleClass('collapsed');
                $('#adminContent').toggleClass('expanded');
            });
            
            // Mobile: alternar sidebar
            $('#mobileToggle').on('click', function() {
                $('#adminSidebar').toggleClass('mobile-show');
            });
            
            // Fechar dropdown ao clicar fora
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.dropdown').length) {
                    $('.dropdown-menu').removeClass('show');
                }
            });
            
            // Marcar link ativo no menu
            var currentUrl = window.location.pathname;
            $('.admin-sidebar-menu a').each(function() {
                var linkUrl = $(this).attr('href');
                if (currentUrl === linkUrl) {
                    $(this).addClass('active');
                }
            });
            
            // Copiar email para clipboard
            $('.copy-email').on('click', function() {
                var email = $(this).data('email');
                navigator.clipboard.writeText(email).then(function() {
                    alert('Email copiado para a área de transferência!');
                });
            });
            
            // Copiar telefone para clipboard
            $('.copy-phone').on('click', function() {
                var phone = $(this).data('phone');
                navigator.clipboard.writeText(phone).then(function() {
                    alert('Telefone copiado para a área de transferência!');
                });
            });
            
            // Abrir WhatsApp
            $('.open-whatsapp').on('click', function() {
                var phone = $(this).data('phone');
                window.open('https://wa.me/' + phone.replace(/\D/g, ''), '_blank');
            });
        });
    </script>
</body>
</html> 