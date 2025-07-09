<?php
include '../controller/ControlaLivro.php';

if (!isset($_GET['id'])) {
    die('ID não fornecido para exclusão.');
}

$id = $_GET['id'];
$controlaLivro = new ControlaLivro();
$controlaLivro->excluir($id);
header("Location: listaLivro.php");
exit;
