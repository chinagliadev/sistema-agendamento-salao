<?php
class Profissional
{

    private $nome;
    private $fotoProfissional;
    private $cpf;
    private $telefone;
    private $email;
    private $especialidade;

   public function __construct($nome, $cpf, $telefone, $email, $fotoProfissional)
{
    $this->nome = $nome;
    $this->cpf = $cpf;
    $this->telefone = $telefone;
    $this->email = $email;
    $this->fotoProfissional = $fotoProfissional;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getFotoProfissional()
    {
        return $this->fotoProfissional;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getEspecialidade()
    {
        return $this->especialidade;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setFotoProfissional($fotoProfissional)
    {
        $this->fotoProfissional = $fotoProfissional;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setEspecialidade($especialidade)
    {
        $this->especialidade = $especialidade;
    }
}
