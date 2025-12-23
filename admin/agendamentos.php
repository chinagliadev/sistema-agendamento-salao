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
                        <i class="bi bi-calendar-event"></i> Agenda
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
                        </div>
                      
                    </div>

                </div>
            </div>

        </section>

        <section class="bg-white border rounded">
           
        </section>
    </section>

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