<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bài tập 1</title>

    <style>
        td{
            text-align: center;
            padding: 10px;
        }

        table{
            margin: auto;
        }

        #tittle{
            text-transform: uppercase; 
            font-weight: bold;
            background-color:lightgray;
        }
    </style>
</head>
<body>
    <table border="1" width="90%" style="border-collapse: collapse;">
        <?php
            echo "<tr><td id='tittle' colspan=10><b1>bảng cửu chương</b1></td></tr>";
            for($i =1; $i <= 10; $i++){
                echo "<tr>";
                for($j = 1; $j <= 10; $j++){
                    $x = $i*$j;
                    echo "<td>$i x $j = $x</td>";
                }
                echo "</tr>";
            }
        ?>
    </table>
</body>