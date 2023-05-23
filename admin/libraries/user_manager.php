<?php

//Hàm kiểm tra login
function is_login()
{
    if (!empty($_SESSION['is_login'])) return true;
    return false;
}

//Hmaf lấy giá trị của 1 trường user
function get_user_field($user, $field)
{
    if (!empty($user[$field])) return $user[$field];
}

//Hàm lấy user bằng username
function get_user_by_username($username,$table = 'tbl_users')
{
    $result = db_fetch_row("SELECT * FROM `$table` WHERE `username` = '$username'");
    return $result;
}

//Hàm lấy user bằng id
function get_user_by_id($id,$table = 'tbl_users')
{
    $result = db_fetch_row("SELECT * FROM `$table` WHERE `id` = '$id'");
    return $result;
}

//Hàm chuyển từ key sang quyền
function key_to_privilege($key)
{
    $list_privileges = array(
        'admintrator' => 'Admintrator',
        'editor_post' => 'Editor Post',
        'editor_product' => 'Editor Product'
    );
    if (array_key_exists($key, $list_privileges)) return $list_privileges[$key];
}

//Hàm kiểm tra quyền user
function check_privilege($privilege, $mod, $action = '')
{
    if ($privilege == 'admintrator') return true;
    if ($mod == 'home') return true;
    $list_action_by_privilege = array(
        'post' => array(
            'list_post' => 'editor_post',
            'add_post' => 'editor_post',
            'cat_post' => 'editor_post'
        ),
        'product' => array(
            'list_product' => 'editor_product',
            'add_product' => 'editor_product',
            'cat_product' => 'editor_product'
        ),
        'order' => array(
            'list_order' => 'editor_product'
        ),
        'user' => array(
            'list_user' => 'admintrator',
            'add_user' => 'admintrator',
            'user_detail' => 'all',
            'info_update' => 'all',
            'change_pass' => 'all',
            'user_update' => 'admintrator',
            'user_delete' => 'admintrator',
            'user_restore' => 'admintrator',
            'user_delete_forever' => 'admintrator'
        ),
        'catalog' => array(
            'search_list_user' => 'admintrator'
        )

    );
    if ($list_action_by_privilege[$mod][$action] == 'all' || $list_action_by_privilege[$mod][$action] == $privilege) return true;
    return false;
}
