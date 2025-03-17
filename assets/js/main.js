/**
 * Scripts personalizados para o site MWM Softwares
 */

$(document).ready(function() {
    // Inicializar o carrossel de testemunhos
    $(".owl-carousel").owlCarousel({
        items: 2,
        margin: 20,
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            }
        }
    });
    
    // Atualizar o ano no rodapé
    $("#ano").text(new Date().getFullYear());
    
    // Validação de formulários
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Buscar todos os formulários que precisam de validação
            var forms = document.getElementsByClassName('needs-validation');
            
            // Iterar sobre eles e prevenir submissão
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    
    // Rolagem suave para links de âncora
    $('a[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if (target.length) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 70
            }, 1000);
        }
    });
    
    // Filtro de portfólio
    $('.filter-btn').on('click', function() {
        var filterValue = $(this).attr('data-filter');
        
        // Atualizar botão ativo
        $('.filter-btn').removeClass('active');
        $(this).addClass('active');
        
        if (filterValue === 'all') {
            $('.portfolio-item').show();
        } else {
            $('.portfolio-item').hide();
            $('.portfolio-item[data-category*="' + filterValue + '"]').show();
        }
    });
    
    // Adicionar classe ativa ao item de menu correspondente à página atual
    var currentUrl = window.location.href;
    $('.navbar-nav .nav-item').each(function() {
        var linkUrl = $(this).find('a').attr('href');
        if (currentUrl.indexOf(linkUrl) !== -1) {
            $(this).addClass('active');
        }
    });
}); 