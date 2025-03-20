<h1 class="mb-4">Dashboard Administrativo</h1>

<?php $flashMessage = get_flash_message(); ?>
<?php if ($flashMessage): ?>
<div class="alert alert-<?= $flashMessage['type'] == 'error' ? 'danger' : $flashMessage['type'] ?> alert-dismissible fade show" role="alert">
    <?= $flashMessage['message'] ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif; ?>

<!-- Resumo rápido -->
<div class="row">
    <div class="col-md-4">
        <div class="admin-card">
            <div class="card-body d-flex align-items-center">
                <div class="mr-4 bg-primary text-white rounded-circle p-3">
                    <i class="fas fa-envelope fa-2x"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Total de Contatos</h6>
                    <h3 class="mb-0"><?= count($contacts) ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="admin-card">
            <div class="card-body d-flex align-items-center">
                <div class="mr-4 bg-success text-white rounded-circle p-3">
                    <i class="fas fa-calendar-day fa-2x"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Contatos Hoje</h6>
                    <h3 class="mb-0">
                        <?php
                        $today = array_filter($contacts, function($contact) {
                            return date('Y-m-d', strtotime($contact['data_envio'])) === date('Y-m-d');
                        });
                        echo count($today);
                        ?>
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="admin-card">
            <div class="card-body d-flex align-items-center">
                <div class="mr-4 bg-info text-white rounded-circle p-3">
                    <i class="fas fa-calendar-week fa-2x"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Contatos na Semana</h6>
                    <h3 class="mb-0">
                        <?php
                        $weekStart = date('Y-m-d', strtotime('monday this week'));
                        $weekEnd = date('Y-m-d', strtotime('sunday this week'));
                        $thisWeek = array_filter($contacts, function($contact) use ($weekStart, $weekEnd) {
                            $date = date('Y-m-d', strtotime($contact['data_envio']));
                            return $date >= $weekStart && $date <= $weekEnd;
                        });
                        echo count($thisWeek);
                        ?>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Lista de contatos -->
<div class="admin-card mt-4">
    <div class="admin-card-header">
        <h5 class="admin-card-title">Contatos Recebidos</h5>
    </div>
    <div class="admin-card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0" id="contatosTable">
                <thead class="thead-light">
                    <tr>
                        <th>Data</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Serviço</th>
                        <th width="150">Mensagem</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($contacts)): ?>
                    <tr>
                        <td colspan="7" class="text-center py-4">Nenhum contato recebido ainda.</td>
                    </tr>
                    <?php else: ?>
                        <?php foreach ($contacts as $contact): ?>
                        <tr>
                            <td><?= date('d/m/Y H:i', strtotime($contact['data_envio'])) ?></td>
                            <td><?= escape($contact['nome']) ?></td>
                            <td>
                                <a href="#" class="copy-email" data-email="<?= escape($contact['email']) ?>" title="Copiar e-mail">
                                    <?= escape($contact['email']) ?>
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" class="copy-phone" data-phone="<?= escape($contact['telefone']) ?>" title="Copiar telefone">
                                        <?= escape($contact['telefone']) ?>
                                    </a>
                                    <a href="#" class="open-whatsapp ml-2" data-phone="<?= escape($contact['telefone']) ?>" title="Abrir WhatsApp">
                                        <i class="fab fa-whatsapp text-success"></i>
                                    </a>
                                </div>
                            </td>
                            <td><?= escape($contact['servico']) ?></td>
                            <td>
                                <?php if (!empty($contact['mensagem'])): ?>
                                    <div class="message-preview" data-toggle="modal" data-target="#messageModal<?= $contact['id'] ?>">
                                        <?= mb_substr(escape($contact['mensagem']), 0, 30) ?>...
                                    </div>
                                    
                                    <!-- Modal da mensagem -->
                                    <div class="modal fade" id="messageModal<?= $contact['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Mensagem de <?= escape($contact['nome']) ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?= nl2br(escape($contact['mensagem'])) ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <span class="text-muted">Sem mensagem</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <form method="POST" action="<?= base_url('admin/delete-contact') ?>" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este contato?');">
                                    <input type="hidden" name="id" value="<?= $contact['id'] ?>">
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
.message-preview {
    max-width: 200px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.message-content {
    white-space: pre-line;
    max-height: 300px;
    overflow-y: auto;
}

.contato-row:hover {
    background-color: rgba(0, 123, 255, 0.1);
    transition: background-color 0.2s;
}

.modal-dialog {
    margin: 1.75rem auto;
    display: flex;
    align-items: center;
    min-height: calc(100% - 3.5rem);
}

.modal-content {
    max-height: 90vh;
    overflow-y: auto;
}

.modal-body {
    overflow-y: auto;
    max-height: calc(90vh - 170px);
}

.copiar-feedback {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 10px 20px;
    border-radius: 4px;
    z-index: 9999;
}

.whatsapp-instrucoes {
    margin-top: 15px;
    padding: 15px;
    background-color: #f8f9fa;
    border-radius: 5px;
    border-left: 4px solid #25d366;
}
</style>

<script>
// Função para mostrar instruções de WhatsApp
function mostrarInstrucoesWhatsApp(telefoneFormatado, numeroLimpo) {
    // Verificar se já existe um elemento de instruções
    let instrucoes = document.querySelector('.whatsapp-instrucoes');
    
    // Se já existir, remover
    if (instrucoes) {
        instrucoes.remove();
    } else {
        // Criar novo elemento de instruções
        instrucoes = document.createElement('div');
        instrucoes.className = 'whatsapp-instrucoes';
        instrucoes.innerHTML = `
            <h6>Como contatar via WhatsApp:</h6>
            <p>Número de WhatsApp: <strong>${telefoneFormatado}</strong></p>
            <p>Opções:</p>
            <ol>
                <li>Copie o número acima e adicione aos seus contatos</li>
                <li>Abra o WhatsApp em seu celular e busque este contato</li>
                <li>Ou use este link: <a href="#" onclick="copiarLink('https://wa.me/${numeroLimpo}')">https://wa.me/${numeroLimpo}</a> <button class="btn btn-sm btn-outline-success" onclick="copiarLink('https://wa.me/${numeroLimpo}')">Copiar Link</button></li>
            </ol>
        `;
        
        // Inserir após o último .card no .modal-body
        const modalBody = document.querySelector('.modal.show .modal-body');
        if (modalBody) {
            modalBody.appendChild(instrucoes);
            
            // Scroll até as instruções
            instrucoes.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }
}

// Função para copiar link do WhatsApp
function copiarLink(link) {
    navigator.clipboard.writeText(link).then(function() {
        mostrarFeedback('Link copiado para a área de transferência!');
    }).catch(function() {
        // Fallback para navegadores que não suportam clipboard API
        const textarea = document.createElement('textarea');
        textarea.value = link;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);
        mostrarFeedback('Link copiado para a área de transferência!');
    });
}

// Função para copiar e-mail para a área de transferência
function copiarEmail(email) {
    navigator.clipboard.writeText(email).then(function() {
        mostrarFeedback('E-mail copiado!');
    }).catch(function() {
        // Fallback para navegadores que não suportam clipboard API
        const textarea = document.createElement('textarea');
        textarea.value = email;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);
        mostrarFeedback('E-mail copiado!');
    });
}

// Função para copiar telefone para a área de transferência
function copiarTelefone(telefone) {
    navigator.clipboard.writeText(telefone).then(function() {
        mostrarFeedback('Telefone copiado!');
    }).catch(function() {
        // Fallback para navegadores que não suportam clipboard API
        const textarea = document.createElement('textarea');
        textarea.value = telefone;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);
        mostrarFeedback('Telefone copiado!');
    });
}

// Função para mostrar feedback ao copiar
function mostrarFeedback(mensagem) {
    // Remover feedback existente
    const feedbackExistente = document.querySelector('.copiar-feedback');
    if (feedbackExistente) {
        document.body.removeChild(feedbackExistente);
    }
    
    // Criar e mostrar novo feedback
    const feedback = document.createElement('div');
    feedback.className = 'copiar-feedback';
    feedback.textContent = mensagem;
    document.body.appendChild(feedback);
    
    // Remover feedback após 2 segundos
    setTimeout(function() {
        if (document.body.contains(feedback)) {
            document.body.removeChild(feedback);
        }
    }, 2000);
}
</script> 