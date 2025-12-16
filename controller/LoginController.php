<?php
session_start();

require_once '../model/Usuario.php';
require_once '../dao/UsuarioDAO.php';
require_once __DIR__ . '/../config/conexao.php';

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    if (
        !isset($_POST['txtEmail']) || !isset($_POST['txtSenha']) ||
        empty($_POST['txtEmail'] || empty($_POST['txtSenha']))
    ) {
        header('Location: login.php?error=true');
        exit;
    }

    $usuario = new Usuario();


    $email = $_POST['txtEmail'];
    $senha = $_POST['txtSenha'];

    $usuarioDAO = new usuarioDAO();

    $dadosUsuario = $usuarioDAO->validarLogin($email, $senha);

    if (!$dadosUsuario) {
        header('Location: ../login.php?error=true');
        exit;
    }

    $_SESSION['nivel'] = $dadosUsuario['nivel'];
    var_dump($_SESSION['nivel']);

    if ($_SESSION['nivel'] === 'admin') {
        $_SESSION['usuario_logado'] = true;
        $_SESSION['nomeUsuario'] = $dadosUsuario['nome'];
        $_SESSION['email'] = $dadosUsuario['email'];
        $_SESSION['idUsuario'] = $dadosUsuario['id_usuario'];
        header('Location: ../admin/dashboard.php');
        exit; 
    } else {
        $_SESSION['usuario_logado'] = true;
        $_SESSION['nomeUsuario'] = $dadosUsuario['nome'];
        $_SESSION['email'] = $dadosUsuario['email'];
        $_SESSION['idUsuario'] = $dadosUsuario['id_usuario'];
        header('Location: ../home.php');
    }
}
