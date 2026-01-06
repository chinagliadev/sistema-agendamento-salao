<?php
require_once './config/autenticar.php';
include './dao/servicoDAO.php';

$servico = new ServicoDAO();

$lista_servico = $servico->listarServicos();

$nome = $_SESSION['nomeUsuario'];
$idUsuario = $_SESSION['idUsuario'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="./asset/css/agendamento.css">
    <title>Document</title>
</head>

<body>
    <header class="cabecalho">
        <div class="logo">
            <h1 class="titulo-principal">
                <a href="./index.php">
                    Studio Belle
                </a>
            </h1>
        </div>



        <div class="botoes-navegacao">
            <a class="fw-bold fs-5" href="./usuario/agendamentos.php">Meus Agendamentos</a>
        </div>

        <button class="menu-hamburguer" aria-label="Abrir Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </header>

    <section class="sessao-servicos container my-4">
        <h2>
            Olá, <span class="fw-bold"><?= $nome ?></span>
        </h2>
        <p class="">
            Seja bem-vindo(a)! No nosso sistema de agendamento, você escolhe os melhores serviços no dia e horário que preferir.
        </p>

        <div class="pesquisar-servico">
            <input id="input-servico" class="input-servico" type="text" placeholder="Pesquisar serviço">
        </div>
    </section>

    <section class="sessao-card-servico container">
        <div class="row">
            <div id="sem-resultado" class="aviso-pesquisa d-flex flex-column align-items-center justify-content-center d-none">
                <img class="img-fluid" src="./asset/img/Search-rafiki.png" alt="" style="max-width: 450px;">
                <p class="mt-3 fs-4 fw-bold text-secondary">
                    Ops! Nenhum serviço encontrado
                </p>
            </div>
            <?php foreach ($lista_servico as $servico) { ?>
                <div class="col-sm-12 col-md-6 col-lg-3 item-card">
                    <figure class="card-servico reveal-card">
                        <img src="./uploads/<?= $servico['foto_servico']; ?>" alt="<?= $servico['nome']; ?>">
                        <figcaption>
                            <h3><?= $servico['nome']; ?></h3>
                        </figcaption>
                        <div class="card-footer">
                            <button
                                class="btn-agendar-servico"
                                data-servico="<?= $servico['nome'] ?>"
                                data-idServico="<?= $servico['id_servico'] ?>"
                                data-usuario="<?= $idUsuario ?>"
                                data-bs-toggle="modal"
                                data-bs-target="#modal-agendamento">
                                AGENDAR
                            </button>
                        </div>
                    </figure>
                </div>
            <?php } ?>
        </div>
    </section>

    <?php
    include './template/modal-agendamento/agendamento.php';
    include './template/modal-agendamento/agendamento-sucesso.php';
    ?>

    <script src="./asset/js/agendamento.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>