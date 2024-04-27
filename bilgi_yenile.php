<?php 
include("db.php");
session_start();
$name=$_POST['name'];
$surname=$_POST['surname'];
$tel=$_POST['tel'];
$mail=$_POST['mail'];
$yeniadres=$_POST['adres'];
$kul=$_SESSION["user_id"];
echo $name;
$sql = "UPDATE user SET user_name='$name' , 
        user_surname = '$surname' ,
        user_mail = '$mail' ,
        user_tel = '$tel' ,
        user_adress='$yeniadres'  
        WHERE user_id='$kul'";
if ($baglan->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $baglan->error;
  }
  
  $baglan->close();
?>