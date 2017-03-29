<?php

session_start();

$userid=$_POST["userid"];
$password=$_POST["password"];

$ser = "127.0.0.1";
$user = "root";
$pass = "Nstatehs_1";
$db_name = "npsc2016";
$conn = mysqli_connect($ser, $user, $pass, $db_name);
if($conn){
    $q1 = "SELECT * FROM admins WHERE userid='$userid' AND psswd='$password'";
    $result=mysqli_query($conn,$q1);
    $rows=mysqli_num_rows($result);
    if($rows==1){
      $row=mysqli_fetch_assoc($result);
      $_SESSION["user"] = $row["userid"];
      header('Location: desk.php');
    }
    else{
      echo $rows;
    }
}
else{
  echo 'Connection not available';
}
?>
