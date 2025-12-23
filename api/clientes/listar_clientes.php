<?php

header('Content-Type: application/json');
require_once __DIR__ . '/../../dao/usuarioDAO.php.php';

try{
    $usuario = new usuarioDAO();
    $listaUsuario = $usuario->listarUsuario();

    echo json_encode($listaUsuario);
}catch(Exception $e){
    http_response_code(500);
    echo json_encode([
        "erro" => "Falha no servidor: " . $e->getMessage()]
    );
}