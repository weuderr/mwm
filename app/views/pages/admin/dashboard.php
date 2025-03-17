<!-- Cabeçalho da Página -->
<div class="page-header bg-primary text-white">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1>Painel Administrativo</h1>
                <p class="lead mb-0">Gerenciamento de Contatos</p>
            </div>
            <div class="col-md-4 text-md-right">
                <a href="<?= base_url('admin/logout') ?>" class="btn btn-light">
                    <i class="fas fa-sign-out-alt mr-2"></i> Sair
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Lista de Contatos -->
<div class="container py-5">
    <?php $flashMessage = get_flash_message(); ?>
    <?php if ($flashMessage): ?>
    <div class="alert alert-<?= $flashMessage['type'] == 'error' ? 'danger' : $flashMessage['type'] ?> alert-dismissible fade show" role="alert">
        <?= $flashMessage['message'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title mb-0">Contatos Recebidos</h3>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>Data</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Serviço</th>
                            <th>Mensagem</th>
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
                                <td><?= escape($contact['email']) ?></td>
                                <td><?= escape($contact['telefone']) ?></td>
                                <td><?= escape($contact['servico']) ?></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#messageModal<?= $contact['id'] ?>">
                                        Ver Mensagem
                                    </button>
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

                            <!-- Modal da Mensagem -->
                            <div class="modal fade" id="messageModal<?= $contact['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel<?= $contact['id'] ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="messageModalLabel<?= $contact['id'] ?>">Mensagem de <?= escape($contact['nome']) ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?= nl2br(escape($contact['mensagem'])) ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 