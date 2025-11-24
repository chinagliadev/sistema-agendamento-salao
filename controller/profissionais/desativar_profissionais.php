<?php

require_once __DIR__ . '/../../config/conexao.php'; 

require_once __DIR__ . '/../../dao/ProfissionalDAO.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // if(!isset($_POST['id_profissional']) || empty($_POST['id_profissionais'])){
    //     header('');
    // }

    echo 'ola bom dia';
}