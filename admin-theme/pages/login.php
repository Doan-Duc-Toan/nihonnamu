<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="public/css/reset.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="public/js/jquery.js"></script>
    <title>Trang đăng nhập</title>
    <link rel="stylesheet" href="public/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    <div id="login" class="rounded">
        <h3>Đăng nhập</h3><br>
        <form action="" method="POST" class="form-group">
               <label for="username">Tên đăng nhập</label>
               <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập"><br>
               <label for="password">Mật khẩu</label>
               <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu">
               <button class="btn-primary rounded">Đăng nhập</button>
        </form>
    </div>
</body>
</html>