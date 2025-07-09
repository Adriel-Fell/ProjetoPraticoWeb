<?php
require_once '../controller/ControlaLivro.php';

$controlaLivro = new ControlaLivro();
$livros = $controlaLivro->listar();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Lista de Alocações</title>
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

    <main>
        <div class="title">
            <h2>Livros cadastrados:</h2>
        </div>

        <section class="listas">
            <?php if (count($livros) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Tema</th>
                            <th>Autor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($livros as $livro): ?>
                            <tr>
                                <td><?= $livro['id'] ?></td>
                                <td><?= $livro['titulo'] ?></td>
                                <td><?= $livro['tema'] ?></td>
                                <td><?= $livro['autor'] ?></td>
                                <td class="acoes">
                                    <a class="button" href="editaLivro.php?id=<?= $livro['id'] ?>">Editar</a>
                                    <a class="button delete" href="excluiLivro.php?id=<?= $livro['id'] ?>">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Nenhum livro cadastrado.</p>
            <?php endif; ?>
        </section>



        <section class="bottom-nav">
            <ul class="items-header">
                <a href="cadastraLivro.html">
                    <li class="btn-nav">Cadastrar Livros!</li>
                </a>
                <a href="../index.html">
                    <li class="btn-nav">Voltar menu inicial!</li>
                </a>
            </ul>
        </section>
    </main>

</body>

</html>