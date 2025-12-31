<?php

require_once __DIR__ . '/../config/conexao.php';
include_once __DIR__ . '/../model/agendamento.php';

class AgendamentoDAO
{

    private $conn;

    public function __construct()
    {
        $conexao = new conexao();
        $this->conn = $conexao->getConnection();
    }

    public function agendar(Agendamento $agendamento)
    {
        try {
            $sql = "INSERT INTO agenda (id_usuario, id_servico, id_profissional, data_agendamento, hora, status)
                VALUES (:id_usuario, :id_servico, :id_profissional, :data_agendamento, :hora, :status)";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id_usuario'      => $agendamento->getIdUsuario(),
                ':id_servico'      => $agendamento->getIdServico(),
                ':id_profissional' => $agendamento->getIdProfissional(),
                ':data_agendamento' => $agendamento->getData(), // Corrigido aqui
                ':hora'            => $agendamento->getHorario(),
                ':status'          => $agendamento->getStatus()
            ]);

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("Erro no agendamento: " . $e->getMessage());
            return false;
        }
    }
}
