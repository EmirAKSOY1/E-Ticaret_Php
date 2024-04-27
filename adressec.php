<link rel="shortcut icon" href="shop.png" type="image/x-icon" />
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alışverişi Tamamla</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/newnavbar.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/adressec.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <?php 
        session_start();
        $user=$_SESSION["user_id"];
        include("newnavbar.php");
        include("db.php");
        $sor = mysqli_query($baglan,"SELECT * FROM user where user_id='$user' ");
        $uyebilgi = mysqli_fetch_assoc($sor); 
    ?>
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
            <label for="recipient-name" class="col-form-label">Yeni Adres:</label>
            <input type="text" class="form-control" id="adres" >
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
<div class="form-wrapper">
	<h2>Adres Seç</h2>
	<div class='ea'>
<label for="choice-1">
			<input type="radio" id="choice-1" name="adres" value="b" />
			<div>
      <?php echo $uyebilgi['user_adress']   ?>
				<span>Adresin Seçildi</span>
			</div>
		</label>
		<label for="choice-2">
			<input type="radio" id="choice-2" name="adres" value="a" />
			<div>
      Başka Adres
				<span>Değiştir.</span>
			</div>
		</label>
</div>
		<button type="submit" id="tamamla">Kaydet</button>
</div> 
<script>
$("#tamamla").click(function(){
            var radioValue = $("input[name='adres']:checked").val();
            if(radioValue=='a'){
                $('#exampleModal').modal('show');
              }
            else{
                location.href='odemeekran.php';
            }
        });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
<script>
const exampleModal = document.getElementById('exampleModal');
exampleModal.addEventListener('show.bs.modal', event => {
  const button = event.relatedTarget
  const modalTitle = exampleModal.querySelector('.modal-title')
  const modalBodyInput = exampleModal.querySelector('.modal-body input')
  modalTitle.textContent = `Düzenle`;
  modalBodyInput.value = recipient;
})
$("#kaydet").click(function(){
 $.ajax({
 type: "POST",
 url: 'yenile.php',
 data: {yeniadres:$('#adres').val(),kul:'<?php echo $user ?>'
},
 success: function(data){
  location.href='adressec.php';
 },
 error: function(xhr, status, error){
 console.error(xhr);
 }
});
  });
</script>
<?php include("footer.php");?>
</body>
</html>