<?php
include '../model/Livro.php';
include '../controller/ControlaLivro.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $tema = $_POST['tema'];
    $autor = $_POST['autor'];


    $livro = new Livro($titulo, $tema, $autor);
    $controlaLivro = new ControlaLivro();

    $controlaLivro->salvar($livro);
    header("Location: listaLivro.php");
}
