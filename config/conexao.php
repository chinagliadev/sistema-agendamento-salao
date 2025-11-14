<?php

$env = parse_ini_file('../.env');

class conexao
{

    private $conn;

    public function __construct()
    {

        $dsn = "mysql:dbname={$_ENV['BANCO']};host={$_ENV['HOST']}";
        $usuario = $_ENV['USUARIO'];
        $senha = $_ENV['SENHA'];

        try {
          $this->conn = new PDO($dsn, $usuario, $senha);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro ao conectar: " . $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
