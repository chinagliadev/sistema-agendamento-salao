<?php
require_once '../../dao/AgendamentoDAO.php';

$dao = new AgendamentoDAO();
$agendamentos = $dao->listarTodos();

$eventos = [];

foreach ($agendamentos as $a) {

    $cor = '#4e73df'; 
    if ($a['status'] === 'concluido') $cor = '#1cc88a';
    if ($a['status'] === 'cancelado') $cor = '#e74a3b';

    $eventos[] = [
        'id'    => $a['id_agenda'],
        'title' => $a['servico'] . ' - ' . $a['cliente'],
        'start' => $a['data_agendamento'] . 'T' . $a['hora'],
        'color' => $cor
    ];
}

header('Content-Type: application/json');
echo json_encode($eventos);
