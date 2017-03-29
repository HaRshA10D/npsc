<?php
$reg_name=$_POST["reg_name"];
$reg_institution=$_POST["reg_institution"];
$reg_phoneno=$_POST["reg_phoneno"];
$regid=$_POST["regid"];
$paperid=$_POST["paperid"];
$kit_issue= FALSE;
if($_POST["kit_issue"]=='issue'){
$kit_issue=TRUE;
}
$ser = "127.0.0.1";
$user = "root";
$pass = "Nstatehs_1";
$db_name = "npsc2016";
$conn = mysqli_connect($ser, $user, $pass, $db_name);
if($conn){
    $q1 = "UPDATE personal_details SET reg_name='$reg_name',reg_institution='$reg_institution',reg_phoneno='$reg_phoneno' WHERE registration_id='$regid'";
    $q2 = "UPDATE paper_details SET kit_issued='$kit_issue' WHERE registration_id='$regid'";
    mysqli_query($conn,$q1);
    mysqli_query($conn,$q2);
    header('Location: desk.php?paperid='.$paperid);
}
else{
  echo 'Connection not available';
}
?>
