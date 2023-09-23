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

    <title>PHP Exercises</title>
</head>
<body>
    <div class="container">

        <div class="row">
            <div class="col-md-6 my-5 mx-auto border rounded px-3 py-3">
                <h6 class="text-center mb-3">Gợi ý tên quốc gia</h6>
                <input oninput="suggest(this.value)" type="text" class="form-control" placeholder="Nhập ít nhất 2 ký tự">
                <ul id="suggestions" class="list-group my-2"></ul>
            </div>
        </div>
    </div>

    <script>
        let suggestions = document.getElementById("suggestions");

        function sendRequest(keyword) {
            suggestions.innerHTML = ""; //Đảm bảo chưa có kết quả trả về nào

            const xhr = new XMLHttpRequest(); //Tạo Ajax
            xhr.addEventListener('load', e =>{
                if (xhr.readyState === 4 && xhr.status === 200){
                    let res = xhr.responseText;
                    res = JSON.parse(res); //decode JSON nhận được từ Server để dùng
                    //Trong JS, JSON.stringify = json_encode của php
                    if (res.code === 0){
                        let data = res.data;

                        data.forEach(item =>{
                            const li = document.createElement('li'); //Khởi tạo rồi định dạng các kết quả
                            li.className = 'list-group-item';
                            li.innerHTML = item;

                            suggestions.appendChild(li); //Thêm Element li vào danh sách kết quả sẽ hiện ra các kết quả trả về
                        })
                    }
                }
            })

            //Ajax
            xhr.open('GET', 'baitap3_2.php?keyword=' + encodeURIComponent(keyword), true);
            xhr.send();
        }

        function suggest(value){
            if (value.length < 2){ //Nếu nhỏ hơn 2 chữ thì không ra kết quả
                suggestions.innerHTML = ""; //Clear kết quả trả về trong trường hợp người dùng đang xóa từ khóa tìm kiếm
                return;
            }

            sendRequest(value);
        }
    </script>
</body>
</html>