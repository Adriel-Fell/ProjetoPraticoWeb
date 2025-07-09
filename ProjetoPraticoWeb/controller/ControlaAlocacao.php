<?php

include '../resources/Database.php';

class ControlaAlocacao
{
    private $tabela = 'alocacoes';
    private $db;
    private $connection;

    public function __construct()
    {
        $this->db = new Database();
        $this->connection = $this->db->getConnection();
    }

    public function salvar(Alocacao $alocacao)
    {
        try {
            $sql = "INSERT INTO $this->tabela (clientes_id, livros_id) VALUES (?, ?)";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$alocacao->getIdUsuario(), $alocacao->getIdLivro()]);
            $this->db->closeConnection();
        } catch (\Exception $e) {
            throw new \Exception("Erro ao inserir alocacao: " . $e->getMessage());
        }
    }

    public function listar()
    {
        try {
            $sql = "SELECT * FROM $this->tabela";
            $stmt = $this->connection->query($sql);
            $alocacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->db->closeConnection();
            return $alocacoes;
        } catch (\Exception $e) {
            throw new \Exception("Erro ao listar alocacoes: " . $e->getMessage());
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
            throw new \Exception("Erro ao excluir alocacao: " . $e->getMessage());
        }
    }

    public function buscarPorId($id)
    {
        try {
            $sql = "SELECT * FROM $this->tabela WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$id]);
            $alocacao = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->db->closeConnection();
            return $alocacao;
        } catch (\Exception $e) {
            throw new \Exception("Erro ao buscar alocacao: " . $e->getMessage());
        }
    }

    public function atualizar(Alocacao $alocacao)
    {
        try {
            $sql = "UPDATE $this->tabela SET clientes_id = ?, livros_id = ? WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([
                $alocacao->getIdUsuario(),
                $alocacao->getIdLivro(),
                $alocacao->getId()
            ]);
            $this->db->closeConnection();
        } catch (\Exception $e) {
            throw new \Exception("Erro ao atualizar alocacao: " . $e->getMessage());
        }
    }
}
