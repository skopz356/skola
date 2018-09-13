<?php 
$conn = new mysqli("localhost", "root", "", "projekt");

if (isset($_POST["kategorie"])){
    $kategorie = $_POST["kategorie"];
    $nadpis = $_POST["nadpis"];
    $text = $_POST["text"];
    $id = $_POST["id"];
    $sql = "UPDATE prispevky SET kategorie='$kategorie', nadpis='$nadpis', text='$text' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Succ";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    

}

?>