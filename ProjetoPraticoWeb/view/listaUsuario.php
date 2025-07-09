<?php
require_once '../controller/ControlaUsuario.php';

$controlaUsuario = new ControlaUsuario();
$usuarios = $controlaUsuario->listar();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
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
            <h2>Clientes cadastrados:</h2>
        </div>
        

        <section class="listas">

            <?php if (count($usuarios) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Genero</th>
                            <th>Tema Preferido</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $usuario): ?>
                            <tr>
                                <td><?= $usuario['id'] ?></td>
                                <td><?= $usuario['nome'] ?></td>
                                <td><?= $usuario['email'] ?></td>
                                <td><?= $usuario['genero'] ?></td>
                                <td><?= $usuario['temapreferido'] ?></td>
                                <td class="acoes">
                                    <a class="button" href="editaUsuario.php?id=<?= $usuario['id'] ?>">Editar</a>
                                    <a class="button delete" href="excluiUsuario.php?id=<?= $usuario['id'] ?>">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Nenhum cliente cadastrado.</p>
            <?php endif; ?>
        </section>





        <section class="bottom-nav">
            <ul class="items-header">
                <a href="cadastraCliente.html">
                    <li class="btn-nav">Cadastrar Clientes!</li>
                </a>
                <a href="../index.html">
                    <li class="btn-nav">Voltar menu inicial!</li>
                </a>
            </ul>

        </section>
    </main>


</body>

</html>