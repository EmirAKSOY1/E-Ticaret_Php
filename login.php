<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="shop.ico" type="image/x-icon" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
	<link rel="shortcut icon" href="shop.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="../css/giris.css" rel="stylesheet">
</head>
<body>
<h2>Giriş Yapınız</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
	
	</div>
	<div class="form-container sign-in-container">
		<form action="session.php" method="post">
			<h1>Giriş Yap</h1>
		
			
			<input type="text" name="mail" placeholder="Email" />
			<input type="password" name="pass" placeholder="Şifre" />
			<a href="#">Şifremi Unuttum</a>
			<input type="submit" value="Giriş Yap" style="border: 1px solid #FF4B2B;
	background-color: #FF4B2B;
	color: #FFFFFF;"/>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Fırsatları Kaçırma</h1>
				<p>Hala Bir Hesabın Yoksa Hemen Üye Ol Ve Fırsatları Kaçırma</p>
				<br>
				<a href="uyeol.php"><button class="ghost" id="signUp">Üye Ol</button></a>
			</div>
		</div>
	</div>
</div>

<!--

<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.8.0/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.8.0/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyAQnI584xBf-uezum1HSijHuqhzeAVUmQE",
    authDomain: "akticaret-9f2a6.firebaseapp.com",
    projectId: "akticaret-9f2a6",
    storageBucket: "akticaret-9f2a6.appspot.com",
    messagingSenderId: "302893617500",
    appId: "1:302893617500:web:fc56d779ddd83fed2b7199",
    measurementId: "G-0CEFDEPLXL"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>
-->


</body>
</html>