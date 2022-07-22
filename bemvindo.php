<?php
    include './lib/utils.php';
    $login = verificaSession();
    $user = '';
    if (isset($_GET) && isset($_GET['username'])) {
        $user =htmlspecialchars( $_GET['username']);
    }
    if($user === '' && $_SESSION['user']){
        $user = $_SESSION['user']['nome'];
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
    <script src="./assets/js/utils.js" defer></script>
    <title>Bem-Vindo</title>
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
        <?php
            exibeMenuSubpasta('');
        ?>
    </header>
    <main>
        <?php
            if ($user !== '') {
                echo '<h1> Bem-Vindo </h1>';
                echo '<h2>' . $user . '</h2>';
            }
        ?>
    </main>
    <footer>
    </footer>
</body>
</html>
