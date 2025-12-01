<?php
require_once __DIR__ . '/../config/conexao.php';
require_once __DIR__ . '/../dao/servicoDAO.php'; 
require_once __DIR__ . '/../model/Servico.php';

$diretorioDestino = '../asset/uploads/foto_servicos/';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (
        !isset($_POST['txtNomeServico']) || empty(trim($_POST['txtNomeServico'])) ||
        !isset($_POST['txtPrecoServico']) || empty(trim($_POST['txtPrecoServico'])) ||
        !isset($_POST['txtDuracaoServico']) || empty(trim($_POST['txtDuracaoServico'])) ||
        !isset($_POST['descricaoServico']) || empty(trim($_POST['descricaoServico'])) ||
        !isset($_FILES['arquivoFotoServico']) || $_FILES['arquivoFotoServico']['error'] !== UPLOAD_ERR_OK
    ) {
        header('Location: ../admin/servicos.php?error=campos_obrigatorios');
        exit;
    }
    
    $nome = $_POST['txtNomeServico'];
    $descricao = $_POST['descricaoServico'];
    $duracao = $_POST['txtDuracaoServico'];

    $precoFormatado = str_replace(['R$', '.'], '', $_POST['txtPrecoServico']);
    $precoFormatado = str_replace(',', '.', $precoFormatado);
    $preco = (float) $precoFormatado;
    
    $arquivoFoto = $_FILES['arquivoFotoServico'];
    $nomeArquivoFoto = uniqid() . '_' . $arquivoFoto['name']; 
    $caminhoCompleto = $diretorioDestino . $nomeArquivoFoto;


    if (!move_uploaded_file($arquivoFoto['tmp_name'], $caminhoCompleto)) {
        header('Location: ../admin/servicos.php?error=upload_falhou');
        exit;
    }
    
    $servico = new Servico(
        $nome, 
        $caminhoCompleto, 
        $descricao, 
        $preco, 
        $duracao 
    );

    $servicoDAO = new ServicoDAO();
    $sucesso = $servicoDAO->cadastrarServico($servico);

    if ($sucesso) {
        header('Location: ../admin/servicos.php?cadastro=true');
        exit;
    } else {
        header('Location: ../admin/servicos.php?cadastro=false');
        exit;
    }
    
} else {
    header('Location: ../admin/servicos.php');
    exit;
}
?>
