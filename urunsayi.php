<?php 
include ("db.php");

$sonuc=mysqli_query($baglan, "SELECT * FROM product" );
$row = mysqli_num_rows($sonuc);
echo $row;

?>