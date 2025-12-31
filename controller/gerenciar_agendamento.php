<?php
require_once __DIR__ . '/../config/conexao.php';
require_once __DIR__ . '/../dao/agendamentoDAO.php';
require_once __DIR__ . '/../model/Agendamento.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_POST['acaoAgendamento'])) {
        header('Location: ../home.php?error=acao_invalida');
        exit();
    }

    $acao = $_POST['acaoAgendamento'];
    $agendamentoDAO = new AgendamentoDAO();

    switch ($acao) {
        case 'agendar':
            $idUsuario      = $_POST['idUsuario'];
            $idServico      = $_POST['idServico'];
            $idProfissional = $_POST['profissional_id'];
            $data           = $_POST['data'];
            $hora           = $_POST['hora'];
            $status         = 'Pendente'; 

            $novoAgendamento = new Agendamento($hora, $data, $idProfissional, $idServico, $idUsuario, $status);

            if ($agendamentoDAO->agendar($novoAgendamento)) {
                header('Location: ../home.php?sucesso=true');
            } else {
                header('Location: ../home.php?error=falha_ao_agendar');
            }
            break;

        default:
            header('Location: ../home.php');
            break;
    }
    exit();
}

header('Location: ../home.php');
exit();
?>