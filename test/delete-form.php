<?php
require_once "conn.php";
if (isset($_POST["id"])){
    $id = $_POST["id"];
    $sql = "DELETE FROM prispevky WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        echo "Succ";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>