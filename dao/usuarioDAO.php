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
        $sqlInserir = "INSERT INTO usuarios (nome, email, telefone, senha, nivel) 
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

    public function validarLogin($email, $senhaDigitada)
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['email' => $email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            if (password_verify($senhaDigitada, $usuario['senha'])) {
                return $usuario;
            }
        }

        return false;
    }

    public function qtdUsuario()
    {
        $sql = "SELECT COUNT(*) FROM usuarios";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function agendamentos($id)
    {
        try {
            $sql = "
            SELECT 
                id_agenda,
                profissionais.nome AS profissional,
                servicos.nome AS servico,
                data_agendamento,
                agenda.hora
            FROM agenda
            INNER JOIN usuarios 
                ON agenda.id_usuario = usuarios.id_usuario
            INNER JOIN profissionais 
                ON agenda.id_profissional = profissionais.id_profissional
            INNER JOIN servicos 
                ON agenda.id_servico = servicos.id_servico
            WHERE usuarios.id_usuario = :id
        ";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
            return [];
        }
    }
}
