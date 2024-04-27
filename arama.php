<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_POST["arama"]; ?></title>
    <link rel="shortcut icon" href="shop.png" type="image/x-icon" />

    <!--Navbar-->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/newnavbar.css">
<style>
.card-img-top
{
  width: 200px;
}
.pagination{
  display: flex;
  justify-content: center;
  align-items: center;
}
#urun_adet{
  display: flex;
  justify-content: center;
  align-items: center;
}

</style>
<?php 
session_start();
      include("newnavbar.php");
      $istenen_sayfa=isset($_GET['sayfa'])&& intval($_GET['sayfa']) > 0 ? $_GET['sayfa'] : 1;
      $aranacak=$_POST["arama"];
      $listelenecek  = 8;
      $limit=$istenen_sayfa*$listelenecek-$listelenecek;
      
  ?>
</head>
<body>
<div class="row row-cols-1 row-cols-md-4 g-3" style="margin-left:2%">


<?php 

include("db.php");
      $sec= "SELECT product_id , product_name , product_detail , product_price , product_image FROM product WHERE product_name LIKE '%$aranacak%' OR product_detail LIKE '%$aranacak%'  ORDER BY product_id  LIMIT $limit,$listelenecek";
      
      $adet=mysqli_query($baglan, $sec);
      $urun_adeti = mysqli_num_rows($adet);

      $sonuc= $baglan->query($sec);
      #echo $row;
      if ($sonuc->num_rows > 0) 
      {
        // verileri listeleyebiliriz
        while($cek = $sonuc->fetch_assoc()) 
         {
          $urun=
          " 
          <a href='product_detail.php?product_id=".$cek['product_id']."' class='product-detail'>
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
        </a>
          ";
          
      
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
        $sayfalama = ceil($urun_adeti/$listelenecek) ;
        
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
<?php 
echo $urun_adeti
?> Adet ürün bulundu
</span>


  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/main.js"></script>  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    
</body>
</html>
