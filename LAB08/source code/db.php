<?php
    define('HOST','127.0.0.1');
    define('USER','root');
    define('PASS','');
    define('DB', 'lab08');

    function open_database(){
        $conn = new mysqli(HOST, USER, PASS, DB);
        if ($conn->connect_error){
            die('Connect Error: '. $conn->connect_error);
        }
        return $conn;
    }

    function login($user, $pass){
        $sql = "select * from account where username = ?";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s', $user);
        if (!$stm->execute()){
            return array('code'=>2,'error'=>'Can not execute command'); //Chạy SQL thất bại
        }

        $result = $stm->get_result();

        if ($result->num_rows==0){
            return array('code'=>3,'error'=>'User does not exists'); //Không có User tồn tại
        }

        $data = $result->fetch_assoc();

        $hashed_password = $data['password'];
        if (!password_verify($pass, $hashed_password)){
            return array('code'=>4,'error'=>'Invalid password'); //Có User nhưng sai mật khẩu
        }else if($data['activated'] == 0){
            return array('code'=>5,'error'=>'This account is not activated');
        }else{
            return array('code'=>0,'error'=>'All valid!', 'data'=>$data);
        }
    }

    function is_email_exists($email){
        $sql = 'select username from account where email =?';
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s', $email);
        if (!$stm->execute()){
            die('Query Error: ' . $stm->error);
        }

        $result = $stm->get_result();
        if ($result->num_rows > 0){
            return true; //Có email
        }else{
            return false;
        }
    }

    function register($user, $pass, $first, $last, $email){
        if (is_email_exists($email)){
            return array('code'=>1,'error'=>'Email exists');
        }

        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $rand = random_int(0, 1000);
        $token = md5($user . '+' . $rand);

        $sql = 'insert into account(username, firstname, lastname, email, 
                    password, activate_token) values(?,?,?,?,?,?)';

        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm->bind_param('ssssss', $user, $first, $last, $email, $hash, $token);

        if (!$stm->execute()){
            return array('code'=>2,'error'=>'Can not execute command');
        }

        //send Email Verification

        return array('code'=>0,'error'=>'Create Account successful!');
    }
    ?>