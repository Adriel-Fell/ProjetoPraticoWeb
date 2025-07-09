<?php
include '../controller/ControlaAlocacao.php';

if (!isset($_GET['id'])) {
    die('ID não fornecido para exclusão.');
}

$id = $_GET['id'];
$controlaAlocacao = new ControlaAlocacao();
$controlaAlocacao->excluir($id);

header("Location: listaAlocacao.php");
exit;
