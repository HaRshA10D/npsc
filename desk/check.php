<?php
$title = $_GET["title"];
$ser = "127.0.0.1";
$user = "root";
$pass = "Nstatehs_1";
$db_name = "npsc2016";
$conn = mysqli_connect($ser, $user, $pass, $db_name);
if($conn){
    
    $q = 'select * from paper_data';
    $result = mysqli_query($conn,$q);
    while($row = mysqli_fetch_assoc($result)) {
        if($row["paper_id"] == (int)$title){
            echo $row["paper_title"];
        }
    }
}
?>

