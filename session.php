<?php
use Kreait\Firebase\Auth;
use Kreait\Firebase\Exception\Auth\InvalidPassword;
use Kreait\Firebase\Exception\Auth\UserNotFound;
include("vendor/db.php");
session_set_cookie_params(['samesite' => 'None']);
session_start();
include("db.php");
include("db_operation.php");

$mail = $_POST['mail'];

$parola = $_POST['pass'];
//$_SESSION['isim']=$_POST['mail'];
 

if($mail == "" || $parola == "") {

    echo "<script>location.href='login.php';</script>";

} else {
    try {
        $auth = $factory->createAuth();
        $user = $auth->signInWithEmailAndPassword($mail,$parola);
        if($user){
            $_SESSION["user_id"]=getUserIdByEmail($mail);
            $_SESSION['mail'] =$mail;
            $_SESSION['isim'] =getUserNameByEmail($mail);
            echo "<script>location.href='index.php';</script>";
        }else{
            echo "Giriş Başarısız!";
        }
        
        
    } catch (InvalidPassword $e) {
        echo "Hatalı";
    } catch (UserNotFound $e) {
        echo "Kullanıcı yok";
    } catch (\Exception $e) {
        echo "Kullanıcı yok";
    }



    // $sor = mysqli_query($baglan,"SELECT * FROM user where user_mail='$kuladi' and user_pass='$parola'");
    // $uyevarmi = mysqli_num_rows($sor); 
    // if($uyevarmi == 0) { 
    //     echo "Giriş Başarısız!";
    // }else { 
    // $uyebilgi = mysqli_fetch_assoc($sor); 


    // $_SESSION["user_id"]=$uyebilgi["user_id"];
    // $_SESSION['isim'] =$uyebilgi['user_name'];
    // echo "<script>location.href='index.php';</script>";



    // }
}
?>