
<?php
require_once "conn.php";
if(isset($_POST["option"])){
        $option = $_POST["option"];
        $sql = $sql = "SELECT titulek, obsah FROM prispevky WHERE kat_id=(SELECT id FROM kategorie WHERE id=$option)";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            echo '<article class="col-lg-4 clanek">';
            // echo "<div><span class='bold'> Kategorie:</span>"." ".$row["kategorie"]."</div>";
            echo "<h1>".$row["titulek"]."</h1>";
            echo "<div>".$row["obsah"]."</div>";
            echo '</article>';
        }
    }
    ?>