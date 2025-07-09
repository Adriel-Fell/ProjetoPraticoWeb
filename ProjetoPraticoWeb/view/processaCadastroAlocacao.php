<?php
include '../model/Alocacao.php';
include '../controller/ControlaAlocacao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUsuario = $_POST['idUsuario'];
    $idLivro = $_POST['idLivro'];


    $alocacao = new alocacao($idUsuario, $idLivro);
    $controlaAlocacao = new ControlaAlocacao();
    $controlaAlocacao->salvar($alocacao);
    header("Location: listaAlocacao.php");
}
