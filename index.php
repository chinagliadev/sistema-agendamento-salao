<?php
require('./config/conexao.php');
include_once('./dao/servicoDAO.php');

$servico = new ServicoDAO();
$listaServico = $servico->listarServicos();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salão de Cabelo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="./asset/css/style.css">
</head>

<body>
    <header class="cabecalho container">
        <div class="logo">
            <h1 class="titulo-principal">Salão de Cabelo</h1>
        </div>

        <nav class="navegacao">
            <ul class="lista-navegacao">
                <li class="item-navegacao">
                    <a href="#">Inicio</a>
                    <a href="#">Sobre</a>
                    <a href="#">Servico</a>
                    <a href="#">Agendamentos</a>
                </li>
            </ul>
        </nav>

        <div class="botoes-navegacao">
            <a href="./login.php">Login</a>
            <a href="./cadastros-login.php">Cadastrar</a>
        </div>

        <button class="menu-hamburguer" aria-label="Abrir Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </header>

    <section class="hero">
        <div class="conteudo-hero container text-center text-white">
            <h2>Salão Beauty</h2>

            <p>
                No Salão Beauty, beleza e cuidado caminham juntos.
                Trabalhamos com as melhores técnicas e produtos do mercado
                para garantir resultados incríveis, sempre respeitando seu
                estilo e sua personalidade.
            </p>

            <div class="hero-botoes">
                <a href="#contato" class="btn-hero btn-agenda">Agendar Horário</a>
            </div>
        </div>
    </section>


    <section class="servicos">
        <div class="apresentacao-servicos container py-5">
            <div class="texto-apresentacao">
                <h2>Serviços que oferecemos com a maior qualidade</h2>
            </div>

            <a href="#">Todos os serviços</a>
        </div>

        <div class="container">
            <div class="row g-3">
                <?php
                $contador = 0;
                foreach ($listaServico as $servico) {
                    if ($contador == 3) break;
                    $contador++;
                ?>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <figure class="card-servico">
                            <img src="./uploads/<?= $servico['foto_servico']; ?>" alt="<?= $servico['nome']; ?>">
                            <figcaption>
                                <h3><?= $servico['nome']; ?></h3>
                                <p><?= $servico['descricao']; ?></p>
                            </figcaption>
                        </figure>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

</body>

</html>