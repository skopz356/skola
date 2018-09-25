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
        $cisla = ["Prvni", "Druhy", "Treti", "Ctvrty"];
        $conn = new mysqli("localhost", "root", "", "projekt");
        if(isset($_SESSION["login"])){
            if($_SESSION["login"] == TRUE){
                $sql = "SELECT id,kategorie, nadpis, text  FROM prispevky";
                $result = $conn->query($sql);         
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<h3>".$cisla[$row["id"]-1]." článek<h3>";
                        echo "<form class='update-form' method='post'>";
                        echo "<label for='kategorie'>Kategorie</label>";
                        echo "<textarea name='kategorie'>".$row["kategorie"]."</textarea><br>";
                        echo "<label for='nadpis'>Nadpis</label>";
                        echo "<textarea name='nadpis'>".$row["nadpis"]."</textarea><br>";
                        echo "<textarea name='text'>".$row["text"]."</textarea><br>";
                        echo "<input type='hidden' name='id' value='".$row["id"]."'"." >";
                        echo "<input type='submit' value='Upravit'>";
                        echo "</form>";
                        echo "<form class='delete-form' method='post'>";
                        echo "<input type='hidden' name='id' value='".$row["id"]."'>";
                        echo "<input type='submit' value='Odstranit'>";
                        echo "</form>";
                    }
                }
                

            }?>
            
            <button class='pridat'>Pridat Clanek</button>
            <form id='add-form'>
                <label for="kategorie">Kategorie</label>
                <input name="kategorie"><br>
                <label for="nadpis">Nadpis</label>
                <input name="nadpis"><br>
                <textarea name="text"></textarea>
                <input type="submit" value="Přidat">
            </form>

            <script>
                $('#form').toggle();
                $('.update-form').submit(function(event){
                    event.preventDefault();
                    data = $(this).serialize();
                    var request = $.ajax({
                    url: "update.php",
                    type: "POST",
                    data: data
                });
                    request.done(function(response){
                        if(response == "Succ"){
                            location.reload();
                        }
                        else{
                            alert("Response")
                        }
                    });
                });
                $('.pridat').click(function(){
                        $('#add-form').toggle();

                });
                $('#add-form').submit(function(event){
                    event.preventDefault();
                    data = $(this).serialize();
                    var request = $.ajax({
                    url: "add.php",
                    type: "POST",
                    data: data
                });
                    request.done(function(response){
                        if(response == "Succ"){
                            location.reload();
                        }
                        else{
                            alert(response)
                        }
                    });
                });
                $('.delete-form').submit(function(event){
                    event.preventDefault();
                    data = $(this).serialize();
                    var request = $.ajax({
                    url: "delete.php",
                    type: "POST",
                    data: data
                });
                    request.done(function(response){
                        if(response == "Succ"){
                            location.reload();
                        }
                        else{
                            alert(response)
                        }
                    });
                });
            </script>




            <?php
        }


?>


</body>
</html>