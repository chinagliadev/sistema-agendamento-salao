<?php
require_once '../config/autenticar.php';
include '../template/header.php';
include '../dao/profissionalDAO.php';
include '../dao/UsuarioDAO.php';

$profissionais = new ProfissionalDAO();

$qtdProfissionaisAtivos = $profissionais->qtdProfissionaisAtivos();
$qtdProfissionaisDesativos = $profissionais->qtdProfissionaisDesativados();


$usuario = new usuarioDAO();
$qtdUsuario = $usuario->qtdUsuario();

?>
<main class="d-flex">
    <?php include('../template/menu.php'); ?>

    <section class="sessao-dashboard bg-light w-100 p-4 d-flex flex-column gap-3">
        <header class="bg-white border p-2 rounded">
            <nav class="navbar">
                <div class="container-fluid d-flex justify-content-between align-items-center">

                    <a class="navbar-brand fw-normal fs-5" href="#">
                        <i class="bi bi-archive"></i> Dashboard
                    </a>

                    <a class="d-flex flex-column gap-1 text-decoration-none align-items-end lh-1 " href="#">
                        <span class="fw-semibold text-dark"><?= $_SESSION['nomeUsuario'] ?></span>
                        <small class="text-muted"><?= $_SESSION['email'] ?></small>
                    </a>
                </div>
            </nav>
        </header>

        <section class="sessao-card-dashboard vh-100">
            <div class="container-fluid">
                <div class="row g-3">

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card shadow p-2 w-100 card-dashboard">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <p class="card-subtitle text-muted">Total de Clientes</p>
                                        <h5 class="card-title fs-1 fw-bold"><?= $qtdUsuario ?></h5>
                                    </div>
                                    <div class="col-4 d-flex justify-content-end align-items-start">
                                        <i class="bi bi-people fs-4"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card shadow p-2 w-100 card-dashboard">
                            <div class="card-body">
                                <p class="card-subtitle text-muted">
                                    <i class="bi bi-person-workspace fs-4 text-muted"></i> Total de Profissionais
                                </p>
                                <h5 class="card-title fs-1 fw-bold"><?= $qtdProfissionaisAtivos ?></h5>
                                <div>
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card shadow p-2 w-100 card-dashboard border-start border-success border-4">
                            <div class="card-body">
                                <p class="card-subtitle text-muted">Ganhos do Mês</p>
                                <h5 class="card-title fs-1 fw-bold text-success"> </h5>
                                <i class="bi bi-cash-stack fs-4"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card shadow p-2 w-100 card-dashboard border-start border-primary border-4">
                            <div class="card-body">
                                <p class="card-subtitle text-muted">Agendamentos Hoje</p>
                                <h5 class="card-title fs-1 fw-bold"></h5>
                                <i class="bi bi-calendar-check fs-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>



</main>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const btnMenu = document.getElementById('btn-menu');
    const menu = document.querySelector('.menu_lateral');
    const body = document.body;

    btnMenu.addEventListener('click', () => {
        menu.classList.toggle('ativo');
        body.classList.toggle('menu-aberto');
    });
</script>
<script src="../asset/js/menu-lateral.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="../asset/js/grafico_dashboard.js"></script>
</body>

</html>