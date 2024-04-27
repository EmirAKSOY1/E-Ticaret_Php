<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siparişlerim</title>
    <link rel="shortcut icon" href="shop.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/tablestyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/newnavbar.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/siparislerim.css">
    <style>
                .fa-ellipsis-h::after {
            display: none !important;
        }
    </style>
</head>
<body>
<?php 
session_start();
$user=$_SESSION['user_id'];
include ("newnavbar.php");
?>

<?php
    include('db.php');
    include('db_operation.php');

    if(getOrderCountByUserid($user)>0){
        
        $sql = "SELECT * FROM siparisler WHERE user_id = '$user'";
        $result = $baglan->query($sql);
        echo"
        <h2>Siparişlerim</h2>
        <div class='container mt-5'>
        <div class='d-flex justify-content-center row'>
            <div class='col-md-12'>
                <div class='rounded'>
                    <div class='table-responsive table-borderless'>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th>Sipariş No</th>
                                    <th>Durum</th>
                                    <th>Tutar</th>
                                    <th>Tarih</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class='table-body'>
        ";
        if ($result && $result->num_rows > 0) {
            // Sorgudan gelen her bir sipariş numarasını yazdır
            while ($row = $result->fetch_assoc()) {
                $badge_class = '';
                $text = '';
                switch ($row['durum']) {
                    case 1:
                        $badge_class = 'badge text-bg-secondary';
                        $text = "Sipariş alındı";
                        break;
                    case 2:
                        $badge_class = 'badge badge-primary';
                        $text = "Sipariş hazırlanıyor";
                        break;
                    case 3:
                        $badge_class = 'badge badge-warning';
                        $text = "Kargoya Verildi";
                        break;
                    case 4:
                        $badge_class = 'badge badge-success';
                        $text = "Teslim Edildi";
                        break;                
                    default:
                        $badge_class = 'badge badge-danger';
                        $text = "Sipariş iptal";
                        break;
                }
                echo "                                
                <tr class='cell-1'>
                    <td>".$row['siparis_id']."</td>
                    <td><span class='".$badge_class."'>".$text."</span></td>
                    <td>".$row['tutar']." TL</td>
                    <td>".$row['tarih']."</td>
                    <td>                                    
                    <div class='dropdown'>
                    <i class='fa fa-ellipsis-h text-black-50 dropdown-toggle' id='dropdownMenuButton' data-bs-toggle='dropdown' aria-expanded='false'></i>
                    <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                        <li><a class='dropdown-item' href='#'>Detay</a></li>
                        <li><a class='dropdown-item' href='#'>Kargo Takip</a></li>
                        <li><a class='dropdown-item' href='#' style='color:red' onclick='deleteOrder(".$row['siparis_id'].")'>Sil</a></li>
                    </ul>
                </div></td>
                    
                </tr>";
            }
            echo "                            </tbody>
            </table>
            
        </div>
    </div>
</div>
</div>
</div>";
        }
    }
    else{
        echo "<h2>Hiç Sipariş vermemişsiniz!</h2>";
    }
                                
?>
<?php 
include("footer.php");
?>
<script>
    function deleteOrder(order_id) {
    if (confirm("Siparişi silmek istediğinizden emin misiniz?")) {
        console.log(order_id);
    }
}
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script></body>
</html>