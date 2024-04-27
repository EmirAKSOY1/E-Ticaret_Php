<link rel="shortcut icon" href="shop.png" type="image/x-icon" />
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilgilerim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/newnavbar.css">
    <link rel="stylesheet" href="css/bilgilerim.css">
</head>
<body>
    <?php 
        session_start();
        $user_id = $_SESSION["user_id"];
        include("db.php");
        include("db_operation.php");
        $sor = mysqli_query($baglan,"SELECT * FROM user where user_id='$user_id' ");
        $uyebilgi = mysqli_fetch_assoc($sor); 
        include("newnavbar.php");
    ?>
<div class="container">
        <div class="main-body">
          <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                          <h4><?php echo $uyebilgi['user_name'] ," ", $uyebilgi['user_surname']?></h4>
                          <p class="text-secondary mb-1"><?php echo $uyebilgi['user_mail'] ?></p>
                          </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="col-md-8">
                  <div class="card mb-3" id="bilgiler">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">İsim</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <?php echo $uyebilgi['user_name']," ", $uyebilgi['user_surname']?>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Adres</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <?php echo $uyebilgi['user_adress']?>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Telefon</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <?php echo $uyebilgi['user_tel']?>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Mail</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <?php echo $uyebilgi['user_mail']?>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-12">
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >Düzenle</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    </div>
        </div>

<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="index.php">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">İsim:</label>
            <input type="text" class="form-control" id="name" value ="<?php echo $uyebilgi['user_name']?>">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Soyisim:</label>
            <input type="text" class="form-control" id="surname"  value ="<?php echo $uyebilgi['user_surname']?>" >
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Mail:</label>
            <input type="text" class="form-control" id="mail"  value ="<?php echo $uyebilgi['user_mail']?>" >
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Telefon:</label>
            <input type="text" class="form-control" id="tel"  value ="<?php echo $uyebilgi['user_tel']?>">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Adres:</label>
            <input type="text" class="form-control" id="adres"  value ="<?php echo $uyebilgi['user_adress']?>" >
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
        <button type="button" class="btn btn-primary" id="kaydet">Kaydet</button>
      </div>
    </div>
  </div>
</div>
<!--Modal finish-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/main.js"></script> 
  <script src="js/bilgilerim.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

</body>
</html>