<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anasayfa</title>
    <link rel="shortcut icon" href="shop.png" type="image/x-icon" />
    <!--Navbar-->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Footer -->
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/newnavbar.css">
    <link rel="stylesheet" href="css/index.css">
    <style>
  .campaign-badge {
    position: absolute;
    top: 10px; /* Resmin üst kısmından uzaklık */
    left: 10px; /* Resmin sol kısmından uzaklık */
    /* Resim boyutu ve diğer stillendirmeleri */
    width: 50px; /* Örnek olarak */
    height: auto; /* Örnek olarak */
}
    </style>
    </head>
<?php 
  session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Post ile gelen veriyi al
    $user_id = $_POST['user_id'];
    $_SESSION["user_id"]=$user_id;
		$_SESSION['mail'] =getMailByUid($user_id);
		$_SESSION['isim'] =getNameByUid($user_id);

    }
  include("newnavbar.php");
  include("carousel.html");
  $istenen_sayfa=isset($_GET['sayfa'])&& intval($_GET['sayfa']) > 0 ? $_GET['sayfa'] : 1;
  $listelenecek  = 8;
  $limit=$istenen_sayfa*$listelenecek-$listelenecek;

  ?>
<body>
<div class="row row-cols-1 row-cols-md-4 g-3" style="margin-left:2%">
<?php 
  include("db.php");
  include("db_operation.php");
  $sec= "SELECT product_id , product_name , product_detail , product_price , product_image ,discount FROM product  ORDER BY product_id  LIMIT $limit,$listelenecek";
  $adet=mysqli_query($baglan, "SELECT * FROM product" );
  $urun_adeti = mysqli_num_rows($adet);
  $sonuc= $baglan->query($sec);
  if ($sonuc->num_rows > 0) {
      while($cek = $sonuc->fetch_assoc()) 
         {
          if($cek['discount']>0){
            $indirimli = $cek['product_price']- ($cek['product_price']*$cek['discount']/100);
            $urun=
            "<a href='product_detail.php?product_id=".$cek['product_id']."' class='product-detail'>
            <div class='col'>
            <div class='card'>
            
              <img src='".$cek['product_image']."' class='card-img-top' >
              <img src='https://cdn.dsmcdn.com/mnresize/250/250/indexing-sticker-stamp/moon/6b090e50-3660-459b-8dd6-8509f979066f.png' class='campaign-badge' style='width: 25%;'>
              <div class='card-body'>
                <h5 class='card-title'>".$cek['product_name']."</h5>
                <p class='card-text'>".$cek['product_detail']."</p>
                <div class='container'>
                <div class='row'>
                  <div class='col'>
                    <span class='card-price' ><strike>".number_format($cek['product_price'], 2, ',', '.')."</strike></span>
                  </div>
                  <div class='col'>
                    <h4 class='card-price ' >".$indirimli."TL</h4></div>
                  </div>
                  </div>
              </div>
              </div>
          </div>
          </a>";
          }else{
            $urun=
            "<a href='product_detail.php?product_id=".$cek['product_id']."' class='product-detail'>
            <div class='col'>
            <div class='card'>
              <img src='".$cek['product_image']."' class='card-img-top' >
              <div class='card-body'>
                <h5 class='card-title'>".$cek['product_name']."</h5>
                <p class='card-text'>".$cek['product_detail']."</p>
                <h3 class='card-price' >".number_format($cek['product_price'], 2, ',', '.')." TL</h3>
              </div>
              </div>
          </div>
          </a>";
          }

          echo $urun;
         }
        }
       ?>
</div>
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="?sayfa=1 " aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
        <?php 
        $sayfalama = ceil(getProductCount()/$listelenecek) ;
        if($istenen_sayfa==1 ){
          if($sayfalama==1){
            echo "<li class='page-item'><a class='page-link' id='aktif' href='?sayfa=1'>1</a></li>";
          }
          if($sayfalama==2){
            echo "<li class='page-item'><a class='page-link' id='aktif' href='?sayfa=1'>1</a></li>";
            echo "<li class='page-item'><a class='page-link'  href='?sayfa=2'>2</a></li>";
          }
          if($sayfalama>=3){
            echo "<li class='page-item'><a class='page-link' id='aktif' href='?sayfa=1'>1</a></li>";
            echo "<li class='page-item'><a class='page-link' href='?sayfa=2'>2</a></li>";
            echo "<li class='page-item'><a class='page-link' href='?sayfa=3'>3</a></li>";
          }
     }
        else{
          if($istenen_sayfa < $sayfalama){
            for($i=-1 ;$i<=1;$i++){
              if($i==0){
                echo "<li class='page-item'><a class='page-link' id='aktif' href='?sayfa=".$istenen_sayfa+$i ."'>". $istenen_sayfa+$i . "</a></li>";
              }
              else{
                echo "<li class='page-item'><a class='page-link'  href='?sayfa=".$istenen_sayfa+$i ."'>". $istenen_sayfa+$i . "</a></li>";
              }
           }
            }
            else{
              echo "<li class='page-item'><a class='page-link' href='?sayfa=". $sayfalama - 2 ."'>". $sayfalama - 2 ."</</a></li>";
              echo "<li class='page-item'><a class='page-link' href='?sayfa=". $sayfalama - 1 ."'>". $sayfalama - 1 ."</a></li>";
              echo "<li class='page-item'><a class='page-link' href='?sayfa=3' id='aktif'>".$sayfalama."</a></li>";
            }
       }
       ?>
<li class="page-item">
      <a class="page-link" href="?sayfa=<?php echo $sayfalama ; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
<span id='urun_adet'>
<?php echo getProductCount()?> Adet ürün bulundu
</span>
<?php include("footer.php");?>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/main.js"></script>  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <!-- Start of ChatBot (www.chatbot.com) code -->
<script type="text/javascript">
    window.__be = window.__be || {};
    window.__be.id = "65cb66715327f7000720ebc1";
    (function() {
        var be = document.createElement('script'); be.type = 'text/javascript'; be.async = true;
        be.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.chatbot.com/widget/plugin.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(be, s);
    })();
</script>
<noscript>You need to <a href="https://www.chatbot.com/help/chat-widget/enable-javascript-in-your-browser/" rel="noopener nofollow">enable JavaScript</a> in order to use the AI chatbot tool powered by <a href="https://www.chatbot.com/" rel="noopener nofollow" target="_blank">ChatBot</a></noscript>
<!-- End of ChatBot code -->
</body>
</html>