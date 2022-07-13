<?php
    function verificaSession(){
        session_start();
        if($_SESSION && $_SESSION['user']){
            return 1;
        }else {
            return 0;
        }
    }

?>
