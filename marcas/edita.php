<?php
    include '../lib/mysqli.php';
    include '../lib/utils.php';
    $login = verificaSession();

    if (isset($_GET['id'])) {
        $id = (int) $_GET['id'];
        $marca = buscarMarcaId($id);
    } else {
        header('Location: ../bemvindo.php');
    }

    if (($_SESSION['user']['tipo'] === 2)) {
        header('Location: ../acessorestrito.php');
    } else if (!$marca){
       header('Location: ../acessorestrito.php?marcaNotFound');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/stilo.css">
    <script src="../assests/js/utils.js" defer></script>
    <title>Editar Usuário</title>
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
            exibeMenuSubpasta();
        ?>
    </header>
    <main>
        <form action="../lib/valida.php?edita=marcas" method="post" enctype="multipart/form-data">
            <p>
                <input name="id" type="text" id="box_nome" style="display: none;" <?php echo 'value ="' . $id . '"' ?>>
            </p>
            <p>
                <label> Nome: </label>
                <input name="nome" type="text" id="box_nome" <?php echo 'value ="' . $marca['nome'] . '"' ?>>
            </p>
            <p>
                <input type="submit" value="Editar">
                <input type="button" value="Cancelar" onclick="bt_cancelar()">
            </p>
        </form>
    </main>
    <footer>
    </footer>
</body>
</html>
