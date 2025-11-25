<?php
require_once '../config/autenticar.php';
include '../template/header.php';
require_once __DIR__ . '/../dao/ProfissionalDAO.php';

$dao = new ProfissionalDAO();

if (isset($_GET['profissional_pesquisa']) && $_GET['profissional_pesquisa'] !== '') {
    $pesquisa = $_GET['profissional_pesquisa'];
    $listaProfissionais = $dao->pesquisarProfissionais($pesquisa);

}
else if (isset($_GET['status']) && $_GET['status'] !== '') {
    $status = $_GET['status'];
    $listaProfissionais = $dao->filtrarStatusProfissional($status);

}
else {
    $listaProfissionais = $dao->listarProfissionais();
}

?>
<main class="d-flex">
    <?php include('../template/menu.php'); ?>

    <section class="sessao-dashboard bg-light w-100 p-4 d-flex flex-column gap-3">
        <header class="bg-white border p-2 rounded">
            <nav class="navbar">
                <div class="container-fluid d-flex justify-content-between align-items-center">

                    <a class="navbar-brand fw-normal fs-5" href="#">
                        <i class="bi bi-briefcase"></i> Profissionais
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
                        <form action="profissionais.php" method="GET" class="d-flex w-100">
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

                        <div class="dropdown-center">
                            <a class="btn btn-dark dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false"
                                data-bs-auto-close="false"> <i class="bi bi-filter"></i>
                                Filtrar Profissionais
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <div class="dropend">
                                        <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                            Avaliação
                                        </a>
                                        <ul class="dropdown-menu">

                                            <li><a class="dropdown-item d-flex align-items-center gap-1" href="?avaliacao=1">
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                </a></li>

                                            <li><a class="dropdown-item d-flex align-items-center gap-1" href="?avaliacao=2">
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                </a></li>

                                            <li><a class="dropdown-item d-flex align-items-center gap-1" href="?avaliacao=3">
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                </a></li>

                                            <li><a class="dropdown-item d-flex align-items-center gap-1" href="?avaliacao=4">
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                </a></li>

                                            <li><a class="dropdown-item d-flex align-items-center gap-1" href="?avaliacao=5">
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                </a></li>

                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <div class="dropend">
                                        <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                            Status
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="./profissionais.php?status=todos"><i class="bi bi-people-fill"></i> Todos</a></li>
                                            <li><a class="dropdown-item" href="./profissionais.php?status=ativo"><i class="bi bi-check-circle-fill text-success"></i> Ativos</a></li>
                                            <li><a class="dropdown-item" href="./profissionais.php?status=desativo"><i class="bi bi-x-circle-fill text-danger"></i> Desativos</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <button
                            class="btn btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#modalCadastro">
                            <i class="bi bi-person-plus"></i>
                            Cadastrar profissional</button>
                    </div>

                </div>
            </div>

        </section>

        <section class="bg-white border rounded">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Especialidade</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if (empty($listaProfissionais)) { ?>

                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    <img src="../asset/img/profissional_não_encontrado.png" width="500px" alt="" class="img-fluid">
                                    <p class="fs-4 text-muted fw-bold">Nenhum profissional encontrado</p>
                                </td>
                            </tr>

                        <?php } else { ?>

                            <?php foreach ($listaProfissionais as $profissionais) {

                                $esta_ativo = $profissionais['ativo'] == 0;

                                $status_text = $esta_ativo ? 'Ativo' : 'Desativado';

                                $status_class = $esta_ativo
                                    ? 'bg-success badge bg-opacity-50 fw-semibold text-success-emphasis'
                                    : 'bg-danger badge bg-opacity-50 text-danger-emphasis';

                                $acao_nome = $esta_ativo ? 'Desativar' : 'Ativar';
                                $acao_class = $esta_ativo ? 'btn-danger' : 'btn-success';
                                $acao_icone = $esta_ativo ? 'bi-trash' : 'bi-check-circle';
                                $acao_modal = $esta_ativo ? 'modalDesativarProfissional' : 'modalAtivarProfissional';
                                $acao_gerenciar = $esta_ativo ? 'desativar_profissional' : 'ativar_profissional';
                                $botao_editar = $esta_ativo ? '' : 'd-none';

                                $caminho_foto = $profissionais['foto_perfil'];
                                $nome_profissional = $profissionais['nome'];
                            ?>

                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">

                                            <img
                                                src="<?= $caminho_foto ?>"
                                                alt="Foto de Perfil de <?= $nome_profissional ?>"
                                                class="img-fluid rounded-circle me-3"
                                                style="width: 50px; height: 50px; object-fit: cover;">

                                            <div class="d-flex flex-column">
                                                <span class="fw-bold text-dark">
                                                    <?= $nome_profissional ?>
                                                </span>
                                            </div>

                                        </div>
                                    </th>

                                    <td><?= $profissionais['especialidade'] ?></td>
                                    <td><?= $profissionais['telefone'] ?></td>
                                    <td><?= $profissionais['email'] ?></td>

                                    <td>
                                        <span class="text-center <?= $status_class ?> fs-6">
                                            <?= $status_text ?>
                                        </span>
                                    </td>

                                    <td>
                                        <button class="btn <?= $acao_class ?> text-white"
                                            data-bs-toggle="modal"
                                            data-bs-target="#<?= $acao_modal ?>"
                                            data-id="<?= $profissionais['id_profissional'] ?>"
                                            data-nome="<?= $profissionais['nome'] ?>"
                                            data-acao="<?= $acao_gerenciar ?>"
                                            data-ativo="<?= $profissionais['ativo'] ?>">
                                            <i class="<?= $acao_icone ?>"></i>
                                        </button>

                                        <button class="btn btn-warning <?= $botao_editar ?>"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalEditarProfissional"
                                            data-id="<?= $profissionais['id_profissional'] ?>"
                                            data-nome="<?= $profissionais['nome'] ?>"
                                            data-especialidade="<?= $profissionais['especialidade'] ?>"
                                            data-telefone="<?= $profissionais['telefone'] ?>"
                                            data-email="<?= $profissionais['email'] ?>"
                                            data-cpf="<?= $profissionais['cpf'] ?>"
                                            data-foto="<?= $profissionais['foto_perfil'] ?>"
                                            data-ativo="<?= $profissionais['ativo'] ?>">
                                            <i class="bi bi-pen text-white"></i>
                                        </button>

                                        <button class="btn btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalDetalhesProfissional"
                                            data-id="<?= $profissionais['id_profissional'] ?>"
                                            data-nome="<?= $profissionais['nome'] ?>"
                                            data-especialidade="<?= $profissionais['especialidade'] ?>"
                                            data-telefone="<?= $profissionais['telefone'] ?>"
                                            data-email="<?= $profissionais['email'] ?>"
                                            data-cpf="<?= $profissionais['cpf'] ?>"
                                            data-foto="<?= $profissionais['foto_perfil'] ?>"
                                            data-ativo="<?= $profissionais['ativo'] ?>">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </td>
                                </tr>

                            <?php } ?>

                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </section>
    </section>


    <?php include('../template/modal_cadastro.php') ?>
    <?php include('../template/modal-profissional/desativar_profissional.php') ?>
    <?php include('../template/modal-profissional/ativar_profissional.php') ?>
    <?php include('../template/modal-profissional/editar_profissional.php') ?>
    <?php include('../template/modal-profissional/detalhes_profissional.php') ?>

</main>

<script src="https://unpkg.com/imask"></script>

<script src="../asset/js/profissionais.js"></script>

<script src="../asset/js/validar-editar-profissional.js"></script>
<script src="../asset/js/validar-cadastro-modal.js"></script>

<script src="../asset/js/menu-lateral.js"></script>


<script>
    const btnMenu = document.getElementById('btn-menu');
    const menu = document.querySelector('.menu_lateral');
    const body = document.body;

    btnMenu.addEventListener('click', () => {
        menu.classList.toggle('ativo');
        body.classList.toggle('menu-aberto');
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>