<?php

require_once '../config/conexao.php';
require_once __DIR__ . '/../dao/ProfissionalDAO.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (
        !isset($_POST['txtNomeProfissional']) || empty($_POST['txtNomeProfissional']) ||
        !isset($_POST['txtCpfProfissional']) || empty($_POST['txtCpfProfissional']) ||
        !isset($_POST['txtTelefoneProfissional']) || empty($_POST['txtTelefoneProfissional']) ||
        !isset($_POST['txtEmailProfissional']) || empty($_POST['txtEmailProfissional']) ||
        !isset($_FILES['arquivoFotoProfissional']) || $_FILES['arquivoFotoProfissional']['error'] !== UPLOAD_ERR_OK 
    ) {
        header('Location: ../admin/profissionais.php?error=campos_obrigatorios');
        exit;
    }

    $nome = $_POST['txtNomeProfissional'];
    $cpf = $_POST['txtCpfProfissional'];
    $telefone = $_POST['txtTelefoneProfissional'];
    $email = $_POST['txtEmailProfissional'];
    
    $arquivoFoto = $_FILES['arquivoFotoProfissional'];
    $nomeArquivoFoto = $arquivoFoto['name']; 
    
    $diretorioDestino = '../asset/uploads/foto_profissionais/';
    $caminhoCompleto = $diretorioDestino . $nomeArquivoFoto;


    if (!move_uploaded_file($arquivoFoto['tmp_name'], $caminhoCompleto)) {
        header('Location: ../admin/profissionais.php?error=upload_falhou');
        exit;
    }

    $profissional = new Profissional(
        $nome, 
        $cpf, 
        $telefone, 
        $email, 
        $caminhoCompleto
    );

    $profissionalDAO = new ProfissionalDAO();

    $sucesso = $profissionalDAO->inserirProfissional($profissional);

    if ($sucesso) {
        header('Location: ../admin/profissionais.php?cadastro=true');
        exit;
    } else {
        header('Location: ../admin/profissionais.php?cadastro=false');
        exit;
    }
} else {
    header('Location: ../admin/profissionais.php');
    exit;
}

?>