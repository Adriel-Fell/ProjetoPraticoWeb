<?php
include '../controller/ControlaUsuario.php';

if (!isset($_GET['id'])) {
    die('ID do usuário não informado.');
}

$controlaUsuario = new ControlaUsuario();
$usuario = $controlaUsuario->buscarPorId($_GET['id']);

if (!$usuario) {
    die('Cliente não encontrado.');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav>
            <ul class="items-header">
                <a href="./listaUsuario.php">
                    <li class="btn-nav">Consultar clientes</li>
                </a>
                <a href="./listaLivro.php">
                    <li class="btn-nav">Consultar Livros</li>
                </a>
                <a href="./listaAlocacao.php">
                    <li class="btn-nav">Consultar Alocações</li>
                </a>
                <a href="../index.html">
                    <li class="btn-nav">Tela Principal</li>
                </a>
            </ul>
        </nav>

    </header>

    <main class="cadastros">
        <section>
            <div class="title">
                <h2>Editar Usuário</h2>
            </div>

            <form class="formulario" action="processaEdicaoUsuario.php" method="post">
                <div class="inputs-cadastros">
                    <div>
                        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                        <label>*Nome:</label>
                        <input class="entrada" type="text" name="nome" value="<?= $usuario['nome'] ?>" required>
                        <label>*Email:</label>
                        <input class="entrada" type="email" name="email" value="<?= $usuario['email'] ?>" required>
                        <label>Genero:</label>
                        <input class="entrada" type="text" name="genero" value="<?= $usuario['genero'] ?>">
                        <label>Tema Preferido:</label>
                        <input class="entrada" type="text" name="temaPreferido"
                            value="<?= $usuario['temapreferido'] ?>">
                    </div>
                </div>

                <div class="btn-cadastros">
                    <button class="btn-submit" type="submit">Atualizar</button>
                    <a href="listaUsuario.php"><button class="btn-submit" type="button">Cancelar</button></a>
                </div>


            </form>
        </section>
    </main>

</body>

</html>