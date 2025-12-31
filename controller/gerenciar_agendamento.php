<?php
require_once __DIR__ . '/../config/conexao.php';


if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(isset($_POST['acaoAgendar'])){
        header('Location: ../home.php?error=true');
    }

    echo 'Bem vindo ao gerenciar_agendamento.php';


}

// header('Location: ../admin/profissionais.php');
exit();
?>