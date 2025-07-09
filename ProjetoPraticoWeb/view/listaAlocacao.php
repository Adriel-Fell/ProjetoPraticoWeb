<?php
require_once '../controller/ControlaAlocacao.php';

$controlaAlocacao = new ControlaAlocacao();
$alocacoes = $controlaAlocacao->listar();
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
            <h2>Alocações cadastrados:</h2>
        </div>

        <section class="listas">
            <?php if (count($alocacoes) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID do Cliente</th>
                            <th>ID do Livro</th>
                            <th>Data de Alocação</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($alocacoes as $Alocacao): ?>
                            <tr>
                                <td><?= $Alocacao['id'] ?></td>
                                <td><?= $Alocacao['clientes_id'] ?></td>
                                <td><?= $Alocacao['livros_id'] ?></td>
                                <td><?= $Alocacao['dataalocacao'] ?></td>
                                <td class="acoes">
                                    <a class="button" href="editaAlocacao.php?id=<?= $Alocacao['id'] ?>">Editar</a>
                                    <a class="button delete" href="excluiAlocacao.php?id=<?= $Alocacao['id'] ?>">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Nenhum Alocacao cadastrado.</p>
            <?php endif; ?>
        </section>



        <section class="bottom-nav">
            <ul class="items-header">
                <a href="cadastraAlocacao.html">
                    <li class="btn-nav">Cadastrar alocações!</li>
                </a>
                <a href="../index.html">
                    <li class="btn-nav">Voltar menu inicial!</li>
                </a>
            </ul>
        </section>
    </main>

</body>

</html>