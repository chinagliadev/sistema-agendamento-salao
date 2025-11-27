<?php
require_once '../config/autenticar.php';
include '../template/header.php';


?>
<main class="d-flex">
    <?php include('../template/menu.php'); ?>

    <section class="sessao-dashboard bg-light w-100 p-4 d-flex flex-column gap-3">
        <header class="bg-white border p-2 rounded">
            <nav class="navbar">
                <div class="container-fluid d-flex justify-content-between align-items-center">

                    <a class="navbar-brand fw-normal fs-5" href="#">
                        <i class="bi bi-scissors"></i> Serviços
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
                        <form action="" method="GET" class="d-flex w-100">
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
                        <button
                            class="btn btn-warning"
                            data-bs-toggle="modal"
                            data-bs-target="#modalCadastrarServico">
                            <i class="bi bi-scissors"></i>
                            Cadastrar Serviço
                        </button>

                </div>
            </div>

        </section>

        <section class="sessao_servicos">
            <div class="row" id="lista_cards">
                
            </div>
        </section>

        
    </section>

<?php include('../template/modal-servicos/cadastrar-servico.php') ?>

</main>
</main>
<script src="https://unpkg.com/imask"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

<script src="../asset/js/servicos.js"></script>

<script>
    const btnMenu = document.getElementById('btn-menu');
    const menu = document.querySelector('.menu_lateral');
    const body = document.body;

    btnMenu.addEventListener('click', () => {
        menu.classList.toggle('ativo');
        body.classList.toggle('menu-aberto');
    });
</script>
</body>

</html>