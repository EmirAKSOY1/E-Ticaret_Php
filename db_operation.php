<?php 
function connectDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "e_ticaret";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Bağlantı kontrolü
    if ($conn->connect_error) {
        die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
    }

    return $conn;
}
function getUserNameByEmail($email) {

    $conn = connectDatabase();

    // Veritabanı sorgusu
    $sql = "SELECT user_name FROM user WHERE user_mail = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Bir satırın verisini alma
        $row = $result->fetch_assoc();
        $name = $row["user_name"];
    } else {
        $name = "Kullanıcı bulunamadı";
    }

    $conn->close();

    return $name;
}
function getUserIdByEmail($email) {
    $conn = connectDatabase();
    // Veritabanı sorgusu
    $sql = "SELECT user_id FROM user WHERE user_mail = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Bir satırın verisini alma
        $row = $result->fetch_assoc();
        $id = $row["user_id"];
    } else {
        $id = "Kullanıcı bulunamadı";
    }
    $conn->close();

    return $id;
}
function getProductCount() {
    $conn = connectDatabase();
    $sql="SELECT * FROM product";
    $result = $conn->query($sql);
    $conn->close();
    return $result->num_rows;
}
function getDiscountProductCount() {
    $conn = connectDatabase();
    $sql="SELECT * FROM product WHERE discount>0";
    $result = $conn->query($sql);
    $conn->close();
    return $result->num_rows;
}
function getNameByUid($uid) {
    $conn = connectDatabase();
    // Veritabanı sorgusu
    $sql = "SELECT user_name FROM user WHERE user_id = '$uid'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Bir satırın verisini alma
        $row = $result->fetch_assoc();
        $name = $row["user_name"];
    } else {
        $name = "Kullanıcı bulunamadı";
    }
    $conn->close();

    return $name;
} 
function getSurnameByUid($uid) {
    $conn = connectDatabase();
    // Veritabanı sorgusu
    $sql = "SELECT user_surname FROM user WHERE user_id = '$uid'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Bir satırın verisini alma
        $row = $result->fetch_assoc();
        $surname = $row["user_surname"];
    } else {
        $surname = "Kullanıcı bulunamadı";
    }
    $conn->close();

    return $surname;
}
function getTelByUid($uid) {
    $conn = connectDatabase();
    // Veritabanı sorgusu
    $sql = "SELECT user_tel FROM user WHERE user_id = '$uid'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Bir satırın verisini alma
        $row = $result->fetch_assoc();
        $user_tel = $row["user_tel"];
    } else {
        $user_tel = "Kullanıcı bulunamadı";
    }
    $conn->close();

    return $user_tel;
}
function getMailByUid($uid) {
    $conn = connectDatabase();
    // Veritabanı sorgusu
    $sql = "SELECT user_mail FROM user WHERE user_id = '$uid'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Bir satırın verisini alma
        $row = $result->fetch_assoc();
        $user_mail = $row["user_mail"];
    } else {
        $user_mail = "Kullanıcı bulunamadı";
    }
    $conn->close();

    return $user_mail;
}
function getAdressByUid($uid) {
    $conn = connectDatabase();
    // Veritabanı sorgusu
    $sql = "SELECT user_adress FROM user WHERE user_id = '$uid'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Bir satırın verisini alma
        $row = $result->fetch_assoc();
        $user_adress = $row["user_adress"];
    } else {
        $user_adress = "Kullanıcı bulunamadı";
    }
    $conn->close();

    return $user_adress;
}
function getLastOrder() {
    $conn = connectDatabase();
    // Veritabanı sorgusu
    $sql = "SELECT MAX(order_id) AS max_order_id FROM provisinal";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Bir satırın verisini alma
        $row = $result->fetch_assoc();
        $order_id = $row['max_order_id'];
    } else {
        $order_id = "Sipariş bulunamadı";
    }
    $conn->close();

    return (int)$order_id;
}
function AddProvisinalOrder($user_id,$total_basket) {
    $conn = connectDatabase();
    // Veritabanı sorgusu
    $sql = "INSERT INTO provisinal (user_id , total_basket , statu) VALUES ('$user_id','$total_basket', '1')";
    if ($conn->query($sql) === TRUE) {
       return TRUE;
    } else {
        return FALSE;
    }
    $conn->close();
}
function getUserByOrder_id($siparis_no) {
    $conn = connectDatabase();
    // Veritabanı sorgusu
    $sql = "SELECT user_id FROM provisinal WHERE order_id = '$siparis_no'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Bir satırın verisini alma
        $row = $result->fetch_assoc();
        $user_id = $row["user_id"];
    } else {
        $user_id = "Kullanıcı bulunamadı";
    }
    $conn->close();

    return $user_id;
}
function getOrderByOrder_id($siparis_no) {
    $conn = connectDatabase();
    // Veritabanı sorgusu
    $sql = "SELECT total_basket FROM provisinal WHERE order_id = '$siparis_no'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Bir satırın verisini alma
        $row = $result->fetch_assoc();
        $total_basket = $row["total_basket"];
    } else {
        $total_basket = "Kullanıcı bulunamadı";
    }
    $conn->close();

    return $total_basket;
}
function ProvisinalOrderDelete($user_id) {
    $conn = connectDatabase();
    // Veritabanı sorgusu
    $sql = "DELETE FROM provisinal WHERE user_id = '$user_id'";
    if ($conn->query($sql) === TRUE) {
        return TRUE;
     } else {
         return FALSE;
     }
     $conn->close();
}
function getOrderCountByUserId($user_id) {
    $conn = connectDatabase();
    $sql = "SELECT COUNT(*) as count FROM siparisler WHERE user_id = '$user_id'";
    $result = $conn->query($sql);
    if ($result) {
        // Sonuç kümesinin satır sayısını al
        $count = $result->fetch_assoc()['count'];
        return $count;
    }
}
function getCommentCountByProductId($product_id) {
    $conn = connectDatabase();
    $sql = "SELECT COUNT(*) as count FROM comments WHERE product_id = '$product_id'";
    $result = $conn->query($sql);
    if ($result) {
        $count = $result->fetch_assoc()['count'];
        return $count;
    }
}
?>