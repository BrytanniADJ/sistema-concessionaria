<?php
    $msgErr = '';
    if (isset($_GET) && isset($_GET['error'])) {
        $msgErr = $_GET['error'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/stilo.css">
    <script src="./assests/js/script.js" defer></script>
    <title>Login</title>
</head>
<body>
    <header>
        <figure>
            <img src="" alt="logo">
        </figure>
        <ul>
            <li> <a href="./">Home</a></li>
        </ul>
    </header>
    <main>
        <form action="./lib/valida.php" method="post" enctype="multipart/form-data">
            <p>
                <label> Login: </label>
                <input name="login" type="text" id="box_login">
            </p>
            <p>
                <label> Senha: </label>
                <input name="password" type="password" id="box_ano">
            </p>
            <?php
            if ($msgErr !== '') {
                echo '<p>';
                echo '<label> Erro: ' . $msgErr . '</label>';
                echo '</p>';
            }
            ?>
            <p>
                <input type="submit" value="login">
                <input type="button" value="Cancelar" onclick="bt_cancelar()">
            </p>

        </form>

    </main>
    <footer>
    </footer>
</body>
</html>
