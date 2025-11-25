<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../../dao/profissionalDAO.php';

try {
    $profissionais = new profissionalDAO();

    $lista_profissionais = $profissionais->listarProfissionais();

    echo json_encode($lista_profissionais);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["erro" => "Falha no servidor: " . $e->getMessage()]);
}
