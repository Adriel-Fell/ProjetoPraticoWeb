<?php
include '../controller/ControlaLivro.php';

if (!isset($_GET['id'])) {
    die('ID do livro não informado.');
}

$controlaLivro = new ControlaLivro();
$livro = $controlaLivro->buscarPorId($_GET['id']);

if (!$livro) {
    die('Livro não encontrado.');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Livro</title>
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

            <form class="formulario" action="processaEdicaoLivro.php" method="post">
                <div class="inputs-cadastros">
                    <div>
                        <input type="hidden" name="id" value="<?= $livro['id'] ?>">
                        <label>*Titulo:</label>
                        <input class="entrada" type="text" name="titulo" value="<?= $livro['titulo'] ?>" required>
                        <label>*Tema:</label>
                        <input class="entrada" type="text" name="tema" value="<?= $livro['tema'] ?>" required>
                        <label>*Autor:</label>
                        <input class="entrada" type="text" name="autor" value="<?= $livro['autor'] ?>" required>
                    </div>
                </div>

                <div class="btn-cadastros">
                    <button class="btn-submit" type="submit">Atualizar</button>
                    <a href="listaLivro.php"><button class="btn-submit" type="button">Cancelar</button></a>
                </div>

            </form>
        </section>


    </main>

</body>

</html>