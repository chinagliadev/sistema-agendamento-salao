<?php

require_once('../config/conexao.php');
include '../model/Profissional.php';

class profissionalDAO
{

    private $conn;

    const PROFISSIONAL_ATIVADO = 0;
    const PROFISSIONAL_DESATIVADO = 1;

    public function __construct()
    {
        $conexao = new conexao();
        $this->conn = $conexao->getConnection();
    }

    public function inserirProfissional(Profissional $profissional)
    {

        $sqlInserir = "INSERT INTO profissionais (nome, especialidade, telefone, email, foto_perfil, cpf, ativo)
            VALUE (:nome, :especialidade, :telefone, :email, :foto_perfil, :cpf, :ativo)";

        $dadosProfissionais = $this->conn->prepare($sqlInserir);
        $dadosProfissionais->execute([
            ':nome' => $profissional->getNome(),
            ':especialidade' => $profissional->getEspecialidade(),
            ':telefone' => $profissional->getTelefone(),
            ':email' => $profissional->getEmail(),
            ':foto_perfil' => $profissional->getFotoProfissional(),
            ':cpf' => $profissional->getCpf(),
            ':ativo' => profissionalDAO::PROFISSIONAL_ATIVADO
        ]);

        if ($dadosProfissionais->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function listarProfissionais()
    {
        $sqlLista = "SELECT * FROM profissionais";

        $dadosListados = $this->conn->prepare($sqlLista);
        $dadosListados->execute();

        $listaProfissionais = $dadosListados->fetchAll();
        return $listaProfissionais;
    }

    public function desativarProfissional($id): int
    {
        $sqlDesativar = "UPDATE profissionais SET ativo = " . self::PROFISSIONAL_DESATIVADO . " WHERE id_profissional = :id";

        $dadosDesativado = $this->conn->prepare($sqlDesativar);
        $dadosDesativado->execute(
            [
                ':id' => $id
            ]
        );

        return $dadosDesativado->rowCount();
    }

    public function ativarProfissional($id): int
    {
        $sqlAtivar = "UPDATE profissionais SET ativo = " . self::PROFISSIONAL_ATIVADO . " WHERE id_profissional = :id";

        $dadosAtivado = $this->conn->prepare($sqlAtivar);
        $dadosAtivado->execute(
            [
                ':id' => $id
            ]
        );

        return $dadosAtivado->rowCount();
    }

    public function editarProfissional(Profissional $profissional, $id): int
    {
        $sqlAtualizar = "UPDATE profissionais 
                        SET nome = :nome, 
                        especialidade = :especialidade,
                        telefone = :telefone,
                        email = :email,
                        foto_perfil = :foto_perfil, 
                        cpf = :cpf
                        WHERE id_profissional = :id";

        $dadosEditar = $this->conn->prepare($sqlAtualizar);
        $dadosEditar->execute(
            [
                ':nome' => $profissional->getNome(),
                ':especialidade' => $profissional->getEspecialidade(),
                ':telefone' => $profissional->getTelefone(),
                ':email' => $profissional->getEmail(),
                ':foto_perfil' => $profissional->getFotoProfissional(),
                ':cpf' => $profissional->getCpf(),
                ':id' => $id
            ]
        );

        return $dadosEditar->rowCount();
    }

    public function buscarFotoPorId($id)
    {
        $sqlFoto = "SELECT foto_perfil FROM profissionais WHERE id_profissional = :id";
        $dadosFotos = $this->conn->prepare($sqlFoto);
        $dadosFotos->execute([':id'=>$id]);
        return $dadosFotos->fetchColumn();
    }
}
