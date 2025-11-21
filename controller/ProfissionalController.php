<?php

require_once './config/conexao.php';
include './model/Profissional.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (
        !isset($_POST['txtNomeProfissional']) || empty($_POST['txtNomeProfissional']) ||
        !isset($_POST['txtCpfProfissional']) || empty($_POST['txtCpfProfissional']) ||
        !isset($_POST['txtTelefoneProfissional']) || empty($_POST['txtTelefoneProfissional']) ||
        !isset($_POST['txtEmailProfissional']) || empty($_POST['txtEmailProfissional']) ||
        !isset($_POST['txtEspecialidadeProfissional']) || empty($_POST['txtEspecialidadeProfissional'])
    ) {
        header('Location: ../admin/profissionais.php?error=true');
        exit;
    }


    var_dump($_POST);
}
