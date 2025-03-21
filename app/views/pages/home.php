<?php
// Incluir o hero section
include_once __DIR__ . '/../components/hero.php';

// Incluir a seção de destaques
include_once __DIR__ . '/../components/highlights.php';
?>

<!-- Seção Hero -->
<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8 hero-content">
                <h1 class="display-4 animate__animated animate__fadeInDown">Bem-vindo à MWM Softwares</h1>
                <p class="lead animate__animated animate__fadeInDown animate__delay-1s">
                    Transformamos ideias em soluções digitais de alta performance.
                </p>
                <div class="mt-4 animate__animated animate__fadeInUp animate__delay-2s">
                    <a href="<?= base_url('servicos') ?>" class="btn btn-primary btn-lg mr-3 track-click" data-event-name="HeroButtonClick" data-event-category="Services">
                        Nossos Serviços <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="<?= base_url('contato') ?>" class="btn btn-outline-light btn-lg track-click" data-event-name="HeroButtonClick" data-event-category="Contact">
                        Fale Conosco <i class="fas fa-envelope ml-2"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-4 d-none d-md-block animate__animated animate__fadeInRight animate__delay-1s">
                <img src="<?= asset_url('img/hero-illustration.png') ?>" alt="Ilustração Digital" class="img-fluid" loading="eager">
            </div>
        </div>
    </div>
</section>

<!-- Seção de Boas-Vindas (Otimizada para Visitantes do Facebook) -->
<section class="py-5 bg-light welcome-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <div class="d-flex align-items-center mb-4">
                            <i class="fas fa-star text-warning fa-2x mr-3"></i>
                            <h2 class="m-0">Transforme Sua Ideia em Realidade</h2>
                        </div>
                        <p class="lead">Na MWM Softwares, nós entendemos sua visão e a transformamos em soluções digitais de alto impacto.</p>
                        <ul class="list-unstyled mt-4">
                            <li class="mb-3">
                                <div class="d-flex">
                                    <i class="fas fa-check-circle text-success mr-2 mt-1"></i>
                                    <div>
                                        <strong>Desenvolvimento Web Personalizado</strong>
                                        <p class="text-muted mb-0">Criamos sites e aplicações web sob medida para seu negócio.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-3">
                                <div class="d-flex">
                                    <i class="fas fa-check-circle text-success mr-2 mt-1"></i>
                                    <div>
                                        <strong>Aplicativos Móveis Intuitivos</strong>
                                        <p class="text-muted mb-0">Desenvolvimento para iOS e Android com foco na experiência do usuário.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex">
                                    <i class="fas fa-check-circle text-success mr-2 mt-1"></i>
                                    <div>
                                        <strong>Consultoria Técnica Especializada</strong>
                                        <p class="text-muted mb-0">Orientação estratégica para maximizar o valor do seu investimento tecnológico.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="mt-4">
                            <a href="<?= base_url('contato') ?>" class="btn btn-primary btn-lg track-click" data-event-name="WelcomeContactClick">
                                Solicitar um Orçamento <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-6 mb-4">
                        <div class="card border-0 shadow-sm h-100 clickable">
                            <div class="card-body text-center p-4">
                                <i class="fas fa-code fa-3x text-primary mb-3"></i>
                                <h4>Desenvolvimento Web</h4>
                                <p class="mb-0">Sites responsivos, sistemas web e e-commerce.</p>
                                <a href="<?= base_url('servicos#desenvolvimento') ?>" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="card border-0 shadow-sm h-100 clickable">
                            <div class="card-body text-center p-4">
                                <i class="fas fa-mobile-alt fa-3x text-primary mb-3"></i>
                                <h4>Apps Móveis</h4>
                                <p class="mb-0">Aplicativos nativos e híbridos para iOS e Android.</p>
                                <a href="<?= base_url('servicos#apps') ?>" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card border-0 shadow-sm h-100 clickable">
                            <div class="card-body text-center p-4">
                                <i class="fas fa-cogs fa-3x text-primary mb-3"></i>
                                <h4>Consultoria</h4>
                                <p class="mb-0">Orientação estratégica e arquitetura de software.</p>
                                <a href="<?= base_url('servicos#consultoria') ?>" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card border-0 shadow-sm h-100 clickable">
                            <div class="card-body text-center p-4">
                                <i class="fas fa-clipboard-check fa-3x text-primary mb-3"></i>
                                <h4>Projetos</h4>
                                <p class="mb-0">Veja nossos cases de sucesso e portfólio.</p>
                                <a href="<?= base_url('portfolio') ?>" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Seção Sobre Nós -->
<section id="sobre" class="container py-5">
    <h2 class="section-title">Sobre a MWM Softwares</h2>
    <div class="row align-items-center">
        <div class="col-md-6">
            <img src="<?= asset_url('img/equipe.jpg') ?>" alt="Equipe MWM Softwares" class="img-fluid rounded mb-4 mb-md-0">
        </div>
        <div class="col-md-6">
            <p>
                A <strong>MWM Softwares</strong> é liderada por um desenvolvedor de software com mais de 10 anos de experiência,
                oferecendo serviços de alta qualidade para empresas e empreendedores. Nossa empresa tem foco na produção de
                soluções personalizadas, principalmente no desenvolvimento de <em>sites</em>, sistemas web e aplicativos.
            </p>
            <p>
                Com atuação em <strong>Portugal</strong> e experiência no mercado brasileiro, temos a missão de entregar soluções tecnológicas
                robustas e inovadoras, atendendo às necessidades específicas de cada cliente.
            </p>
            <ul class="list-unstyled">
                <li><i class="fas fa-check text-primary mr-2"></i>Desenvolvimento de Software Personalizado</li>
                <li><i class="fas fa-check text-primary mr-2"></i>Consultoria em Arquitetura de Software</li>
                <li><i class="fas fa-check text-primary mr-2"></i>Integrações de Sistemas e APIs</li>
                <li><i class="fas fa-check text-primary mr-2"></i>Manutenção e Suporte Técnico</li>
            </ul>
        </div>
    </div>
</section>

<!-- Seção de Serviços -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="section-title">
            <h2>Nossos Serviços</h2>
            <p class="lead text-muted">Soluções completas para suas necessidades digitais</p>
        </div>
        
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card service-box h-100">
                    <div class="card-body text-center p-4">
                        <div class="icon-box mb-4">
                            <i class="fas fa-laptop-code fa-3x text-primary"></i>
                        </div>
                        <h3 class="card-title">Desenvolvimento Web</h3>
                        <p class="card-text">Criação de sites, sistemas e aplicações web modernas, responsivas e otimizadas para SEO.</p>
                        <a href="<?= base_url('servicos#desenvolvimento') ?>" class="btn btn-outline-primary mt-3">Saiba Mais</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card service-box h-100">
                    <div class="card-body text-center p-4">
                        <div class="icon-box mb-4">
                            <i class="fas fa-mobile-alt fa-3x text-primary"></i>
                        </div>
                        <h3 class="card-title">Aplicativos Móveis</h3>
                        <p class="card-text">Desenvolvimento de aplicativos móveis nativos e híbridos para iOS e Android com foco na experiência do usuário.</p>
                        <a href="<?= base_url('servicos#apps') ?>" class="btn btn-outline-primary mt-3">Saiba Mais</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card service-box h-100">
                    <div class="card-body text-center p-4">
                        <div class="icon-box mb-4">
                            <i class="fas fa-lightbulb fa-3x text-primary"></i>
                        </div>
                        <h3 class="card-title">Consultoria</h3>
                        <p class="card-text">Orientação estratégica para seu negócio, incluindo arquitetura de software, processos e tecnologias.</p>
                        <a href="<?= base_url('servicos#consultoria') ?>" class="btn btn-outline-primary mt-3">Saiba Mais</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <a href="<?= base_url('servicos') ?>" class="btn btn-primary btn-lg">Ver Todos os Serviços</a>
        </div>
    </div>
</section>

<!-- Chamada para Ação -->
<section class="bg-primary text-white py-5 cta-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <h2 class="mb-3">Pronto para transformar sua ideia em realidade?</h2>
                <p class="lead mb-0">Entre em contato conosco hoje mesmo para discutir seu projeto e obter um orçamento personalizado.</p>
            </div>
            <div class="col-lg-4 text-lg-right">
                <a href="<?= base_url('contato') ?>" class="btn btn-light btn-lg track-click" data-event-name="CTAButtonClick">
                    Fale Conosco <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Seção Portfólio (Resumo) -->
<section id="portfolio-resumo" class="container py-5">
    <h2 class="section-title">Nosso Portfólio</h2>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="<?= asset_url('img/APAM.AS.png') ?>" class="card-img-top" alt="Projeto Aperam">
                <div class="card-body">
                    <h5 class="card-title">Aperam</h5>
                    <p class="card-text">
                        Gerenciamento de projetos de manutenção e produção, com integração de sistemas e
                        controle de qualidade.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="<?= asset_url('img/digitalcircleoficial_logo.jpg') ?>" class="card-img-top" alt="Projeto DigitalCircle">
                <div class="card-body">
                    <h5 class="card-title">DigitalCircle</h5>
                    <p class="card-text">
                        Suporte ao desenvolvimento de plataformas de clientes, voltados para vários segmentos de mercado.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="<?= asset_url('img/grams.png') ?>" class="card-img-top" alt="Projeto Grams">
                <div class="card-body">
                    <h5 class="card-title">Grams</h5>
                    <p class="card-text">
                        Desenvolvimento de um sistema desacoplado escalável para gestão de risco médicos.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-4">
        <a href="<?= base_url('portfolio') ?>" class="btn btn-outline-primary">Ver Portfólio Completo</a>
    </div>
</section>

<!-- Seção Testemunhos -->
<section id="testemunhos" class="bg-light py-5">
    <div class="container">
        <h2 class="section-title">O que Nossos Clientes Dizem</h2>
        <div class="owl-carousel owl-theme">
            <div class="item">
                <div class="testimonial p-4 shadow-sm rounded bg-white">
                    <p class="mb-3">"A MWM Softwares entregou exatamente o que precisávamos, com excelente qualidade e agilidade."</p>
                    <h5>- Cliente Satisfeito</h5>
                </div>
            </div>
            <div class="item">
                <div class="testimonial p-4 shadow-sm rounded bg-white">
                    <p class="mb-3">"Profissionais dedicados e soluções inovadoras. Recomendo a todos que buscam excelência."</p>
                    <h5>- Cliente Satisfeito</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Seção Endereço -->
<section id="endereco" class="container py-5">
    <h2 class="section-title">Onde Estamos</h2>
    <div class="row">
        <div class="col-md-6">
            <p>
                Nossa sede fica em: <strong>Rua André de Resende, 24 - Porto, Portugal</strong>.
                Entre em contato para agendar uma visita ou reunião!
            </p>
        </div>
        <div class="col-md-6">
            <!-- Mapa Incorporado -->
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3067.7603333772757!2d-8.000000!3d40.000000!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0bc00000000001%3A0x0000000000000000!2sRua+Andr%C3%A9+de+Resende!5e0!3m2!1spt-PT!2spt!4v9999999999999!5m2!1spt-PT!2spt"
                width="100%"
                height="250"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                aria-label="Mapa da localização da MWM Softwares"
            ></iframe>
        </div>
    </div>
</section>

<!-- Seção Contato (Resumo) -->
<section id="contato-resumo" class="container py-5">
    <div class="row">
        <div class="col-md-8 offset-md-2 text-center">
            <h2 class="section-title">Vamos Trabalhar Juntos?</h2>
            <p class="mb-4">
                Estamos prontos para ajudar a transformar suas ideias em realidade. Entre em contato conosco para discutir seu projeto.
            </p>
            <a href="<?= base_url('contato') ?>" class="btn btn-primary btn-lg">Fale Conosco</a>
        </div>
    </div>
</section>

<!-- Scripts de interação -->
<script src="<?= asset_url('js/engagement.js') ?>"></script>

<!-- AOS (Animate On Scroll) -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- Owl Carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
// Inicializar AOS
AOS.init({
    duration: 1000,
    once: true
});

// Inicializar Owl Carousel para o hero
$(document).ready(function(){
    $('.hero-slider').owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        nav: true,
        navText: [
            '<button class="hero-prev"><i class="fas fa-chevron-left"></i></button>',
            '<button class="hero-next"><i class="fas fa-chevron-right"></i></button>'
        ],
        dots: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 450
    });
});
</script> 
