<?php
require_once '../config/autenticar.php';
include '../template/header.php';
include '../dao/profissionalDAO.php';
include '../dao/agendamentoDAO.php';
include '../dao/UsuarioDAO.php';

$profissionais = new ProfissionalDAO();
$agendamentos = new AgendamentoDAO();
$usuario = new UsuarioDAO();

$qtdProfissionaisAtivos = $profissionais->qtdProfissionaisAtivos();
$quantidadeAgendamentosHoje = $agendamentos->quantidadeAgendamentosHoje();
$agendamentosHoje = $agendamentos->agendamentoDeHoje();
$qtdUsuario = $usuario->qtdUsuario();
?>

<main class="d-flex">
    <?php include('../template/menu.php'); ?>

    <section class="bg-light w-100 p-4">

        <header class="bg-white border rounded mb-4">
            <nav class="navbar px-3">
                <span class="navbar-brand fw-semibold">
                    <i class="bi bi-speedometer2 me-1"></i> Dashboard
                </span>

                <div class="text-end">
                    <div class="fw-semibold"><?= $_SESSION['nomeUsuario'] ?></div>
                    <small class="text-muted"><?= $_SESSION['email'] ?></small>
                </div>
            </nav>
        </header>

        <div class="row g-3 mb-4">
            <div class="col-12 col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <p class="text-muted mb-1">Clientes</p>
                        <h2 class="fw-bold mb-0"><?= $qtdUsuario ?></h2>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <p class="text-muted mb-1">Profissionais Ativos</p>
                        <h2 class="fw-bold mb-0"><?= $qtdProfissionaisAtivos ?></h2>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <p class="text-muted mb-1">Agendamentos Hoje</p>
                        <h2 class="fw-bold mb-0"><?= $quantidadeAgendamentosHoje ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3">

            <div class="col-12 col-lg-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <p class="text-muted mb-3">
                            <i class="bi bi-bar-chart me-1"></i>
                            Serviços mais agendados
                        </p>
                        <div style="height: 260px;">
                            <canvas id="myChartQtdServico"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <p class="text-muted mb-3">
                            <i class="bi bi-graph-up me-1"></i>
                            Agendamentos (últimos 7 dias)
                        </p>
                        <div style="height: 260px;">
                            <canvas id="myChart7Dias"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <p class="text-muted mb-3">
                            <i class="bi bi-calendar-check me-1"></i>
                            Hoje
                        </p>

                        <div class="table-responsive" style="max-height: 260px; overflow-y: auto;">
                            <table class="table table-sm table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Hora</th>
                                        <th>Cliente</th>
                                        <th>Serviço</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($agendamentosHoje)) : ?>
                                        <tr>
                                            <td colspan="4" class="text-center text-muted py-3">
                                                Nenhum agendamento
                                            </td>
                                        </tr>
                                    <?php else : ?>
                                        <?php foreach ($agendamentosHoje as $ag) : ?>
                                            <tr>
                                                <td><?= date('H:i', strtotime($ag['horario_agendado'])) ?></td>
                                                <td><?= htmlspecialchars($ag['cliente']) ?></td>
                                                <td><?= htmlspecialchars($ag['servico']) ?></td>
                                                <td>
                                                    <?php
                                                    $statusClass = match ($ag['status']) {
                                                        'concluido' => 'success',
                                                        'cancelado' => 'danger',
                                                        default => 'warning'
                                                    };
                                                    ?>
                                                    <span class="badge bg-<?= $statusClass ?>">
                                                        <?= ucfirst($ag['status']) ?>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>


            


        </div>

    </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.6/index.global.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.6/index.global.min.js"></script>

<script src="../asset/js/menu-lateral.js"></script>
<script src="../asset/js/grafico_dashboard.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>