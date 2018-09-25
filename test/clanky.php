
<?php
include "obsah.php";
echo $head;
?>
<body>
<section>
<?php
echo $header;
echo $menu;
echo "<section class='main'>";
$conn = new mysqli("localhost", "root", "", "projekt");
$sql = "SELECT kategorie, nadpis, text FROM prispevky";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    echo "<div class='container'>";
    echo "<div class='row'>";
    while($row = $result->fetch_assoc()) {
        echo '<article class="col-lg-4 clanek">';
        echo "<div><span class='bold'> Kategorie:</span>"." ".$row["kategorie"]."</div>";
        echo "<h1>".$row["nadpis"]."</h1>";
        echo "<div>".$row["text"]."</div>";
        echo '</article>';
    }
    echo '</div>';
    echo '</div>';
    echo '</section>';
}
?>
</section>
</body>