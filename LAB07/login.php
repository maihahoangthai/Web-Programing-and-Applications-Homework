<?php
    session_start();

    //Nếu đã đăng nhập rồi thì trình duyệt sẽ chuyển hướng về Home
    if (isset($_SESSION['user'])){
        header('Location: home.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<?php
    $error = '';

    //Khi trang vừa mới Load, kiểm tra xem đã có Cookie chưa:
    if (isset($_COOKIE['user']) && isset($_COOKIE['pass'])){ //Nếu có, tận dụng Cookie đang sẵn có:
        //Thiết lập Cookie
        $user = $_COOKIE['user'];
        $pass = $_COOKIE['pass'];
    }else { //nếu chưa thì gán rỗng rồi tạo mới ở phần dưới
        $user = '';
        $pass = '';
    }

    if(isset($_POST['user']) && isset($_POST['pass'])){
        $user = $_POST["user"];
        $pass = $_POST["pass"];

        if(empty($user)){
            $error = 'Please enter your Username!';
        }
        else if(empty($pass)){
            $error = 'Please enter your Password!';
        }
        else if($user == "admin" && $pass == "123456"){
            //Lưu cookie khi người dùng chọn ô remember me
            if(isset($_POST['remember'])) {
                //Thiết lập Cookie cho 1 ngày
                setcookie('user', $user, time() + 3600 * 24);
                setcookie('pass', $pass, time() + 3600 * 24);
            }

            $_SESSION['user'] = $user;

            header('Location: home.php');
            exit();
        }
        else{
            $error = 'Invalid username or password';
        }
    }else{
        //Không làm gì cả
    }
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <h3 class="text-center text-secondary mt-5 mb-3">User Login</h3>
            <form action="login.php" method="POST" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input value="<?= $user ?>" name="user" id="username" type="text" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input value="<?= $pass ?>" name="pass" id="password" type="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group custom-control custom-checkbox">
                    <input name="remember" type="checkbox" class="custom-control-input" id="remember">
                    <label class="custom-control-label" for="remember">Remember login</label>
                </div>
                <div class="form-group">
                    <?php
                        if(!empty($error)){
                            echo '<div class="alert alert-danger">' .$error. '</div>';
                        }
                    ?>
                    <button type="submit" class="btn btn-success px-5">Login</button>
                </div>
                <div class="form-group">
                    <p>Forgot password? <a href="#">Click here</a></p>
                </div>
            </form>

        </div>
    </div>
</div>

</body>
</html>
