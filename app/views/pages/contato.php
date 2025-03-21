<!-- Conteúdo Principal -->
<div class="container py-5">
    <div class="row">
        <div class="col-md-8 mb-5">
            <h2 class="mb-4">Envie sua Mensagem</h2>
            <p class="mb-4">
                Preencha o formulário abaixo e envie seus dados para receber um orçamento personalizado.
                Nossa equipe retornará o contato o mais breve possível.
            </p>
            
            <form id="preOrcamentoForm" action="<?= base_url('enviar-contato') ?>" method="POST" class="needs-validation" novalidate>
                <!-- Token CSRF -->
                <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
                
                <!-- Indicador de Progresso -->
                <div class="progress mb-4 d-none" id="formProgress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                
                <!-- Passo 1: Interesse -->
                <div id="passo1" class="form-step">
                    <h4 class="mb-3 text-primary">O que você precisa?</h4>
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
                    <div class="form-group d-none" id="detalhesServico">
                        <!-- Detalhes específicos do serviço serão carregados aqui -->
                    </div>
                    <button type="button" id="passo1Btn" class="btn btn-primary">Continuar</button>
                </div>
                
                <!-- Passo 2: Dados de Contato -->
                <div id="passo2" class="form-step d-none">
                    <h4 class="mb-3 text-primary">Seus Dados de Contato</h4>
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
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="contatoWhatsapp" name="contatoWhatsapp">
                            <label class="custom-control-label" for="contatoWhatsapp">Prefiro ser contatado via WhatsApp</label>
                        </div>
                    </div>
                    <button type="button" id="voltarPasso1" class="btn btn-outline-secondary">Voltar</button>
                    <button type="button" id="passo2Btn" class="btn btn-primary ml-2">Continuar</button>
                </div>
                
                <!-- Passo 3: Detalhes Adicionais -->
                <div id="passo3" class="form-step d-none">
                    <h4 class="mb-3 text-primary">Detalhes do Projeto</h4>
                    <div class="form-group">
                        <label for="mensagem">Conte-nos um pouco sobre seu projeto (opcional)</label>
                        <textarea
                                class="form-control"
                                id="mensagem"
                                name="mensagem"
                                rows="4"
                                placeholder="Descreva brevemente o que você precisa..."
                        ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Qual é o prazo para o projeto?</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="prazoUrgente" name="prazo" value="Urgente" class="custom-control-input">
                            <label class="custom-control-label" for="prazoUrgente">Urgente (menos de 1 mês)</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="prazoMedio" name="prazo" value="Médio" class="custom-control-input">
                            <label class="custom-control-label" for="prazoMedio">Médio (1-3 meses)</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="prazoLongo" name="prazo" value="Longo" class="custom-control-input">
                            <label class="custom-control-label" for="prazoLongo">Longo (mais de 3 meses)</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="prazoFlexivel" name="prazo" value="Flexível" class="custom-control-input" checked>
                            <label class="custom-control-label" for="prazoFlexivel">Flexível/Não tenho pressa</label>
                        </div>
                    </div>
                    <button type="button" id="voltarPasso2" class="btn btn-outline-secondary">Voltar</button>
                    <button type="submit" class="btn btn-success ml-2">Enviar Solicitação</button>
                </div>
            </form>
        </div>
        
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h3 class="h5 mb-0">Informações de Contato</h3>
                </div>
                <div class="card-body">
                    <p><i class="fas fa-envelope mr-2 text-primary"></i> mwmechnology@gmail.com</p>
                    <p><i class="fas fa-phone mr-2 text-primary"></i> +351 961 021 247</p>
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

<!-- Scripts específicos para o formulário dinâmico -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Elementos do formulário
    const form = document.getElementById('preOrcamentoForm');
    const passo1 = document.getElementById('passo1');
    const passo2 = document.getElementById('passo2');
    const passo3 = document.getElementById('passo3');
    const passo1Btn = document.getElementById('passo1Btn');
    const passo2Btn = document.getElementById('passo2Btn');
    const voltarPasso1 = document.getElementById('voltarPasso1');
    const voltarPasso2 = document.getElementById('voltarPasso2');
    const progressBar = document.querySelector('#formProgress .progress-bar');
    const formProgress = document.getElementById('formProgress');
    const servicoInteresse = document.getElementById('servicoInteresse');
    const detalhesServico = document.getElementById('detalhesServico');
    
    // Mostrar detalhes específicos com base no serviço selecionado
    servicoInteresse.addEventListener('change', function() {
        const servico = this.value;
        
        if (servico) {
            detalhesServico.classList.remove('d-none');
            let html = '';
            
            switch(servico) {
                case 'Criação de Site':
                    html = `
                        <label>Que tipo de site você precisa?</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="siteTipo1" name="siteTipo" value="Site Institucional" class="custom-control-input" checked>
                            <label class="custom-control-label" for="siteTipo1">Site Institucional/Apresentação</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="siteTipo2" name="siteTipo" value="E-commerce" class="custom-control-input">
                            <label class="custom-control-label" for="siteTipo2">E-commerce/Loja Online</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="siteTipo3" name="siteTipo" value="Blog" class="custom-control-input">
                            <label class="custom-control-label" for="siteTipo3">Blog/Portal de Conteúdo</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="siteTipo4" name="siteTipo" value="Landing Page" class="custom-control-input">
                            <label class="custom-control-label" for="siteTipo4">Landing Page</label>
                        </div>
                    `;
                    break;
                    
                case 'Desenvolvimento de Sistema':
                    html = `
                        <label>Qual o foco principal do sistema?</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="sistemaTipo1" name="sistemaTipo" value="Gestão" class="custom-control-input" checked>
                            <label class="custom-control-label" for="sistemaTipo1">Gestão Empresarial</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="sistemaTipo2" name="sistemaTipo" value="Financeiro" class="custom-control-input">
                            <label class="custom-control-label" for="sistemaTipo2">Financeiro/Contábil</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="sistemaTipo3" name="sistemaTipo" value="CRM" class="custom-control-input">
                            <label class="custom-control-label" for="sistemaTipo3">CRM/Gestão de Clientes</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="sistemaTipo4" name="sistemaTipo" value="Outro" class="custom-control-input">
                            <label class="custom-control-label" for="sistemaTipo4">Outro</label>
                        </div>
                    `;
                    break;
                    
                case 'Aplicativo Mobile':
                    html = `
                        <label>Para quais plataformas?</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="plataformaAndroid" name="plataforma[]" value="Android" class="custom-control-input" checked>
                            <label class="custom-control-label" for="plataformaAndroid">Android</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="plataformaIOS" name="plataforma[]" value="iOS" class="custom-control-input" checked>
                            <label class="custom-control-label" for="plataformaIOS">iOS (iPhone/iPad)</label>
                        </div>
                    `;
                    break;
                    
                case 'Consultoria':
                    html = `
                        <label>Qual o foco da consultoria?</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="consultoriaTipo1" name="consultoriaTipo" value="Arquitetura" class="custom-control-input" checked>
                            <label class="custom-control-label" for="consultoriaTipo1">Arquitetura de Software</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="consultoriaTipo2" name="consultoriaTipo" value="Processos" class="custom-control-input">
                            <label class="custom-control-label" for="consultoriaTipo2">Processos de Desenvolvimento</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="consultoriaTipo3" name="consultoriaTipo" value="Tecnologias" class="custom-control-input">
                            <label class="custom-control-label" for="consultoriaTipo3">Escolha de Tecnologias</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="consultoriaTipo4" name="consultoriaTipo" value="Outro" class="custom-control-input">
                            <label class="custom-control-label" for="consultoriaTipo4">Outro</label>
                        </div>
                    `;
                    break;
                    
                default:
                    detalhesServico.classList.add('d-none');
            }
            
            detalhesServico.innerHTML = html;
        } else {
            detalhesServico.classList.add('d-none');
        }
    });
    
    // Avançar para o Passo 2
    passo1Btn.addEventListener('click', function() {
        if (servicoInteresse.value === '') {
            servicoInteresse.classList.add('is-invalid');
            return;
        }
        
        servicoInteresse.classList.remove('is-invalid');
        passo1.classList.add('d-none');
        passo2.classList.remove('d-none');
        formProgress.classList.remove('d-none');
        progressBar.style.width = '66%';
        progressBar.setAttribute('aria-valuenow', '66');
        
        // Registrar evento no Facebook Pixel
        if (typeof fbq !== 'undefined') {
            fbq('trackCustom', 'FormStep2', {
                servico: servicoInteresse.value
            });
        }
    });
    
    // Avançar para o Passo 3
    passo2Btn.addEventListener('click', function() {
        const nome = document.getElementById('nome');
        const email = document.getElementById('email');
        const telefone = document.getElementById('telefone');
        const servicoInteresse = document.getElementById('servicoInteresse');
        const formData = new FormData();
        
        // Validar campos obrigatórios
        let isValid = true;
        
        if (nome.value === '') {
            nome.classList.add('is-invalid');
            isValid = false;
        } else {
            nome.classList.remove('is-invalid');
        }
        
        if (email.value === '' || !email.value.includes('@')) {
            email.classList.add('is-invalid');
            isValid = false;
        } else {
            email.classList.remove('is-invalid');
        }
        
        if (!isValid) return;
        
        // Mostrar indicador de carregamento
        const originalBtnText = passo2Btn.innerHTML;
        passo2Btn.innerHTML = '<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Salvando...';
        passo2Btn.disabled = true;
        
        // Preparar dados para envio
        formData.append('nome', nome.value);
        formData.append('email', email.value);
        formData.append('telefone', telefone.value);
        formData.append('servicoInteresse', servicoInteresse.value);
        formData.append('csrf_token', document.querySelector('input[name="csrf_token"]').value);
        
        if (document.getElementById('contatoWhatsapp').checked) {
            formData.append('contatoWhatsapp', '1');
        }
        
        // Enviar dados parciais via AJAX
        fetch('<?= base_url('salvar-contato-parcial') ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Restaurar botão
            passo2Btn.innerHTML = originalBtnText;
            passo2Btn.disabled = false;
            
            if (data.success) {
                // Avançar para o próximo passo
                passo2.classList.add('d-none');
                passo3.classList.remove('d-none');
                progressBar.style.width = '100%';
                progressBar.setAttribute('aria-valuenow', '100');
                
                // Registrar evento no Facebook Pixel
                if (typeof fbq !== 'undefined') {
                    fbq('trackCustom', 'FormStep3', {
                        servico: servicoInteresse.value
                    });
                }
                
                // Adicionar mensagem de confirmação sutil
                const alertDiv = document.createElement('div');
                alertDiv.className = 'alert alert-success alert-dismissible fade show mt-3';
                alertDiv.innerHTML = 'Seus dados de contato foram salvos! Complete o formulário para finalizar.';
                alertDiv.innerHTML += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
                passo3.prepend(alertDiv);
                
                // Remover a mensagem após 5 segundos
                setTimeout(() => {
                    alertDiv.classList.remove('show');
                    setTimeout(() => alertDiv.remove(), 150);
                }, 5000);
            } else {
                // Mostrar erro, mas permitir avançar
                console.error('Erro ao salvar dados parcialmente:', data.message);
                
                // Avançar mesmo assim para não bloquear o usuário
                passo2.classList.add('d-none');
                passo3.classList.remove('d-none');
                progressBar.style.width = '100%';
                progressBar.setAttribute('aria-valuenow', '100');
            }
        })
        .catch(error => {
            console.error('Erro na requisição:', error);
            passo2Btn.innerHTML = originalBtnText;
            passo2Btn.disabled = false;
            
            // Avançar mesmo em caso de erro para não bloquear o usuário
            passo2.classList.add('d-none');
            passo3.classList.remove('d-none');
            progressBar.style.width = '100%';
            progressBar.setAttribute('aria-valuenow', '100');
        });
    });
    
    // Voltar para o Passo 1
    voltarPasso1.addEventListener('click', function() {
        passo2.classList.add('d-none');
        passo1.classList.remove('d-none');
        progressBar.style.width = '33%';
        progressBar.setAttribute('aria-valuenow', '33');
    });
    
    // Voltar para o Passo 2
    voltarPasso2.addEventListener('click', function() {
        passo3.classList.add('d-none');
        passo2.classList.remove('d-none');
        progressBar.style.width = '66%';
        progressBar.setAttribute('aria-valuenow', '66');
    });
    
    // Submissão do formulário
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validar campos obrigatórios
        let isValid = true;
        const nome = document.getElementById('nome');
        const email = document.getElementById('email');
        
        if (nome.value === '') {
            nome.classList.add('is-invalid');
            isValid = false;
        } else {
            nome.classList.remove('is-invalid');
        }
        
        if (email.value === '' || !email.value.includes('@')) {
            email.classList.add('is-invalid');
            isValid = false;
        } else {
            email.classList.remove('is-invalid');
        }
        
        if (isValid) {
            // Mostrar indicador de carregamento
            const submitBtn = e.target.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Enviando...';
            submitBtn.disabled = true;
            
            // Registrar evento no Facebook Pixel
            if (typeof fbq !== 'undefined') {
                fbq('trackCustom', 'FormSubmission', {
                    servico: servicoInteresse.value
                });
            }
            
            // Enviar formulário
            this.submit();
        }
    });
});
</script> 

