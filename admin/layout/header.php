<?php
$action = !empty($_GET['action'])?$_GET['action']:'';
$user = get_user_by_username($_SESSION['username']); 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="public/css/reset.css">
    <script src="public/js/jquery.js"></script>
    <script src="public/js/info_user.js"></script>
    <script src="public/js/main.js"></script>
    <script src="<?php get_js($action) ?>"></script>
    <script src="public/js/plugins/ckeditor/ckeditor.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2"
        crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="public/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="public/css/info_user.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="<?php get_css($action); ?>">
    <title>NihonNamu</title>
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <div id="admin_name">
                <a href="?" id="Admin_name">NihonNamu Admin</a>
            </div>
            <div id="header_right">
                <div id="add">
                    <i class="fa-solid fa-circle-plus add dropdown_toggle"></i>
                    <ul class="add dropdown_menu rounded">
                        <li class="add_post"><a href="?mod=post&action=add_post">Thêm bài viết</a></li>
                        <li class="add_product"><a href="?mod=product&action=add_product">Thêm sản phẩm</a></li>
                        <li class="add_order"><a href="?mod=order&action=list_order">Thêm đơn hàng</a></li>
                    </ul>
                </div>
                <div id="user_info">
                    <div class="dropdown_toggle">
                        <span id="fullname"><?php echo $user['fullname'] ?></span>
                        <i class="fa-solid fa-caret-down"></i>
                    </div>
                    <ul class="dropdown_menu rounded">
                        <li class="user_detail"><a href="?mod=user&action=user_detail">Tài khoản</a></li>
                        <li class="logout"><a href="?mod=user&action=logout">Thoát</a></li>
                    </ul>
                </div>
            </div>
        </div>