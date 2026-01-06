<?php

header('Content-Type: application/json');
require_once __DIR__ . '/../../dao/agendamentoDAO.php';

try{
    $agendamento = new AgendamentoDAO();
    $lista_agendamento = $agendamento->quantidadeAgendamentosPorServico();

    echo json_encode($lista_agendamento);
}catch(Exception $e){
    http_response_code(500);
    echo json_encode([
        "erro" => "Falha no servidor: " . $e->getMessage()]
    );
}