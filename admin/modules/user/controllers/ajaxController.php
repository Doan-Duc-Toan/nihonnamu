<?php
function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}
#Action tìm kiếm user ajax 
function search_user_ajaxAction()
{
    if (isset($_GET['status']) && $_GET['status'] == 'canceled')
        $list_user = db_fetch_array("SELECT * FROM `tbl_users_deleted`");
    else
        $list_user = db_fetch_array("SELECT * FROM `tbl_users`");
    $data_search = $_GET['search'];
    foreach ($list_user as $key => $user) {
        $user['privilege'] = key_to_privilege($user['privilege']);
        $user_string = join($user);
        if (strpos($user_string, $data_search)) {
            $result[] = $user;
        }
    }
    echo json_encode($result);
}
