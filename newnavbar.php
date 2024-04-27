

<section class="ftco-section">
		
		<div class="wrap">
			<div class="container">
				<div class="row justify-content-between">
						<div class="col">
							<p class="mb-0 phone"><span class="fa fa-phone"></span> <a href="#">444 10 10</a></p>
						</div>
						<div class="col d-flex justify-content-end">
							<div class="social-media">
				    		<p class="mb-0 d-flex">
				    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
				    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
				    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
				    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
				    		</p>
			        </div>
						</div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    	<a class="navbar-brand" href="index.php">3AK <span>Mağazaları</span></a>
	    	<form action="arama.php" class="searchform order-sm-start order-lg-last"  method="post">
          <div class="form-group d-flex">
            <input type="text" class="form-control pl-3" name="arama" placeholder="Arama Yap...">
            <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
          </div>
        </form>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav m-auto">
	        	<li class="nav-item "><a href="index.php" class="nav-link">Anasayfa</a></li>
	        	<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategoriler</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">

				<?php 
						include("db.php");
					 $kategoriler= "SELECT * FROM category ";
      				 $sonuc= $baglan->query($kategoriler);
					 #echo $row;
					 if ($sonuc->num_rows > 0) 
					 {
					   // verileri listeleyebiliriz
					   while($cek = $sonuc->fetch_assoc()) 
						{
						 echo "<a class='dropdown-item' href='kategoriler.php?kategori=". $cek['category_id'] ."'>". $cek['category_name']."</a>";
						}
					   }
				
				?>	


              </div>
            </li>
	        	<li class="nav-item"><a href="kampanyalar.php" class="nav-link">Kampanyalar</a></li>
				<li class="nav-item"><a href="#" class="nav-link">Destek</a></li>


				<?php 

if(isset($_SESSION['isim'])){
	echo "
	<li class='nav-item dropdown'>
  <a class='nav-link dropdown-toggle' href='#' id='dropdown04' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>".$_SESSION['isim']."</a>
  <div class='dropdown-menu' aria-labelledby='dropdown04'>
	  <a class='dropdown-item' href='siparislerim.php'>Siparişlerim</a>
	<a class='dropdown-item' href='sepetim.php'>Sepetim</a>
	<a class='dropdown-item' href='bilgilerim.php'>Bilgilerim</a>
	<a class='dropdown-item' href='logout.php'>Çıkış Yap</a>
  </div>
</li>


	";
   // echo "<li class='nav-item'><a href='logout.php' class='nav-link'>".$_SESSION['isim']." , Çıkış Yap</a></li>";
}
else{
	echo "<li class='nav-item'><a href='login.php' class='nav-link'>Giriş Yap</a></li>";
}

?>
	        	
	         
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

	</section>
    <script>
        (function($) {

"use strict";

$('nav .dropdown').hover(function(){
    var $this = $(this);
    $this.addClass('show');
    $this.find('> a').attr('aria-expanded', true);
    $this.find('.dropdown-menu').addClass('show');
}, function(){
    var $this = $(this);
        $this.removeClass('show');
        $this.find('> a').attr('aria-expanded', false);
        $this.find('.dropdown-menu').removeClass('show');
});

})(jQuery);

    </script>
	
