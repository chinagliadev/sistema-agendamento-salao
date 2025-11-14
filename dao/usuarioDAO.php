<?php

require_once('../config/conexao.php');
require_once('../model/Usuario.php');

class usuarioDAO
{

    private $conn;

    public function __construct()
    {
        $conexao = new conexao();
        $this->conn = $conexao->getConnection();
    }


    public function inserirDados(Usuario $usuario): int
    {
        $sqlInserir = "INSERT INTO usuario (nome, email, telefone, senha, nivel) 
                   VALUES (:nome, :email, :telefone, :senha, :nivel)";

        $dadosUsuario = $this->conn->prepare($sqlInserir);

        $dadosUsuario->execute([
            ":nome"     => $usuario->getNome(),
            ":email"    => $usuario->getEmail(),
            ":telefone" => $usuario->getTelefone(),
            ":senha"    => $usuario->getSenha(),
            ":nivel"    => $usuario->getNivel()
        ]);

        return $this->conn->lastInsertId();
    }
}
