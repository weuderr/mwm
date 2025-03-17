<!-- Cabeçalho da Página -->
<div class="page-header bg-primary text-white">
    <div class="container py-5">
        <h1>Fale Conosco</h1>
        <p class="lead">Entre em contato para solicitar um orçamento ou tirar suas dúvidas</p>
    </div>
</div>

<!-- Conteúdo Principal -->
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <h2 class="mb-4">Envie sua Mensagem</h2>
            <p class="mb-4">
                Preencha o formulário abaixo e envie seus dados para receber um orçamento personalizado.
                Nossa equipe retornará o contato o mais breve possível.
            </p>
            
            <form id="preOrcamentoForm" action="<?= base_url('enviar-contato') ?>" method="POST" class="needs-validation" novalidate>
                <!-- Token CSRF -->
                <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nome">Nome <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome" required/>
                        <div class="invalid-feedback">
                            Por favor, insira seu nome.
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">E-mail <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Seu e-mail" required/>
                        <div class="invalid-feedback">
                            Por favor, insira um e-mail válido.
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="+XXX (XX) XXXXX-XXXX"/>
                </div>
                <div class="form-group">
                    <label for="servicoInteresse">Qual serviço você procura? <span class="text-danger">*</span></label>
                    <select class="form-control" id="servicoInteresse" name="servicoInteresse" required>
                        <option value="">Selecione...</option>
                        <option value="Criação de Site">Criação de Site</option>
                        <option value="Desenvolvimento de Sistema">Desenvolvimento de Sistema</option>
                        <option value="Aplicativo Mobile">Aplicativo Mobile</option>
                        <option value="Consultoria">Consultoria</option>
                    </select>
                    <div class="invalid-feedback">
                        Por favor, selecione um serviço de interesse.
                    </div>
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
                <button type="submit" class="btn btn-primary btn-lg">
                    Enviar Solicitação
                </button>
            </form>
        </div>
        
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h3 class="h5 mb-0">Informações de Contato</h3>
                </div>
                <div class="card-body">
                    <p><i class="fas fa-envelope mr-2 text-primary"></i> mwmechnology@gmail.com</p>
                    <p><i class="fas fa-phone mr-2 text-primary"></i> +351 912 345 678</p>
                    <p><i class="fas fa-map-marker-alt mr-2 text-primary"></i> Rua André de Resende, 24 - Porto, Portugal</p>
                    <p><i class="fas fa-clock mr-2 text-primary"></i> Segunda a Sexta: 9h às 18h</p>
                </div>
            </div>
            
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h3 class="h5 mb-0">Redes Sociais</h3>
                </div>
                <div class="card-body">
                    <div class="social-icons">
                        <a href="#" class="text-primary mr-3"><i class="fab fa-facebook fa-2x"></i></a>
                        <a href="#" class="text-primary mr-3"><i class="fab fa-linkedin fa-2x"></i></a>
                        <a href="#" class="text-primary mr-3"><i class="fab fa-instagram fa-2x"></i></a>
                        <a href="#" class="text-primary"><i class="fab fa-github fa-2x"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mapa -->
<div class="container-fluid p-0 mb-5">
    <div class="map-container">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3067.7603333772757!2d-8.000000!3d40.000000!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0bc00000000001%3A0x0000000000000000!2sRua+Andr%C3%A9+de+Resende!5e0!3m2!1spt-PT!2spt!4v9999999999999!5m2!1spt-PT!2spt"
            width="100%"
            height="450"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            aria-label="Mapa da localização da MWM Softwares"
        ></iframe>
    </div>
</div> 