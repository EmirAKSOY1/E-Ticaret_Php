<?php
session_start();
unset($_SESSION["isim"]);
session_destroy();
header("Location:index.php");
?>