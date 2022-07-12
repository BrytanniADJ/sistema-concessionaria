<?php
include '../lib/mysql.php';
$users = listarUsers();
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
        </figure>
        <ul>
            <li> <a href="../">Home</a></li>
            <li> <a href="../users/cadastra.php">Cadastra Usuário</a></li>
            <li> <a href="../users/lista.php">Lista Usuário</a></li>
        </ul>
    </header>
    <main>
        <!-- Criar a tabela -->
        <table>
            <!-- cabeçalho da tabel -->
            <tr>
                <th> Nome </th>
                <th> Login </th>
                <th> Tipo </th>
                <th> Opções </th>
            </tr>
            <!-- FIM cabeçalho da tabel -->
            <?php
            /*
                Aqui vamos criar um comando for para percorer o vetor que irá conter o objeto de usuários ($users)
                 que criamos no MYSQL.php  que está sendo recuperado no inicio desse arquivo.
            */

            for ($i = 0; $i < count($users); $i++) {
                echo '<tr>'; // tag html para iniciar linha de tabela
                    echo '<td>'.$users[$i]['nome'].'</td>'; // primeira coluna da tabela ...
                    echo '<td>'.$users[$i]['login'].'</td>';
                    echo '<td>';
                        switch($users[$i]['tipo']){
                            case 1:
                                echo 'Administrador';
                                break;
                            case 2:
                                echo 'Cliente';
                                break;
                            case 3:
                                echo 'Funcionário';
                                break;
                            default:
                                echo 'Inválido';
                        }
                    echo '</td>'; // aqui vamos ter mudar de inteiro para string
                    echo '<td>';
                        echo '<button onclick="editarUser('.$users[$i]['id'].')">Editar</button>';
                        echo '<button onclick="detelarUser('.$users[$i]['id'].')">Deletar</button>';
                    echo '</td>';
                echo'</tr>'; // fim da linha da tabela
            }
            ?>
        </table>

    </main>
    <footer>

    </footer>
</body>

</html>
