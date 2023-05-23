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
            <?php global $error, $username; ?>
            <label for="username">Tên đăng nhập</label>
            <input type="text" name="username" id="username" class="form-control" value="<?php print_field_ok($error, 'username'); ?>" placeholder="Nhập tên đăng nhập"><br>
            <p  class="show_error"><?php show_error($error, 'username') ?></p>
            <label for="password">Mật khẩu</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu">
            <p  class="show_error"><?php show_error($error, 'password') ?></p>
            <button name="btn_login" class="btn-primary rounded">Đăng nhập</button>
            <p  class="show_error"><?php show_error($error,'login') ?></p>
        </form>
    </div>
</body>

</html>