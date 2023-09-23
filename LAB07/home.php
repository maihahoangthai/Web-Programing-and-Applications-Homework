<?php
    session_start();

    //Nếu chưa đăng nhập thì sẽ chuyển hướng trình duyệt về lại trang Login
    if (isset($_SESSION['user']) == false){
        header('Location: login.php');
        exit();
    }

    $root = "./users/" . $_SESSION['user'];
    //Nếu chưa có thư mục thì tạo mới
    if (!file_exists($root)){
        mkdir($root, 0777, true);
    }
    //trả về danh sách tập tin và thư mục con của $root
    //$listFiles = scandir($root);
    //print_r($listFiles);

    if (isset($_GET['dir'])){ //Nếu có truyền tham số thì:
        $dir = $_GET['dir'];
        $path = "$root/$dir";
        //Nếu tham số truyền không đúng hoặc đúng nhưng không phải tập tin thì:
        if (!file_exists($path) || !is_dir($path)){
            die('Thư mục không hợp lệ!');
        }
    }
    else{ //Ngược lại, khi không truyền tham số thì:
        $dir = '.'; //Nghĩa là thư mục hiện tại, thư mục users/admin
    }

    $path = "$root/$dir";
    //echo "Nạp thư mục $path";
    $listFiles = scandir($path); //trả về danh sách tập tin và thư mục con của $path

    /*function sortFolder($listFiles, $path){ //Sắp xếp thư mục và tập tin
        $dirs = [];
        $files = [];

        foreach ($listFiles as $i){
            if ($i == '.' || $i == '..'){
                continue;
            }

            $p = "$path/$i";
            if (is_dir($p)){
                $dirs[] = $i;
            }else{
                $files[] = $i;
            }
        }

        natcasesort($files);
        echo "runrun";
        return array_merge($dirs, $files);
    }*/

    $ext_icons = [
            'zip' => '<i class="fas fa-file-archive"></i>',
            'rar' => '<i class="fas fa-file-archive"></i>',
            'gz' => '<i class="fas fa-file-archive"></i>',
            '7z' => '<i class="fas fa-file-archive"></i>',
            'jpg' => '<i class="fas fa-file-image"></i>',
            'png' => '<i class="fas fa-file-image"></i>',
            'bmp' => '<i class="fas fa-file-image"></i>',
            'mp3' => '<i class="fas fa-file-audio"></i>',
            'wav' => '<i class="fas fa-file-audio"></i>',
            'mp4' => '<i class="fas fa-file-video"></i>',
            'mkv' => '<i class="fas fa-file-video"></i>',
            'mov' => '<i class="fas fa-file-video"></i>',
            'doc' => '<i class="fas fa-file-word"></i>',
            'docx' => '<i class="fas fa-file-word"></i>',
            'pdf' => '<i class="fas fa-file-pdf"></i>',
            'html' => '<i class="fas fa-file-code"></i>',
            'css' => '<i class="fas fa-file-code"></i>',
            'php' => '<i class="fas fa-file-code"></i>',
    ];

    $file_type = [
        'zip' => 'Compressed File',
        'rar' => 'Compressed File',
        'gz' => 'Compressed File',
        '7z' => 'Compressed File',
        'jpg' => 'Image',
        'png' => 'Image',
        'bmp' => 'Image',
        'mp3' => 'Audio',
        'wav' => 'Audio',
        'mp4' => 'Video',
        'mkv' => 'Video',
        'mov' => 'Video',
        'doc' => 'Mircosoft Word 2003',
        'docx' => 'Mircosoft Word 2010',
        'pdf' => 'PDF Document',
        'html' => 'HTML Document',
        'css' => 'CSS Stylesheet',
        'php' => 'PHP Code',
    ];
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Bootstrap Example</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link
         rel="stylesheet"
         href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
         integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <style>
         .fa, .fas {
         color: #858585;
         }
         .fa-folder {
         color: rgb(74, 158, 255);
         }
         i.fa, table i.fas {
         font-size: 16px;
         margin-right: 6px;
         }
         i.action {
         cursor: pointer;
         }
         a {
         color: black;
         }
      </style>
   </head>
   <body>
      <div class="container">
         <div class="row align-items-center py-5">
            <div class="col-6">
               <h2>File Manager</h2>
            </div>
            <div class="col-6">
               <h5 class="text-right">Xin chào <?= $_SESSION['user'] ?>, <a class="text-primary" href="logout.php">Logout</a></h5>
            </div>
         </div>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active">Accessories</li>
         </ol>
         <div class="input-group mb-3">
            <div class="input-group-prepend">
               <span class="input-group-text">
               <span class="fa fa-search"></span>
               </span>
            </div>
            <input type="text" class="form-control" placeholder="Search">
         </div>
         <div class="btn-group my-3">
            <button type="button" class="btn btn-light border">
            <i class="fas fa-folder-plus"></i> New folder
            </button>
            <button type="button" class="btn btn-light border">
                <i class="fas fa-file"></i> Create text file
                </button>
         </div>
         <table class="table table-hover border">
            <thead>
               <tr>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Size</th>
                  <th>Last modified</th>
                  <th>Actions</th>
               </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($listFiles as $file){
                        $filePath = "$path/$file";
                        if (is_dir($filePath)){ //Nếu là thư mục thì:
                            $icon = '<i class="fa fa-folder"></i>'; //Icon thư mục
                            $type = 'Folder';
                        }else{ //Nếu không là thư mục:
                            $ext = pathinfo($filePath, PATHINFO_EXTENSION); //Lấy đuôi, vd: doc, docx, jpg
                            if (array_key_exists($ext, $ext_icons)){ //Nếu có icon chuyên biệt đã được khai báo sẵn thì sử dụng
                                $icon = $ext_icons[$ext];
                            }else{ //Nếu như không có icon chuyên biệt cho loại đuôi file thì lấy đuôi chung
                                $icon = '<i class="fas fa-file"></i>';
                            }

                            //Nhận dạng Type
                            if (array_key_exists($ext, $file_type)){
                                $type = $file_type[$ext];
                            }
                            else{
                                $type = 'File';
                            }
                        }

                        ?>
                            <tr>
                                <td>
                                    <?= $icon ?>
                                    <a href="#"><?= $file ?></a>
                                </td>
                                <td><?= $type ?></td>
                                <td>-</td>
                                <td>02-12-2019</td>
                                <td>
                                    <span><i class="fa fa-download action"></i></span>
                                    <span><i class="fa fa-edit action"></i></span>
                                    <span><i class="fa fa-trash action"></i></span>
                                </td>
                            </tr>
                        <?php
                    }
                ?>

                <!--
               <tr>
                  <td>
                     <i class="fa fa-folder"></i>
                     <a href="#">Document</a>
                  </td>
                  <td>Folder</td>
                  <td>-</td>
                  <td>02-12-2019</td>
                  <td>
                     <span><i class="fa fa-download action"></i></span>
                     <span><i class="fa fa-edit action"></i></span>
                     <span><i class="fa fa-trash action"></i></span>
                  </td>
               </tr>
               <tr>
                  <td>
                     <i class="fa fa-folder"></i>
                     <a href="#">Video</a>
                  </td>
                  <td>Folder</td>
                  <td>-</td>
                  <td>02-12-2019</td>
                  <td>
                     <span><i class="fa fa-download action"></i></span>
                     <span><i class="fa fa-edit action"></i></span>
                     <span><i class="fa fa-trash action"></i></span>
                  </td>
               </tr>
               <tr>
                  <td>
                     <i class="fa fa-folder"></i>
                     <a href="#">Downloads</a>
                  </td>
                  <td>Folder</td>
                  <td>-</td>
                  <td>02-12-2019</td>
                  <td>
                      <span><i class="fa fa-download action"></i></span>
                      <span><i class="fa fa-edit action"></i></span>
                      <span><i class="fa fa-trash action"></i></span>
                  </td>
               </tr>
               <tr>
                  <td>
                     <i class="fas fa-file-archive"></i>
                     <a href="#">fontawesome-free-5.15.1-web.zip</a>
                  </td>
                  <td>Compressed file</td>
                  <td>3.5 MB</td>
                  <td>02-07-2020</td>
                  <td>
                     <span><i class="fa fa-download action"></i></span>
                     <span><i class="fa fa-edit action"></i></span>
                     <span><i class="fa fa-trash action"></i></span>
                  </td>
               </tr>
               <tr>
                  <td>
                     <i class="fas fa-file"></i>
                     <a href="#">Account.txt</a>
                  </td>
                  <td>Text Document</td>
                  <td>18 KB</td>
                  <td>11-02-2020</td>
                  <td>
                     <span><i class="fa fa-download action"></i></span>
                     <span><i class="fa fa-edit action"></i></span>
                     <span><i class="fa fa-trash action"></i></span>
                  </td>
               </tr>
               <tr>
                  <td>
                     <i class="fas fa-file-image"></i>
                     <a href="#">img101.png</a>
                  </td>
                  <td>JPG Image</td>
                  <td>2.2 MB</td>
                  <td>11-02-2020</td>
                  <td>
                     <span><i class="fa fa-download action"></i></span>
                     <span><i class="fa fa-edit action"></i></span>
                     <span><i class="fa fa-trash action"></i></span>
                  </td>
               </tr>
            -->
            </tbody>
         </table>
         <div class="border rounded mb-3 mt-5 p-3">
            <h4>File upload</h4>
            <form>
               <div class="form-group">
                  <div class="custom-file">
                     <input type="file" class="custom-file-input" id="customFile">
                     <label class="custom-file-label" for="customFile">Choose file</label>            
                  </div>
               </div>
               <p>Người dùng chỉ được upload tập tin có kích thước tối đa là 20 MB.</p>
               <p>Các tập tin thực thi (*.exe, *.msi, *.sh) không được phép upload.</p>
               <p><strong>Yêu cầu nâng cao</strong>: hiển thị progress bar trong quá trình upload.</p>
               <button class="btn btn-success px-5">Upload</button>
            </form>
         </div>

         <div class="modal-example my-5">
            <h4>Một số dialog mẫu</h4>
            <p>Nhấn vào để xem kết quả</p>
             <ul>
                 <li><a href="#" data-toggle="modal" data-target="#confirm-delete">Confirm delete</a></li>
                 <li><a href="#" data-toggle="modal" data-target="#confirm-rename">Confirm rename</a></li>
                 <li><a href="#" data-toggle="modal" data-target="#new-file-dialog">New file dialog</a></li>
                 <li><a href="#" data-toggle="modal" data-target="#message-dialog">Message Dialog</a></li>
             </ul>
         </div>

      </div>


      <!-- Delete dialog -->
      <div class="modal fade" id="confirm-delete">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <div class="modal-header">
              <h4 class="modal-title">Xóa tập tin</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
              Bạn có chắc rằng muốn xóa tập tin <strong>image.jpg</strong>
            </div>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Xóa</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
            </div>            
            </div>
        </div>
        </div>


    <!-- Rename dialog -->
    <div class="modal fade" id="confirm-rename">
        <div class="modal-dialog">
        <div class="modal-content">
        
            <div class="modal-header">
            <h4 class="modal-title">Đổi tên</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <p>Nhập tên mới cho tập tin <strong>Document.txt</strong></p>
                <input type="text" placeholder="Nhập tên mới" value="Document.txt" class="form-control"/>
            </div>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Lưu</button>
            </div>            
            </div>
        </div>
        </div>

        <!-- New file dialog -->
        <div class="modal fade" id="new-file-dialog">
        <div class="modal-dialog">
        <div class="modal-content">
        
            <div class="modal-header">
            <h4 class="modal-title">Tạo tập tin mới</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="name">File Name</label>
                    <input type="text" placeholder="File name" class="form-control" id="name"/>
                </div>
                <div class="form-group">
                    <label for="content">Nội dung</label>
                    <textarea rows="10" id="content" class="form-control" placeholder="Nội dung"></textarea>

                </div>
            </div>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Lưu</button>
            </div>            
            </div>
        </div>
        </div>



        <!-- message dialog -->
        <div class="modal fade" id="message-dialog">
            <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                <h4 class="modal-title">Xóa file</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
    
                <div class="modal-body">
                    <p>Bạn không được cấp quyền để xóa tập tin/thư mục này</p>
                </div>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Đóng</button>
                </div>            
                </div>
            </div>
            </div>


   </body>
</html>