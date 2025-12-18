<?php
require_once './config/autenticar.php';
include './dao/servicoDAO.php';

$servico = new ServicoDAO();

$lista_servico = $servico->listarServicos();

$nome = $_SESSION['nomeUsuario'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="./asset/css/agendamento.css">
    <title>Document</title>
</head>

<body>
    <header class="cabecalho-servico container">
        <div class="logo">
            <h1>Salao Teste</h1>
        </div>

        <div class="botao-header">
            <a class="btn-agendamento" href="">Meus agendamentos</a>
        </div>
    </header>

    <section class="sessao-servicos container my-4">
        <h2>
            Olá, <span class="fw-bold"><?= $nome ?></span>
        </h2>
        <p class="text-muted">
            Seja bem-vindo(a)! No nosso sistema de agendamento, você escolhe os melhores serviços no dia e horário que preferir.
        </p>

        <div class="pesquisar-servico">
            <input class="input-servico" type="text" placeholder="Pesquisar serviço">
        </div>
    </section>

    <section class="sessao-card-servico container">
        <div class="row">
            <?php foreach ($lista_servico as $servico) { ?>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <figure class="card-servico reveal-card">
                        <img src="./uploads/<?= $servico['foto_servico']; ?>" alt="<?= $servico['nome']; ?>">
                        <figcaption>
                            <h3><?= $servico['nome']; ?></h3>
                        </figcaption>
                        <div class="card-footer">
                            <button class="btn-agendar-servico">AGENDAR</button>
                        </div>
                    </figure>
                </div>
            <?php } ?>
        </div>
    </section>
</body>

</html>