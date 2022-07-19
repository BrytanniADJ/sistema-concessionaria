<?php
    include '../lib/mysqli.php';
    include '../lib/utils.php';
    $login = verificaSession();
    $marcas = listarMarcas();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/stilo.css">
    <script src="../assets/js/utils.js" defer></script>
    <title>Lista </title>
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
        <table>
            <tr>
                <th> id </th>
                <th> Nome </th>
                <th> Opções </th>
            </tr>
            <?php
            for ($i = 0; $i < count($marcas); $i++) {
                echo '<tr>';
                    echo '<td>'.$marcas[$i]['id'].'</td>';
                    echo '<td>'.$marcas[$i]['nome'].'</td>';
                    echo '<td>';
                        echo '<button onclick="editar(`marcas`,'.$marcas[$i]['id'].')">Editar</button>';
                        echo '<button onclick="deletar(`marcas`,'.$marcas[$i]['id'].')">Deletar</button>';
                    echo '</td>';
                echo'</tr>';
            }
            ?>
        </table>
    </main>
    <footer>
    </footer>
</body>
</html>
