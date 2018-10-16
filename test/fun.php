<?php 

function mysqli_result($res, $row, $field=0) {
    $res->data_seek($row);
    $datarow = $res->fetch_array();
    return $datarow[$field];
} 


function cat_array(){
    $conn = new mysqli("localhost", "skoladatabase", "79da46ta13ba" , "skoladatabase");
    $sql = "SELECT id, title FROM kategorie";
    $r = $conn->query($sql);
    $result = array();
    $x = 0;
    while($row =$r->fetch_assoc() ){
        $result[$x]["id"] = $row["id"];
        $result[$x]["title"] = $row["title"];
        $x++;
    }
    

    return $result;
}



?>
