<?php
    include '../lib/utils.php';
    $login = verificaSession();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assests/css/reset.css">
    <link rel="stylesheet" href="../assests/css/stilo.css">
    <script src="../assets/js/utils.js" defer></script>
    <title>Cadastrar Carro</title>
</head>
<body>
    <header>
        <figure>
            <img src="" alt="logo">
            <?php
            if ($login !== 0) {
                $name = $_SESSION['user']['nome'];
                echo "<p>$name</p>";
                echo '<a href="../lib/valida.php?logout">Logout</a>';
            }
            ?>
        </figure>
        <?php
            exibeMenuSubpasta('.');
        ?>
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
                <label> Tipo: </label>
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
