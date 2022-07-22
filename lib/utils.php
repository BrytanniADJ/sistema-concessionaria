<?php
    function verificaSession(){
        session_start();
        if($_SESSION && $_SESSION['user']){
            return 1;
        }else {
            return 0;
        }
    }
    function exibeMenuSubpasta($dot) {
        echo '<ul id="menu_main">';
        echo '<li> <a href=".'.$dot.'/">Home</a></li>';
        echo '<li id="bt_menu_users" ><button onclick="addMenu(`users`)">Usuários</button></li>';
        exibeSubMenu('users', 'Usuário',$dot);
        echo '<li id="bt_menu_marcas" ><button onclick="addMenu(`marcas`)">Marcas</button></li>';
        exibeSubMenu('marcas', 'Marca',$dot);
        echo '</ul>';
    }

    function exibeSubMenu($submenu, $nome, $dot){
        echo '<ul id="menu_'.$submenu.'" style="display: none;">';
        echo '<li> <a href=".'.$dot.'/'.$submenu.'/cadastra.php">Cadastra '.$nome.'</a></li>';
        echo '<li> <a href=".'.$dot.'/'.$submenu.'/lista.php">Lista '.$nome.'s</a></li>';
        echo '</ul>';
    }
?>
