<?php
//Triệu gọi đến file xử lý thông qua request

$request_path = MODULESPATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . get_controller() . 'Controller.php';

if (file_exists($request_path)) {
    require $request_path;
} else {
    echo "Không tìm thấy:$request_path ";
}

$action_name = get_action() . 'Action';
if (!is_login() && $action_name != 'loginAction')
    redirect_to('user', 'index', 'login');
if (isset($_GET['btn_search']) && get_module()!= 'catalog') {
    $tails = "&keyword="."{$_GET['keyword']}"."&btn_search="."{$_GET['btn_search']}"."&status="."{$_SESSION['user_status']}";
    redirect_to('catalog','index', $_GET['btn_search'],$tails);
} else call_function(array('construct', $action_name));
