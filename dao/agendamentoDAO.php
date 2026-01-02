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
                ':data_agendamento' => $agendamento->getData(),
                ':hora'            => $agendamento->getHorario(),
                ':status'          => $agendamento->getStatus()
            ]);

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("Erro no agendamento: " . $e->getMessage());
            return false;
        }
    }

   public function listarHorariosLivres($data, $idProfissional)
{
    $gradeCompleta = ['08:00', '09:00', '10:00', '11:00', '13:00', '14:00', '15:00', '16:00', '17:00'];

    $sql = "SELECT hora FROM agenda 
            WHERE data_agendamento = :data 
            AND id_profissional = :id 
            AND status = 'marcado'";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute([':data' => $data, ':id' => $idProfissional]);
    
    $ocupados = $stmt->fetchAll(PDO::FETCH_COLUMN);

    return array_values(array_diff($gradeCompleta, $ocupados));
}

    public function cancelarAgendamento($idServico)
    {
        $sql = "DELETE FROM agenda WHERE id_agenda = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            ':id' => $idServico
        ]);

        return $stmt->rowCount();
    }
}
