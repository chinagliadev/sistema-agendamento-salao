<?php
require_once '../../../dao/agendamentoDAO.php'; 
require_once '../../../config/Conexao.php'; 

header('Content-Type: application/json'); 

try {
    $data = $_GET['data'] ?? null;
    $idProfissional = $_GET['id_profissional'] ?? null;

    if (!$data || !$idProfissional) {
        echo json_encode([]);
        exit;
    }

    $agendamentoDAO = new AgendamentoDAO();
    $horariosLivres = $agendamentoDAO->listarHorariosLivres($data, $idProfissional);

    echo json_encode($horariosLivres);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['erro' => $e->getMessage()]);
}