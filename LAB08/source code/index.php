<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .item img {
            height: 100px;
        }
    </style>
</head>
<body>

    <script>
        $(document).ready(function () {
            $(".delete").click(function () {

                $('#myModal').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            });
        });
    </script>

    <div class="container">
        <div class="row my-5">
            <div class="col">
                <a class="btn btn-sm btn-primary" href="add_product.php">Thêm sản phẩm</a>
            </div>
            <div class="col text-right">
                Xin chào <span class="text-danger"><?= $_SESSION['name'] ?></span>
            </div>
            <div class="col text-right">
                <a class="btn btn-sm btn-outline-success" href="logout.php">Đăng xuất</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-hover table-striped table-bordered text-center" >  
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tr class="item">
                        <td class=" align-middle"><img src="images/iphone-7-plus-128gb-de-400x460.png"></td>
                        <td class=" align-middle">iPhone 7 Plus 128 GB</td>
                        <td class=" align-middle">9,490,000 VND</td>
                        <td class=" align-middle">Mẫu iPhone mới nhất của Apple</td>
                        <td class=" align-middle"><a class="btn btn-sm btn-dark" href="add_product.php">Edit</a> <a class="btn btn-sm btn-danger" href="#" class="delete">Delete</a></td>
                    </tr>
                    <tr class="item">
                        <td class=" align-middle"><img src="images/samsung-galaxy-j7-plus-1-400x460.png"></td>
                        <td class=" align-middle">iPhone 7 Plus 128 GB</td>
                        <td class=" align-middle">9,490,000 VND</td>
                        <td class=" align-middle">Mẫu iPhone mới nhất của Apple</td>
                        <td class=" align-middle"><a class="btn btn-sm btn-dark" href="add_product.php">Edit</a> <a class="btn btn-sm btn-danger" href="#" class="delete">Delete</a></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="text-right">
            Tổng cộng có <span class="badge badge-danger badge-pill">2</span> sản phẩm
        </div>
    </div>

    <!-- Delete Confirm Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <hp class="modal-title">Xóa sản phẩm</hp>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc rằng muốn xóa <strong>iPhone XS MAX</strong> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Xóa</button>
                </div>

            </div>

        </div>
    </div>


</body>
</html>