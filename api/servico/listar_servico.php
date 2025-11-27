<?php

require_once __DIR__ . '/../../dao/servicoDAO.php';

header('Content-Type: application/json');

try{
    $servico = new ServicoDAO();
    $listaServico = $servico->listarServicos();
    
    echo json_encode($listaServico);

}catch(Exception $e){
    http_response_code(500);
    echo json_encode(["erro" => "Falha no servidor: " . $e->getMessage()]);
}