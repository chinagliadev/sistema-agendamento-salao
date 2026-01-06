<?php
require_once '../config/autenticar.php';
include '../template/header.php';
require_once '../dao/agendamentoDAO.php';

$agendamentoDAO = new AgendamentoDAO();

$agendamentoHoje = $agendamentoDAO->agendamentoDeHoje();
$agendamentoProximosDias = $agendamentoDAO->agendamentoProximosDias();
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
            <div class="container-fluid my-3 d-flex">
                <input
                    type="text"
                    id="campo_agenda"
                    class="form-control"
                    placeholder="Pesquisar Agendamento"
                    style="max-width: 400px;">
                <button class="btn btn-outline-dark ms-2">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </section>

        <section class="container-fluid py-4">
            <div class="row g-4">

                <div class="col-md-6">
                    <div class="p-3 bg-white border rounded shadow-sm">
                        <h5 class="mb-3 text-primary">
                            <i class="bi bi-clock-history me-2"></i>Hoje
                        </h5>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Hora</th>
                                    <th>Cliente</th>
                                    <th>Profissional</th>
                                    <th>Serviço</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($agendamentoHoje as $agendamento):

                                    $status = $agendamento['status'] === 'marcado' ? 'bg-warning bg-opacity-25 p-1 rounded fw-semibold text-warning' : 'bg-success bg-opacity-25  p-1 rounded fw-semibold text-success';

                                ?>
                                    <tr class="linha-agendamento">
                                        <td><?= date('H:i', strtotime($agendamento['horario_agendado'])) ?></td>
                                        <td><?= htmlspecialchars($agendamento['cliente']) ?></td>
                                        <td><?= htmlspecialchars($agendamento['nome_profissional']) ?></td>
                                        <td><?= htmlspecialchars($agendamento['servico']) ?></td>
                                        <td><span class="<?= $status ?>"><?= $agendamento['status'] ?></span></td>
                                        <td>
                                            <?php if ($agendamento['status'] === 'marcado'): ?>

                                                <form
                                                    action="../controller/gerenciar_agendamento.php"
                                                    method="POST"
                                                    class="d-inline">
                                                    <input type="hidden" name="acaoAgendamento" value="realizado">
                                                    <input type="hidden" name="id" value="<?= $agendamento['id'] ?>">

                                                    <button class="btn btn-outline-success btn-sm" title="Marcar como concluído">
                                                        <i class="bi bi-check2"></i>
                                                    </button>
                                                </form>

                                            <?php elseif ($agendamento['status'] === 'concluido'): ?>

                                                <form
                                                    action="../controller/gerenciar_agendamento.php"
                                                    method="POST"
                                                    class="d-inline">
                                                    <input type="hidden" name="acaoAgendamento" value="cancelarConcluido">
                                                    <input type="hidden" name="id" value="<?= $agendamento['id'] ?>">

                                                    <button class="btn btn-outline-danger btn-sm" title="Cancelar conclusão">
                                                        <i class="bi bi-x-lg"></i>
                                                    </button>
                                                </form>

                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                                <tr class="msg-vazio" style="display:none;">
                                    <td colspan="4" class="text-center text-muted py-4">
                                        <i class="bi bi-info-circle me-1"></i>
                                        Nenhum agendamento encontrado.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 bg-white border rounded shadow-sm">
                        <h5 class="mb-3 text-secondary">
                            <i class="bi bi-calendar-event me-2"></i>Próximos Dias
                        </h5>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Cliente</th>
                                    <th>Profissional</th>
                                    <th>Serviço</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($agendamentoProximosDias as $agendamento): ?>
                                    <tr class="linha-agendamento">
                                        <td><?= date('d/m', strtotime($agendamento['data_agendamento'])) ?></td>
                                        <td><?= htmlspecialchars($agendamento['cliente']) ?></td>
                                        <td><?= htmlspecialchars($agendamento['nome_profissional']) ?></td>
                                        <td><?= htmlspecialchars($agendamento['servico']) ?></td>
                                    </tr>
                                <?php endforeach; ?>

                                <tr class="msg-vazio" style="display:none;">
                                    <td colspan="4" class="text-center text-muted py-4">
                                        <i class="bi bi-info-circle me-1"></i>
                                        Nenhum agendamento encontrado.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </section>
    </section>
</main>

<script src="../asset/js/menu-lateral.js"></script>
<script src="../asset/js/pagina_agendamento.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>