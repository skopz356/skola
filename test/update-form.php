<?php 
require_once "conn.php";

if (isset($_POST["kat_id"])){
    $kategorie_id = $_POST["kat_id"];
    $titulek = $_POST["nadpis"];
    $obsah = $_POST["text"];
    $id = $_POST["id"];
    $sql = "UPDATE prispevky SET kat_id=(SELECT id FROM kategorie WHERE id=$kategorie_id), titulek='$titulek', obsah='$obsah' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Succ";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    

}

?>