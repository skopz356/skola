
<?php
include "obsah.php";
echo $head;
?>
<body>
<section>
<?php
echo $menu;

$conn = new mysqli("localhost", "root", "", "projekt");
$sql = "SELECT kategorie, nadpis, text FROM prispevky";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div>".$row["kategorie"]."</div>";
        echo "<h1>".$row["nadpis"]."</h1>";
        echo "<div>".$row["text"]."</div>";
    }
}
?>
</section>
</body>