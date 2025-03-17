<!-- Seção Hero (Início) -->
<section id="home" class="hero">
    <div class="container text-center">
        <h1 class="animate__animated animate__fadeInDown">Bem-vindo à MWM Softwares</h1>
        <p class="lead animate__animated animate__fadeInUp">Soluções completas em desenvolvimento e produção de software</p>
        <a href="<?= base_url('contato') ?>" class="btn btn-primary btn-lg mt-4 animate__animated animate__zoomIn">Solicite um Orçamento</a>
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

<!-- Seção Serviços -->
<section id="servicos" class="container py-5">
    <h2 class="section-title">Nossos Serviços</h2>
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="service-box p-4 shadow-sm rounded">
                <i class="fas fa-laptop-code fa-3x mb-3 text-primary"></i>
                <h4>Criação de Sites</h4>
                <p>
                    Desenvolvimento de sites modernos, responsivos e otimizados para mecanismos de busca (SEO).
                    Seja um site institucional, blog ou loja virtual, nós cuidamos de tudo.
                </p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="service-box p-4 shadow-sm rounded">
                <i class="fas fa-code fa-3x mb-3 text-primary"></i>
                <h4>Desenvolvimento de Sistemas</h4>
                <p>
                    Soluções sob medida para atender as necessidades específicas do seu negócio.
                    Sistemas web, aplicativos mobile e automação de processos.
                </p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="service-box p-4 shadow-sm rounded">
                <i class="fas fa-chart-line fa-3x mb-3 text-primary"></i>
                <h4>Consultoria e Suporte</h4>
                <p>
                    Análise de infraestrutura, arquitetura de software, estratégias de crescimento e
                    acompanhamento contínuo para garantir que sua solução funcione perfeitamente.
                </p>
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
                    <h5>- Outro Cliente</h5>
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