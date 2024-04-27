




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="shortcut icon" href="shop.png" type="image/x-icon" />
	<title>Üye ol</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/opensans-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/line-awesome/css/line-awesome.min.css">
	<!-- Jquery -->
	<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/register.css"/>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body >
<?php
    use Kreait\Firebase\Auth;
    use Kreait\Firebase\Exception\Auth\InvalidPassword;
    use Kreait\Firebase\Exception\Auth\UserNotFound;

    include("vendor/db.php");
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];
    $adres = $_POST['adres'];
    $password = $_POST['comfirm_password'];
    include("db.php");
    $varmi=mysqli_query($baglan, "SELECT * FROM user WHERE  user_mail='$mail'" );
    $row = mysqli_num_rows($varmi);
    if( $row!=0){
        echo"<script>
        Swal.fire({
            icon: 'error',
            title: 'Başarısız!',
            confirmButtonText: 'Giriş Yap ',
            text: 'Böyle bir kullanıcı zaten var!',
        }).then((result) => {
            if (result.isConfirmed){
                location.href='login.php';
            }
          })</script>";
    }
    else{
        echo"<script>
        Swal.fire({
            icon: 'success',
            title: 'Başarılı',
            confirmButtonText: 'Giriş Yap',
            text: 'Kaydınız Başarıyla Oluşturuldu',
        }).then((result) => {
            if (result.isConfirmed){
                location.href='login.php';
            }
          })</script>";
          try{
              $auth = $factory->createAuth();
              $user = $auth->createUserWithEmailAndPassword($mail, $password); 
            }
            catch (Exception $e) { 
                echo"<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Başarısız!',
                    confirmButtonText: 'Giriş Yap ',
                    text: 'Kayıt oluşturulurken  bir problem yaşandı!',
                }).then((result) => {
                    if (result.isConfirmed){
                        location.href='login.php';
                    }
                  })</script>";
                
            
            } 
          $sonuc=mysqli_query($baglan, "INSERT INTO user(user_id,user_name,user_surname,user_mail,user_tel,user_adress) VALUES ('$user->uid','$name', '$surname', '$mail','$phone','$adres')" );
        
    }


?>
    
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

	
</body>
</html>

