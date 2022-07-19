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

        if (mysqli_connect_errno()) {
            return NULL;
        } else {
            return $link;
        }
    }
    function verificaLogin($login, $password)
    {
        $link = conecta();
        if ($link === NULL) {
            header('Location: ../login.php?error= Acesso ao BD');
        } else {
            $query = "SELECT id, login, nome, tipo FROM users WHERE login='$login' and password='$password' LIMIT 1";
            $result = mysqli_query($link, $query);

            if (mysqli_num_rows($result) < 1) {
                header('Location: ../login.php?error= Usuário e/ou senha inválidos');
            } else {
                while ($row = mysqli_fetch_row($result)) {
                    $usuario = array(
                        'id' => $row[0],
                        'login' => $row[1],
                        'nome' => $row[2],
                        'tipo' => (int)$row[3]
                    );
                }
                session_start();
                $_SESSION['user'] = $usuario;
                $username = $usuario['nome'];
                header("Location: ../bemvindo.php?username=$username");
            }
        }
    }
    function cadastrarUser($name, $username, $password,$typeUser){
        $query = "INSERT INTO users (nome, login, password, tipo)
            values ('$name', '$username', '$password', $typeUser );";
        $link = conecta();

        if ($link !== NULL) {
            $result = mysqli_query($link, $query);

            if ($result) {
                header("Location: ../users/lista.php");
            } else {
                header("Location: ../users/cadastra.php?erro=query");
            }
        } else {
            header("Location: ../login.php?erro=banco");
        }
    }

    function listarUsers(){
        $link = conecta();
        $query = "SELECT id, nome, login, tipo FROM users;";

        if ($link !== NULL) {
            $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) >= 0) {
                $users = [];
                while ($row = mysqli_fetch_row($result)) {
                    $user = array(
                        'id' => $row[0],
                        'nome' => $row[1],
                        'login' => $row[2],
                        'tipo' => (int) $row[3],
                    );
                    array_push($users, $user);
                }
                return $users;
            } else {
            }
        } else {
        }
    }

    function deletaElemento($tabela, $id){
        $link = conecta();
        $query = "DELETE FROM $tabela WHERE id=$id";

        if ($link !== NULL) {
            $result = mysqli_query($link, $query);
            if ($result) {
                header("Location: ../$tabela/lista.php");
            } else {
                header("Location: ../$tabela/lista.php?erro=deletar&id=$id");
            }
        } else {
            header("Location: ../$tabela/lista.php?erro=deletar&banco");
        }
    }

    function buscarUserId($id){
        $link = conecta();
        $query = "SELECT id, nome, login, tipo FROM users WHERE id = $id;"; // comando SQL que será executado

        if ($link !== NULL) {
            $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_row($result)) {
                    $user = array(
                        'id' => $row[0],
                        'nome' => $row[1],
                        'login' => $row[2],
                        'tipo' => (int)$row[3],
                    );
                }
                return $user;
            } else {
                header("Location: ../users/cadastra.php");
            }
        } else {
            header("Location: ../bemvindo.php?erro=banco&editar=$id");
        }
    }

    function editUser($id,$name,$login,$typeUser){
        $link = conecta();
        $query = "UPDATE users SET nome='$name', login='$login', tipo=$typeUser WHERE id=$id";

        if ($link !== NULL) {
            $result = mysqli_query($link, $query);
            if ($result) {
                header('Location: ../users/lista.php');
            } else {
                header("Location: ../users/edita.php?id=$id&erro");
            }
        }
    }

    function cadastraMarca($name){
        $link = conecta();
        $query = "INSERT INTO marcas (nome) values('$name')";
        if ($link !== NULL) {
            $result = mysqli_query($link, $query);
            var_dump($result);

            if ($result) {
                header("Location: ../marcas/lista.php");
            } else {
                header("Location: ../marcas/cadastra.php?erro=query");
            }
        } else {
            header("Location: ../acessorestrito.php?erro=banco");
        }
    }

    function listarMarcas(){
        $link = conecta();
        $query = "SELECT id, nome FROM marcas;";

        if ($link !== NULL) {
            $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) >= 0) {
                $marcas = [];
                while ($row = mysqli_fetch_row($result)) {
                    $marca = array(
                        'id' => $row[0],
                        'nome' => $row[1]
                    );
                    array_push($marcas, $marca);
                }
                return $marcas;
            } else {
            }
        } else {
        }
    }

    function editaMarca($id,$name){
        $link = conecta();
        $query = "UPDATE marcas SET nome='$name' WHERE id=$id";

        if ($link !== NULL) {
            $result = mysqli_query($link, $query);
            if ($result) {
                header('Location: ../marcas/lista.php');
            } else {
                header("Location: ../marcas/edita.php?id=$id&erro");
            }
        }
    }

    function buscarMarcaId($id){
        $link = conecta();
        $query = "SELECT id, nome FROM marcas WHERE id = $id;";

        if ($link !== NULL) {
            $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_row($result)) {
                    $marca = array(
                        'id' => $row[0],
                        'nome' => $row[1]
                    );
                }
                return $marca;
            } else {
                header("Location: ../marcas/cadastra.php");
            }
        } else {
            header("Location: ../acessorestrito.php?erro=banco&editar=$id");
        }
    }
