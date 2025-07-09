<?php

include '../resources/Database.php';

class ControlaLivro
{
    private $tabela = 'livros';
    private $db;
    private $connection;

    public function __construct()
    {
        $this->db = new Database();
        $this->connection = $this->db->getConnection();
    }

    public function salvar(Livro $livro)
    {
        try {
            $sql = "INSERT INTO $this->tabela (titulo, tema, autor) VALUES (?, ?, ?)";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$livro->getTitulo(), $livro->getTema(), $livro->getAutor()]);
            $this->db->closeConnection();
        } catch (\Exception $e) {
            throw new \Exception("Erro ao inserir livro: " . $e->getMessage());
        }
    }

    public function listar()
    {
        try {
            $sql = "SELECT * FROM $this->tabela";
            $stmt = $this->connection->query($sql);
            $livros = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->db->closeConnection();
            return $livros;
        } catch (\Exception $e) {
            throw new \Exception("Erro ao listar livros: " . $e->getMessage());
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
            throw new \Exception("Erro ao excluir livro: " . $e->getMessage());
        }
    }

    public function buscarPorId($id)
    {
        try {
            $sql = "SELECT * FROM $this->tabela WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$id]);
            $livro = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->db->closeConnection();
            return $livro;
        } catch (\Exception $e) {
            throw new \Exception("Erro ao buscar livro: " . $e->getMessage());
        }
    }

    public function atualizar(Livro $livro)
    {
        try {
            $sql = "UPDATE $this->tabela SET titulo = ?, tema = ?, autor = ? WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([
                $livro->getTitulo(),
                $livro->getTema(),
                $livro->getAutor(),
                $livro->getId()
            ]);
            $this->db->closeConnection();
        } catch (\Exception $e) {
            throw new \Exception("Erro ao atualizar livro: " . $e->getMessage());
        }
    }
}
