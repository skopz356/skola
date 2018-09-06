<?php
session_start();

if (isset($_POST["username"])){
    if(($_POST["username"] == "admin") && ($_POST["password"] == "heslo")){
        echo "Succ";
       
    }
}
?>