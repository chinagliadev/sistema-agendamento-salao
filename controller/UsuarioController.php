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
}