<?php

require_once '../model/Usuario.php';
require_once '../dao/UsuarioDAO.php';
require_once __DIR__ . '/../config/conexao.php';


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    if( (!isset($_POST['txtNomeCompleto']) || empty($_POST['txtNomeCompleto'])) || 
        (!isset($_POST['txtEmail']) || empty($_POST['txtEmail'])) ||
        (!isset($_POST['txtSenha']) || empty($_POST['txtSenha'])) ||
        (!isset($_POST['txtConfirmarSenha']) || empty($_POST['txtConfirmarSenha'])) ||
        (!isset($_POST['txtTelefone']) || empty($_POST['txtTelefone']))
        ){
            header('Location: ../cadastros-login.php?error=true');
            
            exit; 
        }
    
    var_dump($_POST);

    $nomeCompleto = $_POST['txtNomeCompleto'];
    $email = $_POST['txtEmail'];
    $senha = password_hash($_POST['txtSenha'], PASSWORD_DEFAULT);
    $telefone = $_POST['txtTelefone'];

    $usuario = new Usuario(
        $nomeCompleto,
        $email,
        $senha,
        $telefone,
        $nivel
    );
    
    $usuarioDAO = new usuarioDAO();
    $idUsuarioCadastrado = $usuarioDAO->inserirDados($usuario);
    header('Location: ../index.php?cadastrado=true');
}