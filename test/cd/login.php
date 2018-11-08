<?php
session_start();
if (isset($_POST["username"])){
    if(!isset($_SESSION["count"])){
        $_SESSION["count"] = 0;
    }
    if( $_SESSION["count"] < 5){
        $_SESSION['count'] = 1 + $_SESSION['count'];
        if(($_POST["username"] == "admin") && ($_POST["password"] == "heslo")){
            $_SESSION["login"] = TRUE;
            echo "Succ";
        }else{
            echo "Bad";
        }
    }
    else{
        echo "Počkej 15 minut bráško";
    }
}
?>