<?php

class Agendamento {

    private $horario;
    private $data;
    private $idProfissional; 
    private $idServico;
    private $idUsuario;
    private $status;

    // Construtor único. Definimos os parâmetros como null para que 
    // você possa instanciar a classe vazia se precisar.
    public function __construct($horario = null, $data = null, $idProfissional = null, $idServico = null, $idUsuario = null, $status = 'Pendente')
    {
        $this->horario = $horario;
        $this->data = $data;
        $this->idProfissional = $idProfissional;
        $this->idServico = $idServico;
        $this->idUsuario = $idUsuario;
        $this->status = $status;
    }

    // --- GETTERS E SETTERS ---

    public function getHorario(){
        return $this->horario;
    }

    public function setHorario($horario){
        $this->horario = $horario;
    }

    public function getData(){
        return $this->data;
    }

    public function setData($data){
        $this->data = $data;
    }

    public function getIdProfissional(){
        return $this->idProfissional;
    }

    public function setIdProfissional($idProfissional){
        $this->idProfissional = $idProfissional;
    }

    public function getIdServico(){
        return $this->idServico;
    }

    public function setIdServico($idServico){
        $this->idServico = $idServico;
    }

    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status; 
    }
}
?>