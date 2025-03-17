<!-- Cabeçalho da Página -->
<div class="page-header bg-primary text-white">
    <div class="container py-5">
        <h1>Sobre Nós</h1>
        <p class="lead">Conheça a história e os valores da MWM Softwares</p>
    </div>
</div>

<!-- Conteúdo Principal -->
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <h2>Nossa História</h2>
            <p>
                A MWM Softwares nasceu da paixão por tecnologia e da vontade de criar soluções que realmente façam a diferença para empresas e empreendedores. 
                Fundada por um desenvolvedor com mais de uma década de experiência no mercado, nossa empresa tem crescido consistentemente, 
                mantendo sempre o foco na qualidade e na satisfação dos clientes.
            </p>
            
            <p>
                Com atuação em Portugal e experiência no mercado brasileiro, temos uma visão global do desenvolvimento de software, 
                combinando as melhores práticas internacionais com um atendimento personalizado e próximo.
            </p>
            
            <h2 class="mt-5">Nossa Missão</h2>
            <p>
                Desenvolver soluções tecnológicas inovadoras e de alta qualidade que impulsionem o crescimento e a eficiência dos nossos clientes, 
                sempre com foco na usabilidade, segurança e escalabilidade.
            </p>
            
            <h2 class="mt-5">Nossa Visão</h2>
            <p>
                Ser reconhecida como referência em desenvolvimento de software em Portugal, destacando-se pela excelência técnica, 
                inovação constante e relacionamentos duradouros com os clientes.
            </p>
            
            <h2 class="mt-5">Nossos Valores</h2>
            <ul>
                <li><strong>Excelência Técnica:</strong> Buscamos sempre as melhores soluções e práticas de desenvolvimento.</li>
                <li><strong>Inovação:</strong> Estamos constantemente atualizados com as mais recentes tecnologias e tendências.</li>
                <li><strong>Transparência:</strong> Mantemos uma comunicação clara e honesta em todos os projetos.</li>
                <li><strong>Compromisso:</strong> Cumprimos prazos e entregamos o que prometemos.</li>
                <li><strong>Foco no Cliente:</strong> As necessidades dos nossos clientes estão no centro de tudo o que fazemos.</li>
            </ul>
        </div>
        
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h3 class="h5 mb-0">Experiência</h3>
                </div>
                <div class="card-body">
                    <p>Mais de 10 anos de experiência em desenvolvimento de software para diversos segmentos.</p>
                </div>
            </div>
            
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h3 class="h5 mb-0">Tecnologias</h3>
                </div>
                <div class="card-body">
                    <p>Trabalhamos com as mais modernas tecnologias de desenvolvimento web e mobile.</p>
                    <div class="tech-icons text-center">
                        <i class="fab fa-html5 fa-2x mx-2"></i>
                        <i class="fab fa-css3-alt fa-2x mx-2"></i>
                        <i class="fab fa-js-square fa-2x mx-2"></i>
                        <i class="fab fa-php fa-2x mx-2"></i>
                        <i class="fab fa-react fa-2x mx-2"></i>
                        <i class="fab fa-node-js fa-2x mx-2"></i>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="h5 mb-0">Contato Direto</h3>
                </div>
                <div class="card-body">
                    <p>Fale diretamente com nossa equipe:</p>
                    <p><i class="fas fa-envelope mr-2"></i> mwmechnology@gmail.com</p>
                    <p><i class="fas fa-phone mr-2"></i> +351 912 345 678</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Equipe -->
<div class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-5">Nossa Equipe</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card text-center h-100">
                    <img src="<?= asset_url('img/team-1.jpg') ?>" class="card-img-top" alt="Membro da Equipe">
                    <div class="card-body">
                        <h5 class="card-title">Marcos Weudes</h5>
                        <p class="card-text text-muted">Fundador & Desenvolvedor Sênior</p>
                        <p class="card-text">Especialista em arquitetura de software e desenvolvimento de sistemas complexos.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center h-100">
                    <img src="<?= asset_url('img/team-2.jpg') ?>" class="card-img-top" alt="Membro da Equipe">
                    <div class="card-body">
                        <h5 class="card-title">Ana Silva</h5>
                        <p class="card-text text-muted">UX/UI Designer</p>
                        <p class="card-text">Responsável por criar interfaces intuitivas e experiências de usuário excepcionais.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center h-100">
                    <img src="<?= asset_url('img/team-3.jpg') ?>" class="card-img-top" alt="Membro da Equipe">
                    <div class="card-body">
                        <h5 class="card-title">Pedro Santos</h5>
                        <p class="card-text text-muted">Desenvolvedor Full Stack</p>
                        <p class="card-text">Especialista em tecnologias front-end e back-end, com foco em performance e segurança.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="container py-5 text-center">
    <h2>Pronto para Trabalhar Conosco?</h2>
    <p class="lead mb-4">Entre em contato hoje mesmo para discutirmos seu projeto.</p>
    <a href="<?= base_url('contato') ?>" class="btn btn-primary btn-lg">Solicitar Orçamento</a>
</div> 