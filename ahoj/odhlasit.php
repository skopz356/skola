<?php 
session_start();
if(isset($_SESSION["login"])){
    unset($_SESSION["login"]);
    ?><script>
        window.history.back();
    </script>
    
    <?php
}
else{
    echo "Nejste přihlášen";
}

?>