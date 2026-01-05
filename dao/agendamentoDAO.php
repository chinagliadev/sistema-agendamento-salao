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

    public function agendamentoDeHoje()
    {
        $sql = "SELECT 
        id_agenda as id,
        agenda.hora as horario_agendado,
        usuarios.nome as cliente,
        profissionais.nome as nome_profissional,
        servicos.nome as servico,
        status
        FROM agenda 
        INNER JOIN usuarios ON agenda.id_usuario = usuarios.id_usuario
        INNER JOIN profissionais ON agenda.id_profissional = profissionais.id_profissional
        INNER JOIN servicos ON agenda.id_servico = servicos.id_servico
        WHERE data_agendamento = CURDATE();
         ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function agendamentoProximosDias()
    {
        $sql = "SELECT 
        data_agendamento,
        agenda.hora as horario_agendado,
        usuarios.nome as cliente,
        profissionais.nome as nome_profissional,
        servicos.nome as servico,
        status
        FROM agenda 
        INNER JOIN usuarios ON agenda.id_usuario = usuarios.id_usuario
        INNER JOIN profissionais ON agenda.id_profissional = profissionais.id_profissional
        INNER JOIN servicos ON agenda.id_servico = servicos.id_servico
        WHERE data_agendamento > CURDATE();
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function concluirAgendamento($id)
    {
        $sql = "UPDATE agenda 
            SET status = 'concluido' 
            WHERE id_agenda = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->rowCount();
    }
    
    public function cancelarConclusao($id)
    {
        $sql = "UPDATE agenda SET status = 'marcado' WHERE id_agenda = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount();
    }
}
