<?php 
include("db.php");
session_start();
$value=$_POST['value'];
$basket_id=$_POST['basket_id'];
$kul=$_SESSION["user_id"];
echo $name;
$sql = "UPDATE basket SET piece='$value' WHERE basket_id='$basket_id'";
if ($baglan->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $baglan->error;
  }
  
  $baglan->close();
?>