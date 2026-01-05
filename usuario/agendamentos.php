<?php
require_once '../config/autenticar.php';
require_once '../dao/UsuarioDAO.php';

$nome = $_SESSION['nomeUsuario'];
$idUsuario = $_SESSION['idUsuario'];

$usuarioDAO = new UsuarioDAO();
$listaAgendamentos = $usuarioDAO->agendamentos($idUsuario);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Meus Agendamentos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../asset/css/agendamento.css">
</head>

<body>

    <header class="cabecalho">
        <div class="logo">
            <h1 class="titulo-principal">Studio Belle</h1>
        </div>

        <div class="botoes-navegacao">
            <a class="fw-bold fs-5" href="../home.php">Voltar</a>
        </div>
    </header>

    <section class="sessao-servicos container my-4">
        <h2>
            Olá, <span class="fw-bold"><?= htmlspecialchars($nome) ?></span>
        </h2>
        <p>
            Aqui estão seus agendamentos realizados no Studio Belle
        </p>
    </section>

    <section class="sessao-card-servico container">
        <div class="row g-4">

            <?php if (count($listaAgendamentos) === 0) { ?>
                <div class="col-12 text-center mt-5">
                    <img src="../asset/img/Search-rafiki.png" alt="" style="max-width: 380px;" class="img-fluid mb-3">
                    <p class="fs-4 fw-bold text-secondary">
                        Você ainda não possui agendamentos
                    </p>
                </div>
            <?php } ?>

            <?php foreach ($listaAgendamentos as $agendamento) { ?>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card-agendamento reveal-card">

                        <div class="card-agendamento-header">
                            <span class="badge-agendamento">Agendado</span>
                        </div>

                        <div class="card-agendamento-body">
                            <h3><?= htmlspecialchars($agendamento['servico']) ?></h3>

                            <p>
                                <strong>Profissional:</strong><br>
                                <?= htmlspecialchars($agendamento['profissional']) ?>
                            </p>

                            <p>
                                <strong>Horário:</strong><br>
                                <?= date('H:i', strtotime($agendamento['hora'])) ?>
                            </p>

                            <p>
                                <strong>Data do Agendamento:</strong><br>
                                <?= (new DateTime($agendamento['data_agendamento']))->format('d/m/Y') ?>
                            </p>
                        </div>

                        <div class="card-agendamento-footer text-end">
                            <button
                                type="button"
                                data-id="<?= $agendamento['id_agenda'] ?>"
                                class="btn-cancelar btn btn-outline-danger"
                                id="btnCancelar"
                                data-bs-toggle="modal"
                                data-bs-target="#modalCancelar">
                                Cancelar
                            </button>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>

        <?php include '../template/modal-agendamento/agendamento-cancelar.php' ?>

    </section>

    <script src="../asset/js/modal-excluir-agenamento.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>