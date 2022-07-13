<?php
include './lib/utils.php';
$login = verificaSession();

$recurso = '';
if (isset($_GET) && isset($_GET['recurso'])) {
    $recurso = $_GET['recurso'];
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
    <title>Acesso Restrito</title>
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
            <li> <a href="./">Home</a></li>
        </ul>
    </header>
    <main>
        <h1> Acesso Restrito</h1>
        <p> Você não possui permissção para acesso ao recurso
            <?php
            echo $recurso;
            ?>
        </p>

    </main>
    <footer>

    </footer>
</body>

</html>
