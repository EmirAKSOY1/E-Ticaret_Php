<?php 
$host="localhost";
$vt_user="root";
$vt_password="";
$_database="e_ticaret";

$baglan= new mysqli($host,$vt_user,$vt_password);

if(! $baglan) die ("Mysql Baglantısında Hata Oluştu!");

mysqli_select_db($baglan,$_database) or die ("Veritabanına Bağlanırken Hata Oluştu!");


?>