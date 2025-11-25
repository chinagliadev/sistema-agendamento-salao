<?php
header('Content-Type: application/json');


// require_once __DIR__ . '/../../dao/ProfissionalDAO.php';

try {
    $profissionais = [
        'Paulo' => 'Programador',
        'Maria' => 'Designer'
    ];

    echo json_encode($profissionais);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["erro" => "Falha no servidor: " . $e->getMessage()]);
}
