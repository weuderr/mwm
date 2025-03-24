<!-- Cabeçalho da Página -->
<div class="page-header bg-primary text-white">
    <div class="container py-5">
        <h1>Nosso Portfólio</h1>
        <p class="lead">Conheça alguns dos projetos que desenvolvemos</p>
    </div>
</div>

<!-- Filtros de Portfólio -->
<div class="container py-5">
    <div class="portfolio-filters text-center mb-5">
        <button class="btn btn-outline-primary m-2 filter-btn active" data-filter="all">Todos</button>
        <button class="btn btn-outline-primary m-2 filter-btn" data-filter="b2b">B2B</button>
        <button class="btn btn-outline-primary m-2 filter-btn" data-filter="b2p">B2P</button>
        <button class="btn btn-outline-primary m-2 filter-btn" data-filter="web">Web</button>
        <button class="btn btn-outline-primary m-2 filter-btn" data-filter="mobile">Mobile</button>
    </div>

    <!-- Projetos B2B -->
    <h3 class="section-sub-title mb-4">B2B - Business to Business</h3>
    <div class="row portfolio-items">
        <div class="col-md-4 mb-4 portfolio-item" data-category="b2b web">
            <div class="card h-100">
                <img src="<?= asset_url('img/APAM.AS.png') ?>" class="card-img-top" alt="Projeto Aperam">
                <div class="card-body">
                    <h5 class="card-title">Aperam</h5>
                    <p class="card-text">
                        Gerenciamento de projetos de manutenção e produção, com integração de sistemas e
                        controle de qualidade. Projeto em questão conta com toda a estrutura escalável e segura, com a utilização de tecnologias voltadas para a indústria.
                    </p>
                    <div class="technologies">
                        <span class="badge badge-primary">PHP</span>
                        <span class="badge badge-primary">Laravel</span>
                        <span class="badge badge-primary">MySQL</span>
                        <span class="badge badge-primary">JavaScript</span>
                        <span class="badge badge-primary">Docker</span>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <a href="#" class="btn btn-sm btn-outline-primary VER PORTFÓLIO COMPLETO">Ver Detalhes</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4 portfolio-item" data-category="b2b web">
            <div class="card h-100">
                <img src="<?= asset_url('img/digitalcircleoficial_logo.jpg') ?>" class="card-img-top" alt="Projeto DigitalCircle">
                <div class="card-body">
                    <h5 class="card-title">DigitalCircle</h5>
                    <p class="card-text">
                        Suporte ao desenvolvimento de plataformas de clientes, voltados para vários segmentos de mercado.
                        Implementação de soluções personalizadas e integração com sistemas existentes.
                    </p>
                    <div class="technologies">
                        <span class="badge badge-primary">React</span>
                        <span class="badge badge-primary">Node.js</span>
                        <span class="badge badge-primary">MongoDB</span>
                        <span class="badge badge-primary">AWS</span>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <a href="#" class="btn btn-sm btn-outline-primary VER PORTFÓLIO COMPLETO">Ver Detalhes</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4 portfolio-item" data-category="b2b web">
            <div class="card h-100">
                <img src="<?= asset_url('img/grams.png') ?>" class="card-img-top" alt="Projeto Grams">
                <div class="card-body">
                    <h5 class="card-title">Grams</h5>
                    <p class="card-text">
                        Desenvolvimento de um sistema desacoplado escalável para gestão de risco médicos.
                        O projeto incluiu controle de clientes, agendamentos e relatórios gerenciais - integração com Inteligência Artificial.
                    </p>
                    <div class="technologies">
                        <span class="badge badge-primary">Python</span>
                        <span class="badge badge-primary">Django</span>
                        <span class="badge badge-primary">PostgreSQL</span>
                        <span class="badge badge-primary">TensorFlow</span>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <a href="#" class="btn btn-sm btn-outline-primary VER PORTFÓLIO COMPLETO">Ver Detalhes</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Projetos B2P -->
    <h3 class="section-sub-title mb-4 mt-5">B2P - Business to People</h3>
    <div class="row portfolio-items">
        <div class="col-md-4 mb-4 portfolio-item" data-category="b2p web">
            <div class="card h-100">
                <img src="<?= asset_url('img/kwmartins.png') ?>" class="card-img-top" alt="Projeto KW Martins">
                <div class="card-body">
                    <h5 class="card-title">KW Martins</h5>
                    <p class="card-text">
                        Desenvolvimento de um sistema de gestão de vendas e estoque para um studio de beleza.
                        O projeto incluiu controle de clientes, agendamentos e relatórios gerenciais.
                    </p>
                    <div class="technologies">
                        <span class="badge badge-primary">PHP</span>
                        <span class="badge badge-primary">MySQL</span>
                        <span class="badge badge-primary">Bootstrap</span>
                        <span class="badge badge-primary">jQuery</span>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <a href="#" class="btn btn-sm btn-outline-primary VER PORTFÓLIO COMPLETO">Ver Detalhes</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4 portfolio-item" data-category="b2p web mobile">
            <div class="card h-100">
                <img src="<?= asset_url('img/langlearners.png') ?>" class="card-img-top" alt="Projeto LangLearners">
                <div class="card-body">
                    <h5 class="card-title">LangLearners</h5>
                    <p class="card-text">
                        Plataforma de apoio ao aprendizado de idiomas, com recursos para prática de vocabulário,
                        Integrada com Inteligência Artificial, e redes de renderização de voz, para prática de pronúncia.
                    </p>
                    <div class="technologies">
                        <span class="badge badge-primary">React</span>
                        <span class="badge badge-primary">Node.js</span>
                        <span class="badge badge-primary">MongoDB</span>
                        <span class="badge badge-primary">AI APIs</span>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <a href="#" class="btn btn-sm btn-outline-primary VER PORTFÓLIO COMPLETO">Ver Detalhes</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4 portfolio-item" data-category="b2p web">
            <div class="card h-100">
                <img src="<?= asset_url('img/amigoSecreto.jpg') ?>" class="card-img-top" alt="Projeto Amigo Secreto">
                <div class="card-body">
                    <h5 class="card-title">Plataforma Amigo Secreto</h5>
                    <p class="card-text">
                        Desenvolvimento de uma plataforma online para sorteio de amigo secreto.
                        O projeto incluiu cadastro de participantes, sorteio automático e envio de mensagens.
                    </p>
                    <div class="technologies">
                        <span class="badge badge-primary">PHP</span>
                        <span class="badge badge-primary">MySQL</span>
                        <span class="badge badge-primary">JavaScript</span>
                        <span class="badge badge-primary">Bootstrap</span>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <a href="#" class="btn btn-sm btn-outline-primary VER PORTFÓLIO COMPLETO">Ver Detalhes</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4 portfolio-item" data-category="b2p web mobile">
            <div class="card h-100">
                <img src="<?= asset_url('img/goldsmap.png') ?>" class="card-img-top" alt="Projeto GoldsMap">
                <div class="card-body">
                    <h5 class="card-title">GoldsMap</h5>
                    <p class="card-text">
                        Plataforma de mapeamento de minerais, com recursos para análise de dados geológicos e
                        visualização de mapas interativos.
                    </p>
                    <div class="technologies">
                        <span class="badge badge-primary">JavaScript</span>
                        <span class="badge badge-primary">Leaflet.js</span>
                        <span class="badge badge-primary">Node.js</span>
                        <span class="badge badge-primary">MongoDB</span>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <a href="#" class="btn btn-sm btn-outline-primary VER PORTFÓLIO COMPLETO">Ver Detalhes</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4 portfolio-item" data-category="b2p web">
            <div class="card h-100">
                <img src="<?= asset_url('img/bigzu.jpg') ?>" class="card-img-top" alt="Projeto Loja Virtual">
                <div class="card-body">
                    <h5 class="card-title">Loja Virtual</h5>
                    <p class="card-text">
                        Desenvolvimento de uma loja virtual para venda de produtos de moda e acessórios.
                        O projeto incluiu integração com meios de pagamento e cálculo de frete.
                    </p>
                    <div class="technologies">
                        <span class="badge badge-primary">WooCommerce</span>
                        <span class="badge badge-primary">WordPress</span>
                        <span class="badge badge-primary">PHP</span>
                        <span class="badge badge-primary">MySQL</span>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <a href="#" class="btn btn-sm btn-outline-primary VER PORTFÓLIO COMPLETO">Ver Detalhes</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action -->
<section class="bg-light py-5">
    <div class="container text-center">
        <h2>Vamos Desenvolver o Seu Próximo Projeto?</h2>
        <p class="lead mb-4">Entre em contato conosco para discutir suas ideias e necessidades.</p>
        <a href="<?= base_url('contato') ?>" class="btn btn-primary btn-lg">Solicitar Orçamento</a>
    </div>
</section>