<?php

class Servico{

    private $nome;
    private $foto_servico;
    private $descricao;
    private $preco;
    private $duracao;
    private $id;

    public function __construct($nome, $foto_servico, $descricao, $preco, $duracao, $id = null)
    {
        $this->nome = $nome;
        $this->foto_servico = $foto_servico;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->duracao = $duracao;
        $this->id = $id;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }


    public function setNome(string $nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }


    public function setFotoServico(string $foto_servico){
        $this->foto_servico = $foto_servico;
    }

    public function getFotoServico(){
        return $this->foto_servico;
    }


    public function setDescricao(string $descricao){
        $this->descricao = $descricao;
    }

    public function getDescricao(){
        return $this->descricao;
    }


    public function setPreco(float $preco){
        $this->preco = $preco;
    }

    public function getPreco(){
        return $this->preco;
    }


    public function setDuracao(string $duracao){
        $this->duracao = $duracao;
    }

    public function getDuracao(){
        return $this->duracao;
    }

}