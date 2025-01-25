<?php include '../includes/header.php'; ?>

<!-- Seção Sobre Nós -->
<section id="sobre" class="container">
    <h2 class="section-title">Sobre a MWM Softwares</h2>
    <div class="row">
        <div class="col-md-6">
            <p>
                A <strong>MWM Softwares</strong> é liderada por um desenvolvedor de software com mais de 10 anos de experiência,
                oferecendo serviços de alta qualidade para empresas e empreendedores. Nossa empresa tem foco na produção de
                soluções personalizadas, principalmente no desenvolvimento de <em>sites</em>, sistemas web e aplicativos.
            </p>
            <p>
                Com atuação em Portugal e experiência no mercado brasileiro, temos a missão de entregar soluções tecnológicas
                robustas e inovadoras, atendendo às necessidades específicas de cada cliente.
            </p>
        </div>
        <div class="col-md-6">
            <p>
                Trabalhamos com as mais recentes tecnologias do mercado, garantindo que nossos projetos sejam eficientes, seguros
                e escaláveis. Nossa equipe é apaixonada por tecnologia e está sempre em busca de novos desafios para oferecer
                serviços de excelência.
            </p>
            <ul>
                <li>Desenvolvimento Web e Mobile</li>
                <li>Consultoria em Arquitetura de Software</li>
                <li>Integrações de Sistemas e APIs</li>
                <li>Manutenção e Suporte Técnico</li>
            </ul>
        </div>
    </div>
</section>

<!-- Seção Serviços -->
<section id="servicos" class="container">
    <h2 class="section-title">Nossos Serviços</h2>
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <i class="fas fa-laptop-code fa-3x mb-3"></i>
            <h4>Criação de Sites</h4>
            <p>
                Desenvolvimento de sites modernos, responsivos e otimizados para mecanismos de busca (SEO).
                Seja um site institucional, blog ou loja virtual, nós cuidamos de tudo.
            </p>
        </div>
        <div class="col-md-4 mb-4">
            <i class="fas fa-code fa-3x mb-3"></i>
            <h4>Desenvolvimento de Sistemas</h4>
            <p>
                Soluções sob medida para atender as necessidades específicas do seu negócio.
                Sistemas web, aplicativos mobile e automação de processos.
            </p>
        </div>
        <div class="col-md-4 mb-4">
            <i class="fas fa-chart-line fa-3x mb-3"></i>
            <h4>Consultoria e Suporte</h4>
            <p>
                Análise de infraestrutura, arquitetura de software, estratégias de crescimento e
                acompanhamento contínuo para garantir que sua solução funcione perfeitamente.
            </p>
        </div>
    </div>
</section>

<!-- Seção Endereço -->
<section id="endereco" class="container">
    <h2 class="section-title">Onde Estamos</h2>
    <div class="row">
        <div class="col-md-6">
            <p>
                Nossa sede fica em: <strong>Rua André de Resende, 24</strong>, Portugal.
                Entre em contato para agendar uma visita ou reunião!
            </p>
        </div>
        <div class="col-md-6">
            <!-- Mapa incorporado -->
            <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3067.7603333772757!2d-8.000000!3d40.000000!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0bc00000000001%3A0x0000000000000000!2sRua+Andr%C3%A9+de+Resende!5e0!3m2!1spt-PT!2spt!4v9999999999999!5m2!1spt-PT!2spt"
                    width="100%"
                    height="250"
                    style="border: 0"
                    allowfullscreen=""
                    loading="lazy"
            ></iframe>
        </div>
    </div>
</section>

<!-- Seção Pré-Orçamento -->
<section id="contato" class="container mb-5">
    <h2 class="section-title">Solicite um Pré-Orçamento</h2>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <p class="text-center">
                Preencha o formulário abaixo e envie seus dados para receber um pré-orçamento personalizado.
                Nossa equipe retornará o contato o mais breve possível.
            </p>
            <?php
        if (isset($_GET['success'])) {
          echo '<div class="alert alert-success">Seu pré-orçamento foi enviado com sucesso!</div>';
        } elseif (isset($_GET['error'])) {
        echo '<div class="alert alert-danger">Houve um erro ao enviar seu pré-orçamento. Por favor, tente novamente.</div>';
        }
        ?>
        <form action="/send_email.php" method="POST" id="preOrcamentoForm">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome" required />
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Seu e-mail" required />
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(XX) XXXXX-XXXX" />
            </div>
            <div class="form-group">
                <label for="servicoInteresse">Qual serviço você procura?</label>
                <select class="form-control" id="servicoInteresse" name="servicoInteresse" required>
                    <option value="">Selecione...</option>
                    <option value="Criação de Site">Criação de Site</option>
                    <option value="Desenvolvimento de Sistema">Desenvolvimento de Sistema</option>
                    <option value="Aplicativo Mobile">Aplicativo Mobile</option>
                    <option value="Consultoria">Consultoria</option>
                </select>
            </div>
            <div class="form-group">
                <label for="mensagem">Mensagem</label>
                <textarea
                        class="form-control"
                        id="mensagem"
                        name="mensagem"
                        rows="4"
                        placeholder="Conte-nos um pouco mais sobre o que precisa..."
                ></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">
                Enviar Pré-Orçamento
            </button>
        </form>
    </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
