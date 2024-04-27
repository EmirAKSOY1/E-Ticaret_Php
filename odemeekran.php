<?php
session_set_cookie_params(['samesite' => 'None']);
session_start();
/*
5890040000000016
*/
include("db_operation.php");
if(isset($_SESSION['user_id'])){
	$user_uid = $_SESSION['user_id'];
	$kullanici_ad=getNameByUid($user_uid);
	$kullanici_soyad=getSurnameByUid($user_uid);
	$kullanici_gsm=getTelByUid($user_uid);
	$kullanici_mail=getMailByUid($user_uid);
	$kullanici_zaman=date("Y-m-d H:i:s"); 
	$kullanici_adresiyaz=getAdressByUid($user_uid);
	$kullanici_il="İstanbul";
	$siparis_no=getLastOrder()+1;
	$sepettoplam=$_SESSION["toplampara"];
	
	if (AddProvisinalOrder($user_uid , $_SESSION["toplampara"]) == TRUE) {
	
	echo "
			<!DOCTYPE html>
		<html>
		<head>
			<title>Ödeme</title>

			<link rel='shortcut icon' href='shop.png' type='image/x-icon' />

		</head>
		<body>


		<div class='tab-pane fade active in' id='desc'>
				<div class='row'>

	
	";
	include 'iyzico/buyer.php';
	echo "
					
	<div  id='iyzipay-checkout-form' class='responsive'></div>
	</div>
</div>
</body>
</html>
	
	";
}
}
else {
	echo "Beklenmedik bir hata oluştu";
}
?>


