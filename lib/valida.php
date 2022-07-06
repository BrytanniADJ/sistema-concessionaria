<?php
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$host = $_ENV['HOST'];
$userDb = $_ENV['USER'];
$passwordDb = $_ENV['PASSWORD'];
$database = $_ENV['DATABASE'];

function conecta()
{
    $host = $GLOBALS['host'];
    $userDb = $GLOBALS['userDb'];
    $passwordDb = $GLOBALS['passwordDb'];
    $database = $GLOBALS['database'];

    $link = mysqli_connect($host, $userDb, $passwordDb, $database);

    if (mysqli_connect_errno()){
        return NULL;
    }else{
        return $link;
    }
}
function verificaLogin($login, $password){
    $link = conecta();
    if ($link === NULL){
        header('Location: ../login.php?error= Acesso ao BD');
    }else{
        $query = "SELECT id, login, nome, tipo FROM users WHERE login='$login' and password='$password' LIMIT 1";
        $result = mysqli_query($link, $query);

        if (mysqli_num_rows($result) < 1){
            header('Location: ../login.php?error= Usuário e/ou senha inválidos');
        }else{
            while ($row = mysqli_fetch_row($result)){
                $usuario = array(
                    'id' => $row[0],
                    'login' => $row[1],
                    'nome' => $row[2],
                    'tipo' => (int)$row[3]
                );
            }
            if(!$_SESSION){
                session_start();
            }
            $_SESSION['user'] = $usuario;
            $username = $usuario['nome'];
            header("Location: ../bemvindo.php?username=$username");
        }
    }
}
?>
