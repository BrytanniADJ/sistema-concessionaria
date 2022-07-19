<?php
    function verificaSession(){
        session_start();
        if($_SESSION && $_SESSION['user']){
            return 1;
        }else {
            return 0;
        }
    }
    function exibeMenuSubpasta() {
        echo '<ul id="menu_main">';
        echo '<li> <a href="../">Home</a></li>';
        echo '<li id="bt_menu_users" ><button onclick="addMenu(`users`)">Usuários</button></li>';
        exibeSubMenu('users', 'Usuário');
        echo '<li id="bt_menu_marcas" ><button onclick="addMenu(`marcas`)">Marcas</button></li>';
        exibeSubMenu('marcas', 'Marca');
        echo '</ul>';
    }

    function exibeSubMenu($submenu, $nome){
        echo '<ul id="menu_'.$submenu.'" style="display: none;">';
        echo '<li> <a href="../'.$submenu.'/cadastra.php">Cadastra '.$nome.'</a></li>';
        echo '<li> <a href="../'.$submenu.'/lista.php">Lista '.$nome.'s</a></li>';
        echo '</ul>';
    }
?>
