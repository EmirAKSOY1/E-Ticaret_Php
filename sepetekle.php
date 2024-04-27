<?php 
session_start();
$urun=$_POST["id"];
$user=$_SESSION["user_id"];
include("db.php");
$sql = "INSERT INTO basket(product_id , user_id , piece  ) VALUES ('$urun','$user','1')";
if ($baglan->query($sql) === TRUE) {
    echo "Record updated successfully";
} 
else {
    echo "Error updating record: " . $baglan->error;
}
?>