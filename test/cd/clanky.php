
<?php
require_once "conn.php";
require_once "fun.php";
include "obsah.php";
echo $head;
?>
<body>
<section>
<?php
echo $header;
echo $menu;
echo "<section class='main'>";
require_once "conn.php";
require_once "fun.php";
$sql = "SELECT titulek, obsah FROM prispevky";
$result = $conn->query($sql);
$result_array = cat_array();
if ($result->num_rows > 0) {
    echo "<div class='container'>";
    echo "<h2>Vyberte kategorie</h2>";
    echo '<select id="kat_select">';
    for($i = 0; $i < count($result_array); $i++){

    echo '<option value="'.$result_array[$i]["id"].'">'.$result_array[$i]["title"].'</option>';
    }

    echo "</select>";
    echo '<div class="row articles">';
        while($row = $result->fetch_assoc()) {
            echo '<article class="col-lg-4 clanek">';
            // echo "<div><span class='bold'> Kategorie:</span>"." ".$row["kategorie"]."</div>";
            echo "<h1>".$row["titulek"]."</h1>";
            echo "<div>".$row["obsah"]."</div>";
            echo '</article>';
        }
    echo "</div>";
    
    echo '</div>';
    
    echo '</section>';
}
?>
</section>
<script>
$('#kat_select').change(function(){
    var ajaxRequest;
    console.log("asdas");
    ajaxRequest = $.ajax({
        url: "sel_article.php",
        type: "post",
        data: "option=" + $(this).find(":selected").val(),
        success: function(response){
            jQuery(".articles").html(response);
        }
    })
   
});

</script>
</body>
