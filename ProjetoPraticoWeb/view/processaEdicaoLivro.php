<?php
include '../model/Livro.php';
include '../controller/ControlaLivro.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $tema = $_POST['tema'];
    $autor = $_POST['autor'];

    $livro = new Livro($titulo, $tema, $autor);
    $livro->setId($id);
    $controlaLivro = new ControlaLivro();

    $controlaLivro->atualizar($livro);

    header("Location: listaLivro.php");
    exit;
} 
