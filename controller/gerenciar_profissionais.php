<?php
require_once __DIR__ . '/../config/conexao.php';
require_once __DIR__ . '/../dao/ProfissionalDAO.php';
require_once __DIR__ . '/../model/Profissional.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['acaoProfissional'])) {
        header('Location: ../admin/profissionais.php?error=acao_nao_informada');
        exit();
    }

    $acao = $_POST['acaoProfissional'];
    $profissionalDAO = new ProfissionalDAO();
    $linhasAfetadas = 0;

    switch ($acao) {

        case 'desativar_profissional':
            if (!isset($_POST['id_profissional'])) {
                header('Location: ../admin/profissionais.php?error=id_nao_informado');
                exit();
            }

            $id = $_POST['id_profissional'];

            $linhasAfetadas = $profissionalDAO->desativarProfissional($id);
            $success_param = 'desativado';
            $error_param = 'desativado_error';
            break;

        case 'ativar_profissional':
            if (!isset($_POST['id_profissional'])) {
                header('Location: ../admin/profissionais.php?error=id_nao_informado');
                exit();
            }

            $id = $_POST['id_profissional'];

            $linhasAfetadas = $profissionalDAO->ativarProfissional($id);
            $success_param = 'ativado';
            $error_param = 'ativado_error';
            break;

        case 'editar_profissional':

            if (!isset($_POST['id_profissional'])) {
                header('Location: ../admin/profissionais.php?error=id_editar_nao_informado');
                exit();
            }

            $id = $_POST['id_profissional'];

            $nome = $_POST['txtNomeProfissionalEditar'];
            $cpf = $_POST['txtCpfProfissionalEditar'];
            $telefone = $_POST['txtTelefoneProfissionalEditar'];
            $email = $_POST['txtEmailProfissionalEditar'];

            $arquivoFoto = $_FILES['arquivoFotoProfissionalEditar'];

            if (!empty($arquivoFoto['name'])) {

                $nomeArquivoFoto = $arquivoFoto['name'];
                $diretorioDestino = '../asset/uploads/foto_profissionais/';
                $caminhoCompleto = $diretorioDestino . $nomeArquivoFoto;

                if (!move_uploaded_file($arquivoFoto['tmp_name'], $caminhoCompleto)) {
                    header('Location: ../admin/profissionais.php?error=upload_falhou');
                    exit();
                }
            } else {
                $profAtual = $profissionalDAO->buscarPorId($id);

                if (!$profAtual) {
                    header('Location: ../admin/profissionais.php?error=profissional_nao_encontrado');
                    exit();
                }

                $caminhoCompleto = $profAtual['foto_perfil'];
            }

            $profissional = new Profissional(
                $nome,
                $cpf,
                $telefone,
                $email,
                $caminhoCompleto
            );

            $linhasAfetadas = $profissionalDAO->editarProfissional($profissional, $id);

            $success_param = "editado";
            $error_param = "editar_error";

            break;

        default:
            header('Location: ../admin/profissionais.php?error=acao_invalida');
            exit();
    }

    if ($linhasAfetadas > 0) {
        header("Location: ../admin/profissionais.php?success=$success_param");
    } else {
        header("Location: ../admin/profissionais.php?error=$error_param");
    }

    exit();
}

header('Location: ../admin/profissionais.php');
exit();
