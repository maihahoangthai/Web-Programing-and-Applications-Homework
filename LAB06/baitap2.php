<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Bài tập 2</title>
</head>
<body>
    <div class="container">
        <?php
            $errorMSG = '';
            $result = '';
            if(isset($_GET['numA']) && isset($_GET['numB'])){
                $a = $_GET['numA'];
                $b = $_GET['numB'];

                if($a == ''){
                    $errorMSG = "Vui lòng nhập Số hạng 1";
                }
                else if($b == ''){
                    $errorMSG = "Vui lòng nhập Số hạng 2";
                }
                else if(!isset($_GET['op'])){
                    $errorMSG = "Vui lòng chọn một phép toán bất kỳ!";
                }
                else{
                    $op = $_GET['op'];

                    if($op == 'add'){
                        $result = $a + $b;
                    }
                    else if($op == 'substract'){
                        $result = $a - $b;
                    }
                    else if($op == 'multiply'){
                        $result = $a * $b;
                    }
                    else if($b == 0){
                        $errorMSG = "Không thể chia cho 0";
                    }
                    else{
                        $result = $a / $b;
                    }
                }
            }
        ?>

        <div class="row" action="" method="get">
            <div class="col-md-6 my-5 mx-auto border rounded px-3 py-3">
                <h4 class="text-center">Tính toán cơ bản</h4>
                <form>
                    <div class="form-group">
                        <label for="num1">Số hạng 1</label>
                        <input type="text" class="form-control" id="num1" name="numA">
                    </div>
                    <div class="form-group">
                        <label for="num2">Số hạng 2</label>
                        <input type="text" class="form-control" id="num2" name="numB">
                    </div>                    
                    <div class="form-group">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input id="add" type="radio" class="custom-control-input" name="op" value="add">
                            <label for="add" type="radio" class="custom-control-label">Cộng</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input id="subtract" type="radio" class="custom-control-input" name="op" value="subtract">
                            <label for="subtract" type="radio" class="custom-control-label">Trừ</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input id="multiply" type="radio" class="custom-control-input" name="op" value="multiply">
                            <label for="multiply" type="radio" class="custom-control-label">Nhân</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input id="divide" type="radio" class="custom-control-input" name="op" value="divide">
                            <label for="divide" type="radio" class="custom-control-label">Chia</label>
                        </div>
                    </div>

                    <div class="alert alert-danger text-center"><?= $errorMSG ?></div>

                    <button class="btn btn-success">Xem kết quả</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto px-3 py-3 text-center">
                <div class="alert alert-success"><?= $result ?></div>
            </div>
        </div>
    </div>
</body>
</html>