<?php
require_once '../config/autenticar.php';
include '../template/header.php';
require_once __DIR__ . '/../dao/servicoDAO.php';

$servico = new ServicoDAO();

$listaServico = $servico->listarServicos();
?>
<main class="d-flex">
    <?php include('../template/menu.php'); ?>

    <section class="sessao-dashboard bg-light w-100 p-4 d-flex flex-column gap-3">
        <header class="bg-white border p-2 rounded">
            <nav class="navbar">
                <div class="container-fluid d-flex justify-content-between align-items-center">

                    <a class="navbar-brand fw-normal fs-5" href="#">
                        <i class="bi bi-scissors"></i> Serviços
                    </a>

                    <a class="d-flex flex-column gap-1 text-decoration-none align-items-end" href="#">
                        <span class="fw-semibold text-dark"><?= $_SESSION['nomeUsuario'] ?></span>
                        <small class="text-muted"><?= $_SESSION['email'] ?></small>
                    </a>
                </div>
            </nav>
        </header>

        <section class="bg-white border rounded">
            <div class="filtros-tabela container-fluid my-3">
                <div class="row g-3">

                    <div class="col-12 col-md-6 d-flex align-items-center">
                        <form action="" method="GET" class="d-flex w-100">
                            <input
                                type="text"
                                name="profissional_pesquisa"
                                class="form-control me-2"
                                placeholder="Pesquisar..."
                                style="max-width: 400px;">
                            <button class="btn btn-outline-dark">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
                    </div>

                    <div class="col-12 col-md-6 d-flex justify-content-end align-items-center gap-2">
                        <button
                            class="btn btn-warning"
                            data-bs-toggle="modal"
                            data-bs-target="#modalCadastrarServico">
                            <i class="bi bi-scissors"></i>
                            Cadastrar Serviço
                        </button>

                    </div>
                </div>

        </section>

        <section class="sessao_servicos bg-white border">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Serviço</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Duração</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listaServico as $servico) {

                            $esta_ativo = $servico['ativo'] == 0;

                            $status_text = $esta_ativo ? 'Ativo' : 'Desativado';
                            $status_class = $esta_ativo
                                ? 'bg-success badge bg-opacity-50 fw-semibold text-success-emphasis'
                                : 'bg-danger badge bg-opacity-50 text-danger-emphasis';

                            $botao_editar = $esta_ativo ? '' : 'd-none';
                            $acao_modal = $esta_ativo ? 'modalDesativarServico' : 'modalAtivarServico';
                            $acao_class = $esta_ativo ? 'btn-danger' : 'btn-success';
                            $acao_icone = $esta_ativo ? 'bi-trash' : 'bi-check-circle';

                        ?>
                            <tr>
                                <td><?= $servico['nome'] ?></td>
                                <td>R$ <?= number_format($servico['preco'], 2, ',', '.') ?></td>
                                <td><?= $servico['duracao'] ?> min</td>

                                <td>
                                    <span class="text-center <?= $status_class ?> fs-6">
                                        <?= $status_text ?>
                                    </span>
                                </td>

                                <td>
                                    <button class="btn btn-warning text-white me-1 <?= $botao_editar ?>"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEditarServico"
                                        data-id="<?= $servico['id_servico'] ?>"
                                        data-nome="<?= $servico['nome'] ?>"
                                        data-preco="<?= number_format($servico['preco'], 2, '.', '') ?>"
                                        data-duracao="<?= $servico['duracao'] ?>"
                                        data-descricao="<?= $servico['descricao'] ?>"
                                        data-foto="<?= $servico['foto_servico'] ?>">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <button class="btn <?= $acao_class ?>"
                                        data-bs-toggle="modal"
                                        data-bs-target="#<?= $acao_modal ?>"
                                        data-id="<?= $servico['id_servico'] ?>"
                                        data-nome="<?= $servico['nome'] ?>">
                                        <i class="<?= $acao_icone ?>"></i>
                                    </button>

                                    <button class="btn btn-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalDetalhesServico"
                                        data-id="<?= $servico['id_servico'] ?>"
                                        data-nome="<?= $servico['nome'] ?>"
                                        data-preco="<?= $servico['preco'] ?>"
                                        data-duracao="<?= $servico['duracao'] ?>"
                                        data-descricao="<?= $servico['descricao'] ?>"
                                        data-foto="<?= $servico['foto_servico'] ?>">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>


    </section>

    <?php include('../template/modal-servicos/cadastrar-servico.php') ?>
    <?php include('../template/modal-servicos/modal-desativar-servico.php') ?>
    <?php include('../template/modal-servicos/modal-ativar-servico.php') ?>
    <?php include('../template/modal-servicos/modal-editar-servico.php') ?>
    <?php include('../template/modal-servicos/modal-detalhes-servico.php') ?>

</main>
</main>
<script src="https://unpkg.com/imask"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

<script src="../asset/js/servicos.js"></script>

<script>
    const btnMenu = document.getElementById('btn-menu');
    const menu = document.querySelector('.menu_lateral');
    const body = document.body;

    btnMenu.addEventListener('click', () => {
        menu.classList.toggle('ativo');
        body.classList.toggle('menu-aberto');
    });
</script>
</body>

</html>