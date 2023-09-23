<?php
    if (isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        if (empty($_POST['email']) || empty($_POST['password'])){
            die('Email hoặc Password không được để trống');
        }
        else if ($email == 'admin@gmail.com' && $password == '123456'){
            sleep(2);
            header('location: home.php?email='.$email);
            exit();
        }else {
            die("Sai email hoặc password");
        }
    }
    else{
        die('Email hoặc Password nhập vào không chính xác');
    }
?>