<?php

class Agendamento {

    private $horario;
    private $data;
    private $idProfissional; 
    private $idServico;
    private $idUsuario;

    public function __construct($horario, $data, $idProfissional, $idServico, $idUsuario)
    {
        $this->horario = $horario;
        $this->data = $data;
        $this->idProfissional = $idProfissional;
        $this->idServico = $idServico;
        $this->idUsuario = $idUsuario;
    }

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
}

?>