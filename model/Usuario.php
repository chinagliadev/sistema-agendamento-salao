<?php

class Usuario
{
    private $nome;
    private $email;
    private $senha;
    private $telefone;
    private $nivel;

    public function __construct($nome = "", $email = "", $senha = "", $telefone = "", $nivel="cliente")
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->telefone = $telefone;
        $this->nivel = $nivel;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function getNivel(){
        return $this->nivel;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function setNivel($nivel){
        $this->nivel = $nivel;
    }
}
