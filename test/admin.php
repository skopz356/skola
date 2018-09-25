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
        $conn = new mysqli("localhost", "root", "", "projekt");
        if(isset($_SESSION["login"])){
            if($_SESSION["login"] == TRUE){
                $sql = "SELECT id,kategorie, nadpis, text  FROM prispevky";
                $result = $conn->query($sql);         
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<form id='update-form' method='post'>";
                        echo "<textarea name='kategorie'>".$row["kategorie"]."</textarea>";
                        echo "<textarea name='nadpis'>".$row["nadpis"]."</textarea>";
                        echo "<textarea name='text'>".$row["text"]."</textarea>";
                        echo "<input type='hidden' name='id' value='".$row["id"]."'"." >";
                        echo "<input type='submit'>";
                        echo "</form>";
                    }
                }
                

            }?>
            <button class='pridat'>Pridat Clanek</button>
            <form id='add-form'>
                <textarea name="kategorie"></textarea>
                <textarea name="nadpis"></textarea>
                <textarea name="text"></textarea>
                <input type="submit" value="Odeslat">
            </form>

            <script>
                $('#update-form').submit(function(event){
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
                            alert("Response")
                        }
                    });
                });
            </script>




            <?php
        }


?>


</body>
</html>