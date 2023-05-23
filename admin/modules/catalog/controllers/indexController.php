<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

//Hiển thị và làm việc với danh sách tìm kiếm
function search_list_userAction()
{
    $user = get_user_by_username($_SESSION['username']);
    //Kiểm tra quyền của user
    if (check_privilege($user['privilege'], get_module(), get_action())) {
        //Kiểm tra xem có tồn tại btn_search và keyword hoặc tồn tại id trên url hay không?Nếu tồn tại thì xử lý
        if ((isset($_GET['btn_search']) && !empty($_GET['keyword'])) || !empty($_GET['id'])) {
            //Kiểm tra xem đã nhấn button btn_apply hay chưa (Xử lý giống trong action list_user)
            if (isset($_POST['btn_apply'])) {
                global $error;
                //Kiểm tra xem đã check chọn user hay chưa
                if (!empty($_POST['select_check_user'])) {
                    if (!empty($_POST['check_user'])) {
                        $_SESSION['processing_user'] = true;
                        $list_check_user = $_POST['check_user'];
                        if (isset($_GET['status']) && $_GET['status'] == 'canceled')
                            $table = 'tbl_users_deleted';
                        foreach ($list_check_user as $username) {
                            $list_user_handle[] = get_user_by_username($username, $table);
                        }
                        //Lấy danh sách user cần xử lý và chuyển hướng đến action xử lý tương ứng
                        $_SESSION['list_user_handle'] = $list_user_handle;
                        if ($_POST['select_check_user'] == 'edit') {
                            redirect_to('user', 'handle', 'user_update');
                        }
                        if ($_POST['select_check_user'] == 'delete') {
                            redirect_to('user', 'handle', 'user_delete');
                        }
                        if ($_POST['select_check_user'] == 'restore') {

                            redirect_to('user', 'handle', 'user_restore');
                        }
                        if ($_POST['select_check_user'] == 'delete_forever') {
                            redirect_to('user', 'handle', 'user_delete_forever');
                        }
                    } else
                        $error['check_user'] = "Bạn cần chọn người dùng để áp dụng tác vụ";
                } else
                    $error['select'] = "Bạn chưa lựa chọn tác vụ";
            }
            global $result, $tail;
            // Kiểm tra trên url có id hay không, nếu có thì sẽ lấy user theo id ở bảng status tương ứng;
            if (!empty($_GET['id'])) {
                if (isset($_GET['status']) && $_GET['status'] == 'canceled')
                    $result[] = db_fetch_row("SELECT * FROM `tbl_users_deleted` WHERE `id` = '{$_GET['id']}'");
                else
                    $result[] = db_fetch_row("SELECT * FROM `tbl_users` WHERE `id` = '{$_GET['id']}'");
                $tail = "&id={$_GET['id']}";
            }
            // Kiểm tra xem có keyword trên url hay không, nếu có sẽ lấy user theo keyword owr bảng status tương ứng
            if (!empty($_GET['keyword'])) {
                if (isset($_GET['status']) && $_GET['status'] == 'canceled')
                    $list_user = db_fetch_array("SELECT * FROM `tbl_users_deleted`");
                else
                    $list_user = db_fetch_array("SELECT * FROM `tbl_users`");
                $data_search = $_GET['keyword'];
                //Xử lý tìm kiếm user theo keyword
                foreach ($list_user as $key => $user) {
                    $user['privilege'] = key_to_privilege($user['privilege']);
                    $user_string = join($user);
                    if (strpos($user_string, $data_search)) {
                        $result[] = $user;
                    }
                    $tail = "&keyword={$_GET['keyword']}&btn_search={$_GET['btn_search']}";
                }
            }
            //Nếu chưa nhấn btn_apply hoặc tồn tại lỗi hoặc chưa có yêu cầu xử ký thì sẽ load kết quả tìm kiếm lên 
            if (empty($_POST['btn_apply']) || !empty($error) || empty($_SESSION['processing_user'])) {
                global $num_page, $num_user, $num_user_per_page, $current_page;
                //Dữ liệu pagination
                $num_user = count($result);
                $num_user_per_page = 5;
                $num_page = ceil($num_user / $num_user_per_page);
                $current_page = empty($_GET['page']) ? 1 : $_GET['page'];
                load_view('list_user_result');
            }
        } else redirect_to('user', 'index', 'list_user');
    } else redirect_to('not_have_access');
}
