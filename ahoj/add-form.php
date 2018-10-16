<?php
require_once "conn.php";
if (isset($_POST["kategorie_id"])){
    $kategorie_id = $_POST["kategorie_id"];
    $titulek = $_POST["titulek"];
    $obsah = $_POST["obsah"];
    
    $sql = "INSERT INTO prispevky (titulek, obsah, kat_id) VALUES('$titulek','$obsah', (SELECT id FROM kategorie WHERE id=$kategorie_id))";
    if (mysqli_query($conn, $sql)) {
        echo $sql;
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
?>