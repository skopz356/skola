<?php
require_once "conn.php";
if(session_id() == '') {
    session_start();
}
if(isset($_SESSION["login"])){
    if($_SESSION["login"] == TRUE){
        if (isset($_POST["id"])){
            $id = $_POST["id"];
            $sql = "DELETE FROM prispevky WHERE id='$id'";
            if (mysqli_query($conn, $sql)) {
            echo "Succ";
            } else {
            echo "Error updating record: " . mysqli_error($conn);
            }
        }
    }
}
?>