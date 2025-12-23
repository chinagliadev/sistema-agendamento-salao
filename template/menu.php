<?php
$pagina_atual = basename($_SERVER['PHP_SELF']);
?>

<button id="btn-menu" class="btn btn-dark">
    <i class="bi bi-list"></i>
</button>

<aside class="menu_lateral bg-dark text-white">
    <section class="opcoes_menu">

        <div class="perfil">
            <span class="usuario-info">
                <h2 class="fs-6"><i class="bi bi-gear-fill"></i> Painel de Admin</h2>
            </span>
        </div>

        <div class="lista_opcoes">
            <ul class="nav flex-column">

                <li class="nav-item">
                    <a class="nav-link text-white <?= ($pagina_atual == 'dashboard.php') ? 'active' : '' ?>" href="dashboard.php">
                        <i class="bi bi-archive-fill"></i> Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white <?= ($pagina_atual == 'profissionais.php') ? 'active' : '' ?>" href="profissionais.php">
                        <i class="bi bi-briefcase-fill"></i> Profissional
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white <?= ($pagina_atual == 'servicos.php') ? 'active' : '' ?>" href="servicos.php">
                        <i class="bi bi-scissors"></i> Serviços
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white <?= ($pagina_atual == 'agendamentos.php') ? 'active' : '' ?>" href="agendamentos.php">
                        <i class="bi bi-calendar-event"></i> Agenda
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <section class="container_sair">
        <a class="text-decoration-none fs-5 text-white" href="../login.php"><i class="sign-out icon"></i>Sair</a>
    </section>
</aside>