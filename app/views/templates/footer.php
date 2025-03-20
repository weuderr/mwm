<!-- Modal de Boas-Vindas do Facebook -->
<div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Bem-vindo à MWM Softwares!</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <img src="<?= asset_url('img/logo-ret.png') ?>" alt="MWM Softwares" class="img-fluid mb-3" style="max-width: 200px;">
                    <p class="lead">Obrigado por nos visitar através do Facebook!</p>
                </div>
                <p>Somos especialistas em desenvolvimento de software e soluções digitais. Explore nosso site para conhecer nossos serviços:</p>
                <div class="row text-center">
                    <div class="col-4">
                        <a href="<?= base_url('servicos') ?>" class="text-decoration-none">
                            <div class="p-3 rounded bg-light">
                                <i class="fas fa-cogs fa-2x text-primary mb-2"></i>
                                <p class="mb-0">Serviços</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="<?= base_url('portfolio') ?>" class="text-decoration-none">
                            <div class="p-3 rounded bg-light">
                                <i class="fas fa-briefcase fa-2x text-primary mb-2"></i>
                                <p class="mb-0">Portfólio</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="<?= base_url('contato') ?>" class="text-decoration-none">
                            <div class="p-3 rounded bg-light">
                                <i class="fas fa-envelope fa-2x text-primary mb-2"></i>
                                <p class="mb-0">Contato</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <a href="<?= base_url('contato') ?>" class="btn btn-primary">Solicitar Orçamento</a>
            </div>
        </div>
    </div>
</div>

<!-- Mapa do Site para melhorar a Navegação -->
<section class="bg-light py-4 border-top">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h5 class="text-dark mb-3">Mapa do Site</h5>
                <div class="row">
                    <div class="col-6 col-md-3">
                        <div class="nav-category mb-3">
                            <h6><i class="fas fa-home mr-2"></i>Principal</h6>
                            <ul class="list-unstyled">
                                <li><a href="<?= base_url() ?>" class="text-secondary">Início</a></li>
                                <li><a href="<?= base_url('sobre') ?>" class="text-secondary">Sobre Nós</a></li>
                                <li><a href="<?= base_url('contato') ?>" class="text-secondary">Contato</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="nav-category mb-3">
                            <h6><i class="fas fa-cogs mr-2"></i>Serviços</h6>
                            <ul class="list-unstyled">
                                <li><a href="<?= base_url('servicos#desenvolvimento') ?>" class="text-secondary">Desenvolvimento Web</a></li>
                                <li><a href="<?= base_url('servicos#apps') ?>" class="text-secondary">Aplicativos Móveis</a></li>
                                <li><a href="<?= base_url('servicos#consultoria') ?>" class="text-secondary">Consultoria</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="nav-category mb-3">
                            <h6><i class="fas fa-briefcase mr-2"></i>Portfólio</h6>
                            <ul class="list-unstyled">
                                <li><a href="<?= base_url('portfolio#websites') ?>" class="text-secondary">Websites</a></li>
                                <li><a href="<?= base_url('portfolio#sistemas') ?>" class="text-secondary">Sistemas</a></li>
                                <li><a href="<?= base_url('portfolio#apps') ?>" class="text-secondary">Aplicativos</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="nav-category mb-3">
                            <h6><i class="fas fa-info-circle mr-2"></i>Mais Informações</h6>
                            <ul class="list-unstyled">
                                <li><a href="<?= base_url('termos') ?>" class="text-secondary">Termos de Uso</a></li>
                                <li><a href="<?= base_url('privacidade') ?>" class="text-secondary">Política de Privacidade</a></li>
                                <li><a href="<?= base_url('faq') ?>" class="text-secondary">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-4 mt-md-0">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Quer um orçamento?</h5>
                        <p class="card-text">Entre em contato conosco para discutir seu projeto e obter um orçamento personalizado.</p>
                        <a href="<?= base_url('contato') ?>" class="btn btn-primary btn-block">
                            <i class="fas fa-paper-plane mr-2"></i>Solicitar Orçamento
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Rodapé -->
<footer class="bg-dark text-white py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 text-center text-md-left mb-3 mb-md-0">
                <img src="<?= asset_url('img/logo-footer.png') ?>" alt="MWM Softwares" class="img-fluid" style="max-width: 150px;">
            </div>
            <div class="col-md-4 text-center mb-3 mb-md-0">
                <p class="mb-0">&copy; <?= date('Y') ?> - MWM Softwares</p>
                <p class="small mb-0">Todos os direitos reservados</p>
            </div>
            <div class="col-md-4 text-center text-md-right">
                <div class="social-icons">
                    <a href="https://www.facebook.com/profile.php?id=61574064759064" target="_blank" class="text-white mx-2" title="Facebook">
                        <i class="fab fa-facebook-f fa-lg"></i>
                    </a>
                    <a href="https://www.instagram.com/of.mwmtechs" target="_blank" class="text-white mx-2" title="Instagram">
                        <i class="fab fa-instagram fa-lg"></i>
                    </a>
                    <a href="https://linkedin.com/company/mwmsoftwares" target="_blank" class="text-white mx-2" title="LinkedIn">
                        <i class="fab fa-linkedin-in fa-lg"></i>
                    </a>
                    <a href="https://github.com/mwmsoftwares" target="_blank" class="text-white mx-2" title="GitHub">
                        <i class="fab fa-github fa-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Botão Flutuante de Contato -->
<div id="contact-float" class="position-fixed" style="bottom: 30px; right: 30px; z-index: 999;">
    <a href="<?= base_url('contato') ?>" class="btn btn-success rounded-circle p-3 shadow-lg pulse" title="Entre em contato">
        <i class="fas fa-comment-dots fa-lg"></i>
    </a>
</div>

<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS (carregados de forma otimizada) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" defer></script>

<!-- Owl Carousel JS (carregamento condicional) -->
<script>
    // Carregar Owl Carousel apenas se necessário
    if (document.querySelector('.owl-carousel')) {
        const owlScript = document.createElement('script');
        owlScript.src = 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js';
        owlScript.onload = function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                responsive: {
                    0: { items: 1 },
                    600: { items: 2 },
                    1000: { items: 3 }
                }
            });
        };
        document.body.appendChild(owlScript);
    }
</script>

<!-- Scripts personalizados -->
<script src="<?= asset_url('js/script.js') ?>" defer></script>

<!-- Script para melhorar interatividade -->
<script>
// Verificar se está vindo do Facebook e mostrar modal de boas-vindas
document.addEventListener('DOMContentLoaded', function() {
    // Tornar cards clicáveis
    $('.card').each(function() {
        if ($(this).find('a').length > 0) {
            $(this).addClass('clickable');
            
            // Tornar o card inteiro clicável
            $(this).on('click', function(e) {
                if (!$(e.target).is('a, button') && !$(e.target).closest('a, button').length) {
                    var link = $(this).find('a').first();
                    if (link.attr('target') === '_blank') {
                        window.open(link.attr('href'), '_blank');
                    } else {
                        window.location.href = link.attr('href');
                    }
                }
            });
        }
    });
    
    // Verificar se é uma primeira visita do Facebook e mostrar modal
    if (document.referrer.includes('facebook.com') || localStorage.getItem('fromFacebook') === 'true') {
        if (!localStorage.getItem('welcomeModalShown')) {
            setTimeout(function() {
                $('#welcomeModal').modal('show');
                localStorage.setItem('welcomeModalShown', 'true');
                
                // Registrar evento no Facebook Pixel
                if (typeof fbq !== 'undefined') {
                    fbq('trackCustom', 'FacebookReferralWelcome', {
                        referrer: document.referrer
                    });
                }
            }, 1500);
        }
    }
    
    // Animar elementos ao entrar na viewport
    function isElementInViewport(el) {
        var rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }
    
    function handleVisibilityChange() {
        $('.animate-on-scroll').each(function() {
            if (isElementInViewport(this)) {
                $(this).addClass('animate__animated animate__fadeIn');
            }
        });
    }
    
    // Adicionar classe para elementos que serão animados
    $('.card, .section-title, .service-item, .portfolio-item').addClass('animate-on-scroll');
    
    // Verificar visibilidade inicial e em scroll
    handleVisibilityChange();
    $(window).on('scroll resize', handleVisibilityChange);
    
    // Adicionar efeito de pulsação ao botão flutuante
    $('.pulse').addClass('animate__animated animate__pulse animate__infinite');
    
    // Tooltip para melhorar usabilidade (inicialização atrasada para não bloquear renderização)
    setTimeout(function() {
        $('[title]').tooltip();
    }, 1000);
    
    // Adicionar rastreamento de cliques para navegação principal
    $('.navbar-nav .nav-link').each(function() {
        $(this).on('click', function() {
            if (typeof fbq !== 'undefined') {
                fbq('trackCustom', 'MainNavClick', {
                    linkText: $(this).text().trim(),
                    linkHref: $(this).attr('href')
                });
            }
        });
    });
});
</script>
</body>
</html> 