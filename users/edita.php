<?php
include '../lib/mysql.php';
    $login = 0;
    if(isset($_GET['id'])){
        $id = (int) $_GET['id'];
        $user = buscarUserId($id);
    }else{
        header('Location: ../bemvindo.php');
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
        </figure>
        <ul>
            <li> <a href="../">Home</a></li>
            <li> <a href="../users/cadastra.php">Cadastra Usuário</a></li>
            <li> <a href="../users/lista.php">Lista Usuário</a></li>
        </ul>
    </header>
    <main>
        <form action="../lib/valida.php?edita=users" method="post" enctype="multipart/form-data">
            <p>
                <input name="id" type="text" id="box_nome" style="display: none;" <?php echo 'value ="'. $id .'"' ?>>
            </p>
            <p>
                <label> Nome: </label>
                <input name="nome" type="text" id="box_nome" <?php echo 'value ="'.$user['nome'].'"' ?> >
            </p>
            <p>
                <label> login: </label>
                <input id="box_login" name="login" type="text" <?php echo 'value ="'.$user['login'].'"' ?>>
            </p>
            <p>
                <label> Tipo: </label>
                <select id="box_tipo" name="tipo" >
                    <?php
                        $lista = [
                            array(
                                'value' => 1,
                                'nome' => 'Administrador'
                            ),
                            array(
                                'value' => 2,
                                'nome' => 'Cliente'
                            ),
                            array(
                                'value' => 3,
                                'nome' => 'Funcionário'
                            )
                            ];

                        for($i =0; $i < count($lista); $i++){
                            if($lista[$i]['value'] === $user['tipo']){
                                echo '<option value="'.$lista[$i]['value']. '" selected>'.$lista[$i]['nome'].'</option>';
                            }else {
                                echo '<option value="'.$lista[$i]['value']. '">'.$lista[$i]['nome'].'</option>';
                            }
                        }
                    ?>
                </select>
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
