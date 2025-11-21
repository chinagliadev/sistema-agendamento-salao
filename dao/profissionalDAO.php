<?php

require_once('../config/conexao.php');
include '../model/Profissional.php';

class profissionalDAO{

    private $conn;

    const PROFISSIONAL_ATIVADO = 0;
    const PROFISSIONAL_DESATIVADO = 1;

    public function __construct()
    {
        $conexao = new conexao();
        $this->conn = $conexao->getConnection();
    }

    public function inserirProfissional(Profissional $profissional){

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

        if($dadosProfissionais->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function listarProfissionais(){
        $sqlLista = "SELECT * FROM profissionais";

        $dadosListados = $this->conn->prepare($sqlLista);
        $dadosListados->execute();

        $listaProfissionais = $dadosListados->fetchAll();
        return $listaProfissionais;
    }

}

?>