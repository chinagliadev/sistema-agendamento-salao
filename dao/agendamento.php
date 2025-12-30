<?php

require_once __DIR__ . '/../config/conexao.php';
include_once __DIR__ . '/../model/agendamento.php';

class Agendamento{

    private $conn;

    public function __construct(){
        $conexao = new conexao();
        $this->conn = $conexao->getConnection();
    }

  public function agendar($idUsuario, $idServico, $idProfissional, $dataAgendamento, $hora, $status) {
        try {
            $sql = "INSERT INTO agenda (id_usuario, id_servico, id_profissional, data_agendamento, hora, status)
                    VALUES (:id_usuario, :id_servico, :id_profissional, :data_agendamento, :hora, :status)";
            
            $stmt = $this->conn->prepare($sql);

            return $stmt->execute([
                ':id_usuario'      => $idUsuario,
                ':id_servico'      => $idServico,
                ':id_profissional' => $idProfissional,
                ':id_data_agendamento' => $dataAgendamento,
                ':hora'            => $hora,
                ':status'          => $status
            ]);

        } catch (PDOException $e) {
            error_log("Erro no agendamento: " . $e->getMessage());
            return false;
        }
    }

}

?>