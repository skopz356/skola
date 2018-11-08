<?php
require_once "conn.php";


session_destroy();
if(session_id() == '') {
    session_start();
}
if(isset($_SESSION["login"])){
    if($_SESSION["login"] == TRUE){
        if (isset($_POST["kategorie_id"])){
            $kategorie_id = $_POST["kategorie_id"];
            $titulek = $_POST["titulek"];
             $obsah = $_POST["obsah"];
            $sql = "INSERT INTO prispevky (titulek, obsah, kat_id) VALUES('$titulek','$obsah', (SELECT id FROM kategorie WHERE id=$kategorie_id))";
            if (mysqli_query($conn, $sql)) {
                echo "Succ";
            } else {
            echo "Error updating record: " . mysqli_error($conn);
            }
            }else{
                $kat_title = $_POST["kat_title"];
                $sql = "INSERT INTO kategorie(title) VALUES ('$kat_title')";
                if (mysqli_query($conn, $sql)) {
                    echo "Succ";
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }
            }
    }
}
else{
    echo "Nejsi prihlasen";
}
?>