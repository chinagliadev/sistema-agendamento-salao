<?php
require_once '../config/autenticar.php';
include '../template/header.php';

?>
<main class="d-flex">
    <?php include('../template/menu.php'); ?>

    <section class="sessao-dashboard bg-light w-100 p-4 d-flex flex-column gap-3 vh-100">
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

                    <div class="col-12 col-md-12 d-flex align-items-center">
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
                </div>
            </div>

        </section>

        <section class="container-fluid py-4">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="p-3 bg-white border rounded shadow-sm">
                        <h5 class="mb-3 text-primary"><i class="bi bi-clock-history me-2"></i>Hoje</h5>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Hora</th>
                                    <th>Cliente</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>09:00</td>
                                    <td>Mark Otto</td>
                                    <td><span class="badge bg-success">Ok</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 bg-white border rounded shadow-sm">
                        <h5 class="mb-3 text-secondary"><i class="bi bi-calendar-event me-2"></i>Próximos Dias</h5>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Profissional</th>
                                    <th>Serviço</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>15/10</td>
                                    <td>Carlos Silva</td>
                                    <td>Corte</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

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