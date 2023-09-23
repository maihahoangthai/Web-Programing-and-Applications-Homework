<?php
$result0 = "";
$result1 = "";
$result2 = "";
$result3 = "";
$result4 = "";
$result5 = "";
$result6 = "";
$result7 = "None";
$msg = "";
if(isset($_POST["cmdCal"])){
    $myname = $_POST["yourname"];
    $myemail = $_POST["youremail"];
    if(trim($myname)=="" || !isset($myname) || is_numeric($myname) || is_int($myname)){
        $msg="Không dùng số thay cho tên hoặc không được để tên trống";
    }
    else if (empty($myemail)){
        $msg="Không được để email trống";
    }
    else{
        $result0 = $myname."<br>";
        $result1 = $myemail."<br>";
        if(!isset($_POST["gender"])){
            $msg="Chưa chọn giới tính";
        }
        else{
            $gender = $_POST["gender"];
            $result2 = $gender."<br>";

            if(isset($_POST["1"])){
                $G = $_POST["1"];
                $result3 = " . ".$G."<br>";
            }
            else
                $result3 ="";

            if(isset($_POST["2"])){
                $F = $_POST["2"];
                $result4 = " . ".$F."<br>";
            }
            else
                $result4 ="";

            if(isset($_POST["3"])){
                $S = $_POST["3"];
                $result5 = " . ".$S."<br>";
            }
            else
                $result5 ="";

            if(isset($_POST["4"])){
                $E = $_POST["4"];
                $result6 = " . ".$E."<br>";
            }
            else
                $result6 ="";
        }
        $child = $_POST["cars"];
        if(isset($child)){
            $result7 = $child."<br>";
        }
        else
            $result7 ="";
    }
}
?>
<!DOCTYPE html>
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

    <title>PHP Exercises 2</title>
</head>
    <body>

        <div class="col-md-8 col-lg-5 my-5 mx-2 mx-sm-auto border rounded px-3 py-3">
                <?php
                        if (!$msg == ""){
                            echo '<h5 class="text-center text-danger mb-3">' . $msg . '</h5><br>';
                            exit();
                        }
                        ?>
                <?php
                    echo '<h5 class="text-center text-success mb-3">Confirm Information</h5><br>';
                    echo '<label>Your name</label><br>';
                    echo '<p class = text-success>' .$result0. '</p>';
                    echo '<label>Your email</label><br>';
                    echo '<p class = text-success>' .$result1. '</p>';
                    echo '<legend class="col-form-label">Gender</legend>';
                    echo '<p class = text-success>' .$result2. '</p>';
                    echo '<legend class="col-form-label">Favorite web browsers</legend>';
                    echo '<ul style="list-style-type:square" class = text-success>' .$result3. '</ul>';
                    echo '<ul style="list-style-type:square" class = text-success>' .$result4. '</ul>';
                    echo '<ul style="list-style-type:square" class = text-success>' .$result5. '</ul>';
                    echo '<ul style="list-style-type:square" class = text-success>' .$result6. '</ul>';
                    echo '<legend class="col-form-label">Prefered Operating System</legend>';
                    echo '<p class = text-success>' .$result7. '</p>';
                    echo '<button class="btn btn-success px-5 mr-2">Save</button><button class="btn btn-outline-success px-5">Back</button>'
                ?>
        </div>
    </body>
</html>