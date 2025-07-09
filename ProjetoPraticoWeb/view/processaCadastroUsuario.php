<?php
include '../model/Usuario.php';
include '../controller/ControlaUsuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $genero = $_POST['genero'];
    $temaPreferido = $_POST['temaPreferido'];


    $usuario = new Usuario($nome, $email, $genero, $temaPreferido);
    $controlaUsuario = new ControlaUsuario();

    $controlaUsuario->salvar($usuario);

    header("Location: listaUsuario.php");
}
