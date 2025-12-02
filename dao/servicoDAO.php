<?php

require_once __DIR__ . '/../config/conexao.php';
include_once __DIR__ . '/../model/servico.php';

class ServicoDAO
{

    private $conn;

    const SERVICO_ATIVADO = 0;
    const SERVICO_DESATIVADO = 1;

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

    public function listarServicos(): array
    {
        $sql = "SELECT * FROM servicos";

        $dadosServico = $this->conn->prepare($sql);
        $dadosServico->execute();

        $listaServico = $dadosServico->fetchAll(PDO::FETCH_ASSOC);

        return $listaServico;
    }

    public function desativarServico($id)
    {
        $sql = "UPDATE servicos SET ativo = :ativo WHERE id_servico = :id ";

        $dadosServico = $this->conn->prepare($sql);

        $dadosServico->execute(
            [
                ':ativo' => self::SERVICO_DESATIVADO,
                ':id' => $id
            ]
        );

        return $dadosServico->rowCount();
    }

    public function ativarServicos($id)
    {
        $sql = "UPDATE servicos SET ativo = :ativo WHERE id_servico = :id ";

        $dadosServico = $this->conn->prepare($sql);

        $dadosServico->execute(
            [
                ':ativo' => self::SERVICO_ATIVADO,
                ':id' => $id
            ]
        );

        return $dadosServico->rowCount();
    }

    public function atualizarServico(
        int $id_servico,
        string $nome,
        string $descricao,
        $preco,
        string $duracao,
        ?string $foto_servico,
    ): int {

        $atualizarFoto = !empty($foto_servico);

        $sql = "UPDATE servicos SET 
        nome = :nome, 
        descricao = :descricao,
        preco = :preco,
        duracao = :duracao";

        if ($atualizarFoto) {
            $sql .= ", foto_servico = :foto_servico";
        }

        $sql .= " WHERE id_servico = :id_servico";

        $dadosServico = $this->conn->prepare($sql);

        $params = [
            ':id_servico' => $id_servico,
            ':nome' => $nome,
            ':descricao' => $descricao,
            ':preco' => $preco,
            ':duracao' => $duracao,
        ];

        if ($atualizarFoto) {
            $params[':foto_servico'] = $foto_servico;
        }

        $dadosServico->execute($params);

        return $dadosServico->rowCount();
    }
}
