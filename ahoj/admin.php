<?php
session_start();
?>
<html lang="en">
<?php
include("obsah.php");
echo $head;
?>
<body>
<form method="post" id="form">
            <input type="name" name="username">
            <input type="password" name="password">
            <input type="submit" name="submit" value="Odeslat">
        </form>
        <div class="notification">Spatne heslo</div>
        <script>
        $('#form').submit(function(event){
            event.preventDefault();
            data = $(this).serialize();
            var request = $.ajax({
            url: "login.php",
            type: "POST",
            data: data
        });
        request.done(function(response){
            if(response == "Succ"){
                location.reload();
            }else{
                $('.notification').toggle();               
            }
            
        });

        });
        </script>
        <?php
        require_once "conn.php";
        require_once "fun.php";
        $cisla = ["Prvni", "Druhy", "Treti", "Ctvrty", "Paty", "Sesty"];
        if(isset($_SESSION["login"])){
            if($_SESSION["login"] == TRUE){
                $sql = "SELECT id, titulek, obsah, kat_id  FROM prispevky";
                $result = $conn->query($sql);
                $sql_cat = "SELECT id, title, kategorie FROM kategorie";
                $result_cat = $conn->query($sql_cat); 
                $result_array = cat_array();
                if ($result->num_rows > 0) {
                    echo "<div class='container'>";
                    echo "<div class='row'>";
                    $i = 0;
                    while($row = $result->fetch_assoc()) {
                        echo "<article class='col-lg-4 form-update'>";
                        echo "<h3>".$cisla[$i]."</h3>";
                        echo "<form class='update-form' method='post'>";
                        echo "<label for='kategorie'>Kategorie</label>";
                        echo "<select name='kat_id'>";
                        for($d = 0; $d < count($result_array); $d++){
                            echo '<option value="'.$result_array[$d]["id"].'"'.(($result_array[$d]["id"] == $row["kat_id"] )?'selected="selected"':"").'>'.$result_array[$d]["title"]."</option>";                            
                        }
                        echo "</select>";
                        echo "<label for='nadpis'>Nadpis</label>";
                        echo "<textarea name='nadpis'>".$row["titulek"]."</textarea><br>";
                        echo "<textarea name='text'>".$row["obsah"]."</textarea><br>";
                        echo "<input type='hidden' name='id' value='".$row["id"]."'"." >";
                        echo "<input type='submit' value='Upravit'>";
                        echo "</form>";
                        echo "<form class='delete-form' method='post'>";
                        echo "<input type='hidden' name='id' value='".$row["id"]."'>";
                        echo "<input type='submit' value='Odstranit'>";
                        echo "</form>";
                        echo "</article>";
                        $i++;
                    }
                    echo "</div>";
                    echo "</div>";
                }
                

            }?>
            <a href="./" class="btn btn-dark a-home">Domu</a>
            <button class='pridat'>Pridat Clanek</button>
            <form class='add-form' id="add-form">
                <label for="kategorie">Kategorie</label>
                <select name="kategorie_id">
                <?php 
                for($d = 0; $d < count($result_array); $d++){
                    echo '<option value="'.$result_array[$d]["id"].'">'.$result_array[$d]["title"].'</option>';
                }
                ?>
                </select><br>
                <label for="titulek">Nadpis</label>
                <input name="titulek"><br>
                <textarea name="obsah"></textarea>
                <input type="submit" value="Přidat">
            </form>

            <button class='pridat'>Pridat Clanek</button>
            <form class='add-form' id="add-form-cat">
                <input type="text" name="kat_title" placeholder="Jmeno">
                <input type="submit" value="Přidat">
            </form>
            

            <script>
                $('form').submit(function(event){
                    console.log($(this).attr("class") + ".php");
                    event.preventDefault();
                    data = $(this).serialize();
                    var request = $.ajax({
                    url: $(this).attr("class") + ".php",
                    type: "POST",
                    data: data
                    });
                    request.done(function(response){
                        if(response == "Succ"){
                            location.reload();
                        }
                        else{
                            alert(response);
                        }
                    });

                    
                });
                $('#form').toggle();
                $('.pridat').click(function(){
                        $('#add-form').toggle();
                });
                $('.pridat-cat').click(function(){
                        $('#add-form-cat').toggle();
                });
                $('.add-category').click(function(event){
                    event.preventDefault();

                });
            </script>
            




            <?php
        }


?>


</body>
</html>