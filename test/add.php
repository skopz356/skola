if (isset($_POST["kategorie"])){
    $kategorie = $_POST["kategorie"];
    $nadpis = $_POST["nadpis"];
    $text = $_POST["text"];
    
    $sql = "INSERT INTO prispevky (kategorie, nadpis, text) VALUES('$kategorie','$nadpis','$text')";
    if (mysqli_query($conn, $sql)) {
        echo "Succ";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    

}

?>