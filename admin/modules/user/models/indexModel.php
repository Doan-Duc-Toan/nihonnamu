<?php
load('helper', 'validation');

//Kiểm tra đăng nhập
function check_login($username, $password)
{
    $result = db_fetch_array("SELECT * FROM `tbl_users` WHERE `username` = '$username' AND `password` = '$password'");
    if (!empty($result)) return true;
    return false;
}

//In trường không có lỗi
function print_field_ok($error, $field)
{
    global $$field;
    if (empty($error[$field])) echo $$field;
}

//Kiểm tra định dạng ảnh

function check_type($type)
{
    $list_type = array('jpg', 'png', 'gif', 'jpeg');
    if (!in_array(strtolower($type), $list_type)) return false;
    return true;
}


//Lấy trường img của user
function get_user_field_img($user,$field_img)
{
    if(!empty($user[$field_img]))echo $user[$field_img];
     else {
        $path = "public/images/demo/{$field_img}.jpg";
        echo $path;
     }
}

//update user bằng username
function user_update($data,$username){
    db_update('tbl_users',$data,"`username`='{$username}'");
}

//Kiểm tra dữ liệu đã tồn tại hay chưa
function check_isset_data($field)
{
    global $$field;
    $check = db_num_rows("SELECT * FROM `tbl_users`   WHERE `{$field}` = '{$$field}'");
    if($check > 0) return true;
    return false;
}

// chuyển từ key sang giới tính
function key_to_gender($gender){
    $list_gender = array(
        'male' => 'Nam',
        'female' => 'Nữ'
    );
    echo $list_gender[$gender];

}
