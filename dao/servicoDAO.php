<?php

require_once __DIR__ . '/../config/conexao.php';
include_once __DIR__ . '/../model/servico.php';

class ServicoDAO
{

    private $conn;

    public function __construct()
    {
        $conexao = new conexao();
        $this->conn = $conexao->getConnection();
    }

    public function cadastrarServico(Servico $servico)
    {

        $sql = "INSERT INTO servicos (nome, foto_servico, descricao, preco, duracao)
            VALUES (:nome, :foto_servico, :descricao, :preco, :duracao)";

        $dadosServico = $this->conn->prepare($sql);

        $dadosServico->execute(
            [
                'nome' => $servico->getNome(),
                'foto_servico' => $servico->getFotoServico(),
                'descricao' => $servico->getDescricao(),
                'preco' => $servico->getPreco(),
                'duracao' => $servico->getDuracao()
            ]
        );

        return $dadosServico->rowCount();
    }

    public function listarServicos(): array{
        $sql = "SELECT * FROM servicos";

        $dadosServico = $this->conn->prepare($sql);
        $dadosServico->execute();

        $listaServico = $dadosServico->fetchAll(PDO::FETCH_ASSOC);

        return $listaServico;
    }

    public function desativarServico($id){
        $sql = "UPDATE servicos SET ativo = :ativo WHERE id_servico = :id ";
    }
}
