
<?php
include "obsah.php";
echo $head;
?>
<body>
    


<?php
echo $header;
echo $menu;

?>


<section class="main">
<h1>Vítejte na Cd půjčovně</h1>

<h2>Seznam cédéček</h2>
<?php
require "conn.php";
$sql = "SELECT * FROM interpreti";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    
}

?>
</section>
</body>