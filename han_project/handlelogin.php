<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
require_once './connect.php';
//Lấy dữ liệu nhập vào
$email = $_POST['email'];
$password = $_POST['password'];
// echo $email;
// echo $password;


//kiem tra user co nhap day du du lieu
if (!$email || !$password) {
    echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu";
    exit;
}

$password = md5($password);

$sql = "SELECT * FROM customer WHERE Email='$email'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    // Load dữ liệu lên website
    while($row = $result->fetch_assoc()) {
        if($password == $row["Password"]){
            $_SESSION['user_id'] = $row["CustomerID"];
            $_SESSION['user_phone'] = $row["Phone"];
            $_SESSION['user_email'] = $row["Email"];
            $_SESSION['user_name'] = $row["Username"];
            $_SESSION['user_created'] = $row["Created"];
            echo "da luu vao session";
        }
    }
    } else {
    echo "Thong tin dang nhap khong chinh xac!";
    }

$conn->close();


?>



     
