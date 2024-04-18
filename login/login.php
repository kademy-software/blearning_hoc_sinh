<?php 
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST['username']; 
    $password=$_POST['password']; 

    $host="localhost";
    $dbusername="root";
    $dbpassword=""; 
    $dbname="auth"; 

    $conn=new mysqli($host,$dbusername,$dbpassword, $dbname); 
    if($conn->connect_error){
        die("Connnection failed: ". $conn->connect_error);
    }
    $query ="SELECT * FROM dang_nhap WHERE username='$username' AND password='$password' "; 
    $result =$conn->query($query); 
    if($result->num_rows==1){
        //đăng nhập thành công
        header("Location: https://kademy-software.github.io/blearning_kietlt_admintrue/"); 
        exit();
    }else{
        //đăng nhập thất bại 
        echo 'Tên tài khoản hoặc mật khẩu chưa chính xác.';
        exit(); 
    }
    $conn->close();
}
?>