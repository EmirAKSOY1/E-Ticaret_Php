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
<body class="form-v7">
	<div class="page-content">
		<div class="form-v7-content">
			<div class="form-left">
				<img src="images/register.jpg" alt="form">
				<p class="text-1">Üye Ol</p>
				
			</div>
			<form class="form-detail" action="yeniuye.php" method="post" id="myform">
				<div class="form-row">
					<div class="form-group">
						<label for="name">İsim</label>
						<input type="text" name="name" id="name" class="input-text">
					</div>
				
					<div class="form-group">
						<label for="surname">Soyisim</label>
						<input type="text" name="surname" id="surname" class="input-text" >
					</div>
				</div>
                <div class="form-row">
					<label for="phone">Telefon</label>
					<input type="tel" name="phone" id="phone" class="input-text" >
				</div>

				<div class="form-row">
					<label for="mail">E-Mail</label>
					<input type="email" name="mail" id="mail" class="input-text" >
				</div>

				<div class="form-row">
					<label for="adres">Adres</label>
					<input type="text" name="adres" id="adres" class="input-text" >
				</div>

				<div class="form-row">
					<label for="password">Şifre</label>
					<input type="password" name="password" id="password" class="input-text" required>
				</div>
				<div class="form-row">
					<label for="comfirm_password">Şifreyi Doğrula</label>
					<input type="password" name="comfirm_password" id="comfirm_password" class="input-text" required>
				</div>
				<div class="form-row-last">
					<input type="submit" name="register" class="register" value="Kaydı Tamamla">
					<p>veya<a href="login.php">Giriş yap</a></p>
				</div>
                <br>

			</form>
		</div>
	</div>
    
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script>
        
		// just for the demos, avoids form submit
		jQuery.validator.setDefaults({
		  	debug: true,
		  	success:  function(label){
                
        		label.attr('id', 'valid');
   		 	},
         
		});
		$( "#myform" ).validate({
            
		  	rules: {
			    your_email: {
			      	required: true,
			      	email: true
			    },
				tel: {
			      	required: true,
			      	number: true
			    },
                adres: {
			      	required: true
			      	
			    },
                username: {
			      	required: true
			      	
			    },
			    password: "required",
		    	comfirm_password: {
		      		equalTo: "#password"
		    	}
		  	},
		  	messages: {
		  		username: {
		  			required: "kullanıcı ismi girilmedi"
		  		},
		  		your_email: {
		  			required: "e-posta girilmedi"
		  		},
		  		password: {
	  				required: "şifre girilmedi"
		  		},
		  		comfirm_password: {
		  			required: "şifre doğrulanmadı",
		      		equalTo: "şifreler uyuşmuyor"
		    	},
                adres: {
		  			required: "adres girilmedi",
		      		
		    	}
		  	},
              submitHandler: function(form) {
				form.submit();

}
      			
    
		});

	</script>
</body>
</html>

