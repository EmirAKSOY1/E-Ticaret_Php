<?php 
//error_reporting(0);
session_set_cookie_params(['samesite' => 'None']);
session_start();

include("db.php"); 
include("db_operation.php");

ob_start();
require_once('iyzico/config.php');
$siparis_no=$_GET['id'];

if(true){
echo "
<!DOCTYPE html>
<html>
<head>
	<title>Ödeme Durumu</title>
	<link rel='shortcut icon' href='shop.png' type='image/x-icon' />
</head>
<body>
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
";
$token=$_POST['token'];
//Test Kartı 5890040000000016
$request = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("$siparis_no");
$request->setConversationId("$siparis_no");
$request->setToken("$token");

$checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($request, Config::options());
$odeme_durum=$checkoutForm->getPaymentStatus();

//gonderılen orderid
$orderid=$checkoutForm->getbasketId();
if ($odeme_durum=="FAILURE") {
	echo"<script>
	Swal.fire(
		'Opppss',
		'Ödeme başarısız',
		'error'
	  )
		  </script>";
} elseif ($odeme_durum=="SUCCESS") {
	$total_basket=getOrderByOrder_id($siparis_no);
	$user_id=getUserByOrder_id($siparis_no);
	$sql = "INSERT INTO siparisler(user_id , tutar , durum ) VALUES ('$user_id','$total_basket','1')";
	  
	  if ($baglan->query($sql) === TRUE) {
		$sepet_temizle="DELETE FROM basket WHERE user_id = '$user_id'";
		ProvisinalOrderDelete($user_id);

		if ($baglan->query($sepet_temizle) === TRUE) {
			
			echo"<script>
			Swal.fire({
				icon: 'success',
				title: 'Başarılı',
				confirmButtonText: 'Alışverişe Devam Et',
				text: 'Sipariş Başarıyla Oluşturuldu',
				}).then((result) => {
					if (result.isConfirmed){
						location.href='index.php';
					}
				})
			</script>";
		  
	  } 
	}
	  else {
		echo"<script>
		Swal.fire(
			'Opppss',
			'Siparişiniz Alınamadı',
			'error'
		  )
			  </script>";
	  }

	
}
echo "
<!--
Durumlar

1-Sipariş Alındı
2-Sipariş Hazırlanıyor
3-Kargoya verildi
4-Teslim Edildi
5-İptal edildi
-->
<script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js' integrity='sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3' crossorigin='anonymous'></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js' integrity='sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz' crossorigin='anonymous'></script>
  
</body>
</html>
";
}
else{
	header("Location:404.html");
}
?>




