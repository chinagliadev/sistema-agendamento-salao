<?php
require_once __DIR__ . '/../config/conexao.php';
require_once __DIR__ . '/../dao/agendamentoDAO.php';
require_once __DIR__ . '/../model/Agendamento.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST['id_agenda']);

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
            $status         = 'marcado'; 

            $novoAgendamento = new Agendamento($hora, $data, $idProfissional, $idServico, $idUsuario, $status);

            if ($agendamentoDAO->agendar($novoAgendamento)) {
                header('Location: ../usuario/agendamentos.php?sucesso=true');
            } else {
                header('Location: ../home.php?error=falha_ao_agendar');
            }
            break;

        case 'cancelarAgendamento':
            $idServico = $_POST['id_agenda'];
            $sucesso = $agendamentoDAO->cancelarAgendamento($idServico);

            if($sucesso > 0){
                header('Location: ../usuario/agendamentos.php?status=sucesso');
            }else{
                header('Location: ../usuario/agendamentos.php?status=error');
            }

        default:
            header('../usuario/agendamentos.php');
            break;
    }
    exit();
}

header('../usuario/agendamentos.php');
exit();
?>