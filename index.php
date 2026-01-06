<?php
session_start();

require('./config/conexao.php');
include_once('./dao/servicoDAO.php');

$servico = new ServicoDAO();
$listaServico = $servico->listarServicos();



$login = $_SESSION['usuario_logado'] ?? false;
$nome_usuario = $_SESSION['nomeUsuario'] ?? '';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio Belle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="./asset/css/style.css">
</head>

<body>
    <header class="cabecalho container">
        <div class="logo">
            <h1 class="titulo-principal">Studio Belle</h1>
        </div>

        <nav class="navegacao">
            <ul class="lista-navegacao">
                <li class="item-navegacao">
                    <a href="#inicio">Inicio</a>
                    <a href="#sobre">Sobre</a>
                    <a href="#servicos">Servico</a>
                    <a href="#">Agendamentos</a>
                </li>
            </ul>
        </nav>

        <div class="botoes-navegacao">

        <?php if($login){?>
            <a href="./usuario/agendamentos.php"><?= $nome_usuario ?></a>
            <a href="./config/logout.php">Sair</a>
        <?php } else {?>
            <a href="./login.php">Login</a>
                <a href="./cadastros-login.php">Cadastrar</a>
            </div>
        <?php } ?>


        <button class="menu-hamburguer" aria-label="Abrir Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </header>

    <section class="hero" id="inicio">
        <div class="conteudo-hero container text-center text-white">
            <h2>Studio Belle</h2>

            <p>
                No Studio Belle, beleza e cuidado caminham juntos.
                Trabalhamos com as melhores técnicas e produtos do mercado
                para garantir resultados incríveis, sempre respeitando seu
                estilo e sua personalidade.
            </p>

            <div class="hero-botoes">
                <a href="./login.php" class="btn-hero btn-agenda">Agendar Horário</a>
            </div>
        </div>
    </section>


    <section class="servicos" id="servicos">
        <div class="apresentacao-servicos container py-5">
            <div class="texto-apresentacao">
                <h2>Oferecemos serviços de alta qualidade para valorizar sua imagem</h2>
            </div>

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
                        <figure class="card-servico reveal-card">
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

    <section class="sobre hidden" id="sobre">
        <div class="container">
            <div class="row g-5">

                <div class="col-12 col-lg-6">
                    <div class="img-sobre">
                        <img class="img-fluid" src="./asset/img/fazendo cabelo.jpg" alt="">
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="sobre-texto">
                        <h2>Sobre o Salão</h2>

                        <p>
                            No Salão Beauty, a beleza é tratada como uma verdadeira experiência de alto padrão. Nosso espaço foi
                            cuidadosamente planejado para oferecer conforto, sofisticação e bem-estar, criando um ambiente elegante
                            e acolhedor para cada cliente. Contamos com profissionais altamente qualificados, especializados nas
                            técnicas mais modernas e nas principais tendências do mercado da beleza.
                        </p>

                        <p>
                            Trabalhamos exclusivamente com produtos premium e prezamos por um atendimento personalizado, respeitando
                            a individualidade, o estilo e a essência de cada pessoa. Cada detalhe, do atendimento aos serviços
                            realizados, é pensado para proporcionar resultados impecáveis e uma experiência única, onde você se
                            sente valorizado(a) do início ao fim.
                        </p>


                    </div>
                </div>

            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="row gy-4">

                <div class="col-12 col-lg-4">
                    <h3 class="footer-logo">Studio Belle</h3>
                    <p class="footer-texto">
                        Um espaço dedicado à beleza, sofisticação e bem-estar.
                        Experiências exclusivas com atendimento personalizado
                        e serviços de alto padrão.
                    </p>
                </div>

                <div class="col-6 col-lg-2">
                    <h4 class="footer-titulo">Menu</h4>
                    <ul class="footer-lista">
                        <li><a href="#">Início</a></li>
                        <li><a href="#">Sobre</a></li>
                        <li><a href="#">Serviços</a></li>
                        <li><a href="#">Agendamentos</a></li>
                    </ul>
                </div>

                <div class="col-6 col-lg-3">
                    <h4 class="footer-titulo">Serviços</h4>
                    <ul class="footer-lista">
                        <li><a href="#">Cortes</a></li>
                        <li><a href="#">Coloração</a></li>
                        <li><a href="#">Tratamentos</a></li>
                        <li><a href="#">Penteados</a></li>
                    </ul>
                </div>

                <div class="col-12 col-lg-3">
                    <h4 class="footer-titulo">Contato</h4>
                    <ul class="footer-contato">
                        <li> Rua fulano dias, 123 – Centro</li>
                        <li> (19) 99999-9999</li>
                        <li> contato@studiobelle.com</li>
                    </ul>
                </div>

            </div>

            <div class="footer-bottom">
                <p>© 2025 Studio Belle. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>


<script src="./asset/js/app.js"></script>
</body>

</html>