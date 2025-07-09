<?php

class Livro
{
    private $id;
    private $titulo;
    private $tema;
    private $autor;
    public function __construct($titulo, $tema, $autor)
    {
        $this->titulo = $titulo;
        $this->tema = $tema;
        $this->autor = $autor;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getTema()
    {
        return $this->tema;
    }

    public function setTema($tema)
    {
        $this->tema = $tema;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function setAutor($autor)
    {
        $this->autor = $autor;
    }
}
