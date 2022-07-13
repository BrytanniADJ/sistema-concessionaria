<?php
include './lib/utils.php';
$login = verificaSession();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/stilo.css">
    <title>HOME</title>
</head>

<body>
    <header>
        <figure>
            <img src="" alt="logo">
            <?php
            if ($login !== 0) {
                $name = $_SESSION['user']['nome'];
                echo "<p>$name</p>";
                echo '<a href="./lib/valida.php?logout">Logout</a>';
            }
            ?>
        </figure>
        <ul>
            <li><a href="./">Home</a></li>
            <?php
            if ($login === 0) {
                echo '<li><a href="./login.php">Login</a></li>';
            }
            ?>
        </ul>
    </header>
    <main>
        <section class="principal">
            <div class="titulo_marca">
                <h1>PW Multimarcas</h1>
            </div>
            <div class="texto_marca">
                <p> Se você está em busca de comprar ou trocar de carro, você está no lugar certo.</p>
                <p> Trabalhamos com todas as marcas e modelos de veículos, com compra e venda.</p>
            </div>

            <button class="saibaMais">Saiba Mais</button>
        </section>
    </main>
    <footer>
        <p> Desenvolvido por WWWSolutions</p>
    </footer>

</body>

</html>
