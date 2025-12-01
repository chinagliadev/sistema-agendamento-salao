<?php
require_once __DIR__ . '/../config/conexao.php';
require_once __DIR__ . '/../dao/servicoDAO.php';
require_once __DIR__ . '/../model/Servico.php';

echo 'arquivo gerenciar_servicos.php';

var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['acaoServico'])) {
        header('Location: ../admin/servicos.php?error=acao_nao_informada');
        exit();
    }

    $acao = $_POST['acaoServico'];
    $servicoDAO = new ServicoDAO();
    $linhasAfetadas = 0;


    switch ($acao) {

        case 'desativarServico':
            if (!isset($_POST['inputIdServico'])) {
                header('Location: ../admin/servicos.php?error=id_nao_informado');
                exit();
            }

            $id = $_POST['inputIdServico'];
            $linhasAfetadas = $servicoDAO->desativarServico($id);
            $success_param = 'desativado';
            $error_param = 'desativado_error';
            break;

        case 'ativarServico':
            if (!isset($_POST['inputIdServicoAtivar'])) {
                header('Location: ../admin/servicos.php?error=id_nao_informado');
                exit();
            }
            $id = $_POST['inputIdServicoAtivar'];
            $linhasAfetadas = $servicoDAO->ativarServicos($id);
            $success_param = 'ativado';
            $error_param = 'ativado_error';
            break;

        default:
            // header('Location: ../admin/servicos.php?error=acao_invalida');
            exit();
    }

    if ($linhasAfetadas > 0) {
        header("Location: ../admin/servicos.php?success=$success_param");
    } else {
        header("Location: ../admin/servicos.php?error=$error_param");
    }
    exit();
}

header('Location: ../admin/servicos.php');
exit();
