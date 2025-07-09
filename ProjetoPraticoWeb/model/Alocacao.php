<?php

class Alocacao
{
    private $id;
    private $idUsuario;
    private $idLivro;
    public function __construct($idUsuario, $idLivro)
    {
        $this->idUsuario = $idUsuario;
        $this->idLivro = $idLivro;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getIdLivro()
    {
        return $this->idLivro;
    }

    public function setIdLivro($idLivro)
    {
        $this->idLivro = $idLivro;
    }
}
