<?php 
include("db.php");
$yeniadres=$_POST['yeniadres'];
$kul=$_POST['kul'];

$sql = "UPDATE user SET user_adress='$yeniadres'  WHERE user_id='$kul'";
if ($baglan->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $baglan->error;
  }
  
  $baglan->close();
?>