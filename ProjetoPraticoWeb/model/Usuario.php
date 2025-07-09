<?php

class Usuario
{
    private $id;
    private $nome;
    private $email;
    private $genero;
    private $temaPreferido;

    public function __construct($nome, $email, $genero, $temaPreferido)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->genero = $genero;
        $this->temaPreferido = $temaPreferido;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getGenero()
    {
        return $this->genero;
    }

    public function setGenero($genero)
    {
        $this->genero = $genero;
    }
    public function getTemaPreferido()
    {
        return $this->temaPreferido;
    }

    public function setTemaPreferido($temaPreferido)
    {
        $this->temaPreferido = $temaPreferido;
    }
}
