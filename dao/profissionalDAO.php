<?php

require_once('../config/conexao.php');
include '../model/Profissional.php';

class profissionalDAO
{

    private $conn;

    const PROFISSIONAL_ATIVADO = 0;
    const PROFISSIONAL_DESATIVADO = 1;

    public function __construct()
    {
        $conexao = new conexao();
        $this->conn = $conexao->getConnection();
    }

    public function inserirProfissional(Profissional $profissional)
    {

        $sqlInserir = "INSERT INTO profissionais (nome, especialidade, telefone, email, foto_perfil, cpf, ativo)
            VALUE (:nome, :especialidade, :telefone, :email, :foto_perfil, :cpf, :ativo)";

        $dadosProfissionais = $this->conn->prepare($sqlInserir);
        $dadosProfissionais->execute([
            ':nome' => $profissional->getNome(),
            ':especialidade' => $profissional->getEspecialidade(),
            ':telefone' => $profissional->getTelefone(),
            ':email' => $profissional->getEmail(),
            ':foto_perfil' => $profissional->getFotoProfissional(),
            ':cpf' => $profissional->getCpf(),
            ':ativo' => profissionalDAO::PROFISSIONAL_ATIVADO
        ]);

        if ($dadosProfissionais->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function listarProfissionais()
    {
        $sqlLista = "SELECT * FROM profissionais";

        $dadosListados = $this->conn->prepare($sqlLista);
        $dadosListados->execute();

        $listaProfissionais = $dadosListados->fetchAll();
        return $listaProfissionais;
    }

    public function desativarProfissional($id): int
    {
        $sqlDesativar = "UPDATE profissionais SET ativo = " . self::PROFISSIONAL_DESATIVADO . " WHERE id_profissional = :id";

        $dadosDesativado = $this->conn->prepare($sqlDesativar);
        $dadosDesativado->execute(
            [
                ':id' => $id
            ]
        );

        return $dadosDesativado->rowCount();
    }

    public function ativarProfissional($id): int
    {
        $sqlAtivar = "UPDATE profissionais SET ativo = " . self::PROFISSIONAL_ATIVADO . " WHERE id_profissional = :id";

        $dadosAtivado = $this->conn->prepare($sqlAtivar);
        $dadosAtivado->execute(
            [
                ':id' => $id
            ]
        );

        return $dadosAtivado->rowCount();
    }

    public function editarProfissional(Profissional $profissional, $id): int
    {
        $sqlAtualizar = "UPDATE profissionais 
                        SET nome = :nome, 
                        especialidade = :especialidade,
                        telefone = :telefone,
                        email = :email,
                        foto_perfil = :foto_perfil, 
                        cpf = :cpf
                        WHERE id_profissional = :id";

        $dadosEditar = $this->conn->prepare($sqlAtualizar);
        $dadosEditar->execute(
            [
                ':nome' => $profissional->getNome(),
                ':especialidade' => $profissional->getEspecialidade(),
                ':telefone' => $profissional->getTelefone(),
                ':email' => $profissional->getEmail(),
                ':foto_perfil' => $profissional->getFotoProfissional(),
                ':cpf' => $profissional->getCpf(),
                ':id' => $id
            ]
        );

        return $dadosEditar->rowCount();
    }

    public function buscarPorId($id)
    {
        try {
            $sql = "SELECT * FROM profissionais WHERE id_profissional = :id LIMIT 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }


    public function filtrarStatusProfissional(string $tipo): array
    {
        $status_valor = match ($tipo) {
            'ativo'    => self::PROFISSIONAL_ATIVADO,
            'desativo' => self::PROFISSIONAL_DESATIVADO,
            'todos'    => null,
            default    => false,
        };

        if ($status_valor === false) {
            return [];
        }

        $sqlFiltrarStatus = "SELECT * FROM profissionais";
        $params = [];

        if ($status_valor !== null) {
            $sqlFiltrarStatus .= " WHERE ativo = :status";
            $params[':status'] = $status_valor;
        }

        try {
            $dadosFiltrados = $this->conn->prepare($sqlFiltrarStatus);
            $dadosFiltrados->execute($params);

            return $dadosFiltrados->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("Erro ao filtrar status: " . $e->getMessage());
            return [];
        }
    }

    public function pesquisarProfissionais($pesquisa)
    {
        $sql = "SELECT * FROM profissionais
            WHERE nome LIKE :pesq
               OR email LIKE :pesq
               OR telefone LIKE :pesq
               OR cpf LIKE :pesq";

        $stmt = $this->conn->prepare($sql);
        $like = "%$pesquisa%";
        $stmt->bindParam(':pesq', $like, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function qtdProfissionaisAtivos()
    {
        $sql = "SELECT COUNT(*) AS total FROM profissionais WHERE ativo = :status";

        $dadosProfissionais = $this->conn->prepare($sql);
        $dadosProfissionais->execute(
            ['status' => self::PROFISSIONAL_ATIVADO]
        );

        $resultado = $dadosProfissionais->fetch(PDO::FETCH_ASSOC);

        return $resultado['total'];
    }

    public function qtdProfissionaisDesativados()
    {
        $sql = "SELECT COUNT(*) AS total FROM profissionais WHERE ativo = :status";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['status'=> self::PROFISSIONAL_DESATIVADO]);

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado['total'];
    }
}
