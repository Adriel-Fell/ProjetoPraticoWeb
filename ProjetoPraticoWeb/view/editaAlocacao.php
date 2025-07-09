<?php
include '../controller/ControlaAlocacao.php';

if (!isset($_GET['id'])) {
    die('ID do Alocacao não informado.');
}

$controlaAlocacao = new ControlaAlocacao();
$Alocacao = $controlaAlocacao->buscarPorId($_GET['id']);

if (!$Alocacao) {
    die('Alocacao não encontrado.');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Alocacao</title>
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
                <h2>Editar Alocação</h2>
            </div>

            <form class="formulario" action="processaEdicaoAlocacao.php" method="post">
                <div class="inputs-cadastros">
                    <div>
                        <input type="hidden" name="id" value="<?= $Alocacao['id'] ?>">
                        <label>*idUsuario:</label>
                        <input class="entrada" type="text" name="idUsuario" value="<?= $Alocacao['clientes_id'] ?>"
                            required>
                        <label>*idLivro:</label>
                        <input class="entrada" type="text" name="idLivro" value="<?= $Alocacao['livros_id'] ?>"
                            required>
                    </div>
                </div>

                <div class="btn-cadastros">
                    <button class="btn-submit" type="submit">Atualizar</button>
                    <a href="listaAlocacao.php"><button class="btn-submit" type="button">Cancelar</button></a>
                </div>

            </form>
        </section>
    </main>

</body>

</html>