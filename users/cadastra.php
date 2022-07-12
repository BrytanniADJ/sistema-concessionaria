<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assests/css/reset.css">
    <link rel="stylesheet" href="../assests/css/stilo.css">
    <script src="../assests/js/script.js" defer></script>
    <title>Cadastrar Carro</title>
</head>
<body>
    <header>
        <figure>
            <img src="" alt="logo">
        </figure>
        <ul>
            <li> <a href="../">Home</a></li>
            <li> <a href="../users/cadastra.php">Cadastra Usuário</a></li>
            <li> <a href="../users/lista.php">Lista Usuário</a></li>
        </ul>
    </header>
    <main>
        <form action="../lib/valida.php?cadastra=users" method="post" enctype="multipart/form-data">
            <p>
                <label> Nome: </label>
                <input name="nome" type="text" id="box_nome">
            </p>
            <p>
                <label> login: </label>
                <input id="box_login" name="login" type="text">
            </p>
            <p>
                <label> Senha: </label>
                <input name="password" type="password" id="box_password">
            </p>
            <p>
                <label> Marca: </label>
                <select id="box_tipo" name="tipo">
                    <option value="1">Administrador</option>
                    <option value="2">Cliente</option>
                    <option value="3">Funcionário</option>
                </select>
            </p>
            <p>
                <input type="submit" value="Cadastrar">
                <input type="button" value="Cancelar" onclick="bt_cancelar()">
            </p>
        </form>
    </main>
    <footer>
    </footer>
</body>
</html>
