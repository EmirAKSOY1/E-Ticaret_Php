<link rel="shortcut icon" href="shop.png" type="image/x-icon" />
<?php 
    session_start();
    $_SESSION["login"] = false;
    $productId = $_GET['product_id'];
    include('db.php');
    include('db_operation.php');
    $sql= "SELECT  product_name , product_detail , product_price , product_image ,product_stock , category_id,rank,discount FROM product WHERE product_id='".$productId."' ";
    $result = $baglan->query($sql);
    $row = $result->fetch_assoc();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a59b9b09ab.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/comment.css">
    <link rel="stylesheet" href="css/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title><?php echo $row['product_name']?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/newnavbar.css">
    <link rel="stylesheet" href="css/detail.css">
    </head>
<body>
<?php include('newnavbar.php'); ?>
<main class="container" >
<div class="left-column">
  <img data-image="red" class="active" src="<?php echo $row['product_image']?>" style="width:50%;" alt="">
</div>
<!-- Right Column -->
<div class="right-column">
<!-- Product Description -->
  <div class="product-description">
    <span><?php echo $row['product_name']?></span>
    <h1><?php echo $row['product_detail']?></h1>
  </div>
<div class="product-configuration">
<h4 class='gig-rating text-body-2'>
                  <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1792 1792' width='15' height='15'>
                      <path
                          fill='gold'
                          d='M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z'
                      ></path>
                  </svg>
                  <?php echo $row['rank']?>
              </h4>
              <br>
<span>Son : <?php echo $row['product_stock']?> Adet</span>
    </div>
<!-- Product Pricing -->
  <div class="product-price">
  <span id="ucret">
    <?php 
    if($row['discount']>0){
      $indirimli = $row['product_price']- ($row['product_price']*$row['discount']/100);
      echo "
      <strike>".$row['product_price']."</strike>&nbsp;&nbsp;";
      echo $indirimli;
    }
    else{
      echo number_format($row['product_price'], 2, ',', '.');
    }
    
    ?>
  </span>
    <span >TL</span>
    <button type="button"  class="cart-btn" style="border-width:0px;" >SEPETE EKLE</button>
    </div>
</div>
</main>
<div class="comment">

<h2>Yorumlar</h2>  
<hr>     
<?php 
if(getCommentCountByProductId($productId)>0){
  $comment_sql = "SELECT * FROM comments WHERE product_id = '$productId'";
  $comment_result = $baglan->query($comment_sql);
  if ($comment_result && $comment_result->num_rows > 0) {
    echo "
    <div class='review-list'>
    <ul>
        <li>
    ";
    // Sorgudan gelen her bir sipariş numarasını yazdır
    while ($comment_row = $comment_result->fetch_assoc()) {
      echo "            
      <div class='d-flex'>
      <div class='left'>
          <span>
              <img src='https://bootdey.com/img/Content/avatar/avatar1.png' class='profile-pict-img img-fluid' alt='' />
          </span>
      </div>
      <div class='right'>
          <h4>
              ".getNameByUid($comment_row['user_id'])."
              <span class='gig-rating text-body-2'>
                  <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1792 1792' width='15' height='15'>
                      <path
                          fill='currentColor'
                          d='M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z'
                      ></path>
                  </svg>
                  ".$comment_row['comment_rank'].".0
              </span>
          </h4>
          <div class='review-description'>
              <p>".$comment_row['comment_text']."</p>
          </div>
          <span class='publish py-3 d-inline-block w-100'>".$comment_row['comment_date']."</span>
      </div>
  </div>";
    }
    echo "        </li>
    </ul>
</div>
</div>";
}
}
else {
  echo "Henüz Hiç yorum yok";
}
?>
<h3>Bu ürünlerde hoşuna gidebilir</h3>
<hr>
<div class="cover">
    <button class="left_scroll" onclick="leftScroll()">
      <i class="fas fa-angle-double-left"></i>
    </button>
    <div class="scroll-images">
  <?php 
    $other_sql = "SELECT * FROM product ORDER BY RAND() LIMIT 10";
    $other_result = $baglan->query($other_sql);
    if ($other_result && $other_result->num_rows > 0) {
     while ($other_row = $other_result->fetch_assoc()) {
          echo "
          <a href='product_detail.php?product_id=".$other_row['product_id']."' >
          <div class='child'>
            <img src='".$other_row['product_image']."' alt=''>
            <h4>".$other_row['product_name']."</h4>
          </div>
          </a>
          ";
      }
      }
    ?>
  </div>
    <button class="right_scroll" onclick="rightScroll()">
      <i class="fas fa-angle-double-right"></i>
    </button>
  </div>
<?php include('footer.php'); ?>
<script>
function success(){
  Swal.fire({
          icon: 'success',
          title: 'Başarılı',
          confirmButtonText: 'Alışverişe Devam Et',
          text: 'Ürün Başarıyla Sepete Eklendi',
          footer: '<a href="sepetim.php">Sepete Git</a>'
        }).then((result) => {
					if (result.isConfirmed){
						location.href='index.php';
					}
				})
}
$(".cart-btn").click(function(){
  
   <?php
    if(isset($_SESSION['isim'])){
      echo "
        $.ajax({
          type: 'POST',
          url: 'sepetekle.php',
          data: {id: ".$productId."  },
          success: function(data){
            console.log(data);
            success();
          },
        error: function(xhr, status, error){
        console.error(xhr,error);
        }
       });
    ";
    }
    else{
      echo "location.href='login.php';";
    }
?> 
});
</script>
<script type="text/javascript" src="./js/detail_slider.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>
</html>
