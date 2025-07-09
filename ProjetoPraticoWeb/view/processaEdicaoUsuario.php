<?php
include '../model/Usuario.php';
include '../controller/ControlaUsuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $genero = $_POST['genero'];
    $temaPreferido = $_POST['temaPreferido'];


    $usuario = new Usuario($nome, $email, $genero, $temaPreferido);
    $usuario->setId($id);
    $controlaUsuario = new ControlaUsuario();

    $controlaUsuario->atualizar($usuario);

    header("Location: listaUsuario.php");
    exit;
} 
