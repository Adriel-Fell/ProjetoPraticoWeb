<?php

include '../resources/Database.php';

class ControlaUsuario
{
    private $tabela = 'clientes';
    private $db;
    private $connection;

    public function __construct()
    {
        $this->db = new Database();
        $this->connection = $this->db->getConnection();
    }

    public function salvar(Usuario $cliente)
    {
        try {
            $sql = "INSERT INTO $this->tabela (nome, email, genero, temapreferido) VALUES (?, ?, ?, ?)";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$cliente->getNome(), $cliente->getEmail(), $cliente->getGenero(), $cliente->getTemaPreferido()]);
            $this->db->closeConnection();
            echo "<script>alert('Ação bem sucedida!');</script>";
        } catch (\Exception $e) {
            throw new \Exception("Erro ao inserir cliente: " . $e->getMessage());
            echo "<script>alert('Erro ao inserir cliente!');</script>";
        }
    }

    public function listar()
    {
        try {
            $sql = "SELECT * FROM $this->tabela";
            $stmt = $this->connection->query($sql);
            $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->db->closeConnection();
            return $clientes;
        } catch (\Exception $e) {
            throw new \Exception("Erro ao listar clientes: " . $e->getMessage());
        }
    }

    public function excluir($id)
    {
        try {
            $sql = "DELETE FROM $this->tabela WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$id]);
            $this->db->closeConnection();
        } catch (\Exception $e) {
            throw new \Exception("Erro ao excluir cliente: " . $e->getMessage());
        }
    }

    public function buscarPorId($id)
    {
        try {
            $sql = "SELECT * FROM $this->tabela WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$id]);
            $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->db->closeConnection();
            return $cliente;
        } catch (\Exception $e) {
            throw new \Exception("Erro ao buscar cliente: " . $e->getMessage());
        }
    }

    public function atualizar(Usuario $cliente)
    {
        try {
            $sql = "UPDATE $this->tabela SET nome = ?, email = ?, genero = ?, temaPreferido = ? WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([
                $cliente->getNome(),
                $cliente->getEmail(),
                $cliente->getGenero(),
                $cliente->getTemaPreferido(),
                $cliente->getId()
            ]);
            $this->db->closeConnection();
        } catch (\Exception $e) {
            throw new \Exception("Erro ao atualizar cliente: " . $e->getMessage());
        }
    }
}
