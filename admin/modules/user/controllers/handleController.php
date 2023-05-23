<?php
function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

#Xử lý cập nhật lại thông tin cho list user
function user_updateAction()
{
    $user = get_user_by_username($_SESSION['username']);
    //Kiểm tra quyền user
    if (check_privilege($user['privilege'], get_module(), get_action())) {
        //Kiểm tra xem có yêu cầu xử lý hoặc có tồn tại id user trên url hay không để xử lý
        if (!empty($_SESSION['processing_user']) || !empty($_GET['id'])) {
            //Lấy danh sách user cần xử lý
            global $list_user, $num_page, $num_user, $num_user_per_page, $current_page, $user;
            if (!empty($_GET['id']))
                if (empty($_SESSION['list_user_handle']) || !in_array(get_user_by_id($_GET['id']), $_SESSION['list_user_handle']))
                    $_SESSION['list_user_handle'][] = get_user_by_id($_GET['id']);
            $list_user = $_SESSION['list_user_handle'];
            //Lấy dữ liệu cho thành phân trang(Mỗi user xử lý trong 1 trang)
            $num_user = count($list_user);
            $num_user_per_page = 1;
            $num_page = $num_user;
            $current_page = empty($_GET['page']) ? 1 : $_GET['page'];
            $user = get_user_by_username($list_user[$current_page - 1]['username']);
            //Kiểm tra xem đã nhấn button btn_update hay chưa
            if (isset($_POST['btn_update'])) {
                global $error, $email, $phone_number, $fullname;
                // Xử lý validation form
                if (!empty($_POST['email'])) {
                    if ($_POST['email'] != $user['email']) {
                        if (is_email($_POST['email'])) {
                            $email = $_POST['email'];
                            if (check_isset_data('email'))
                                $error['email'] = "Email đã được đăng kí";
                        } else
                            $error['email'] = "Email không đúng định dạng";
                    } else
                        $email = $user['email'];
                } else $error['email'] = "Không được để trống Email";


                if (!empty($_POST['phone_number'])) {
                    if ($_POST['phone_number'] != $user['phone_number']) {
                        if (is_phone_number($_POST['phone_number'])) {
                            $phone_number = $_POST['phone_number'];
                            if (check_isset_data('phone_number'))
                                $error['phone_number'] = "Số điện thoại đã được đăng kí";
                        } else
                            $error['phone_number'] = "Số điện thoại không đúng định dạng";
                    } else
                        $phone_number = $user['phone_number'];
                } else
                    $error['phone_number'] = "Không được để trống số điện thoại";


                if (!empty($_POST['privilege'])) {
                    $privilege = $_POST['privilege'];
                } else $error['privilege'] = "Bạn cần chọn quyền cho người dùng";
                if (empty($error)) {
                    $data_user_update = array(
                        '`email`' => $email,
                        '`phone_number`' => $phone_number,
                        '`privilege`' => $privilege,
                    );
                    db_update('tbl_users', $data_user_update, "`username`='{$user['username']}'");
                    $user = get_user_by_username($list_user[$current_page - 1]['username']);
                    global $notify;
                    $notify['success'] = "Cập nhật thông tin thành công";
                }
            }
            // Nếu đã nhấn button hoàn thành thì xoá hết các session xử lý đi
            if (isset($_POST['btn_success'])) {
                unset($_SESSION['processing_user']);
                unset($_SESSION['list_user_handle']);
                redirect_to('user', 'index', 'list_user');
            }
            load_view('user_update');
        } else redirect_to('user', 'index', 'list_user');
    } else
        redirect_to('not_have_access');
}

#Xoá user hiện tại
function user_deleteAction()
{
    $user = get_user_by_username($_SESSION['username']);
    //Kiểm tra quyền user
    if (check_privilege($user['privilege'], get_module(), get_action())) {
        //Nếu đã có yêu cầu xử lý hoặc tồn tại id trên url thì xử lý
        if (!empty($_SESSION['processing_user']) || !empty($_GET['id'])) {
            //Lấy danh sách user cần xử lsy
            global $list_user_handle;
            if (!empty($_GET['id']))
                if (empty($_SESSION['list_user_handle']) || !in_array(get_user_by_id($_GET['id']), $_SESSION['list_user_handle']))
                    $_SESSION['list_user_handle'][] = get_user_by_id($_GET['id']);
            $list_user_handle = $_SESSION['list_user_handle'];
            $num_user = count($list_user_handle);
            //Nếu đã nhấn button btn_confim_delete
            if (isset($_POST['btn_confim_delete'])) {
                foreach ($list_user_handle as $user_handle) {
                    $data_delete = array(
                        '`id`' => $user_handle['id'],
                        '`username`' => $user_handle['username'],
                        '`password`' => $user_handle['password'],
                        '`email`' => $user_handle['email'],
                        '`phone_number`' => $user_handle['phone_number'],
                        '`privilege`' => $user_handle['privilege'],
                        '`fullname`' => $user_handle['fullname'],
                        '`date_created`' => $user_handle['date_created'],
                        '`avatar`' => $user_handle['avatar'],
                        '`cover_image`' => $user_handle['cover_image'],
                        '`address`' => $user_handle['address'],
                        '`gender`' => $user_handle['gender'],
                        '`date_deleted`' => date("d/m/Y h:m")
                    );
                    //Xoá khỏi bảng tbl_users và cập nhật user đã xoá vào bảng tbl_users_deleted
                    db_insert('`tbl_users_deleted`', $data_delete);
                    $id = $user_handle['id'];
                    db_delete('`tbl_users`', "`id` = '{$id}'");
                }
                //Xoá session xử lý và về trang list_user
                unset($_SESSION['processing_user']);
                unset($_SESSION['list_user_handle']);
                redirect_to('user', 'index', 'list_user');
            }
            //Nếu đã nhấn btn_cancel thì xoá session xử lý và về trang list_user
            if (isset($_POST['btn_cancel'])) {
                unset($_SESSION['processing_user']);
                unset($_SESSION['list_user_handle']);
                redirect_to('user', 'index', 'list_user');
            }
            load_view('confim_delete');
        } else redirect_to('user', 'index', 'list_user');
    } else
        redirect_to('not_have_access');
}

#Restore những user đã bị xoá
function user_restoreAction()
{
    $user = get_user_by_username($_SESSION['username']);
    //Kiểm tra quyền user
    if (check_privilege($user['privilege'], get_module(), get_action())) {
        //Kiểm tra xem có yêu cầu xử lý hoặc tồn tại id trên url hay không
        if (!empty($_SESSION['processing_user']) || !empty($_GET['id'])) {
            //Lấy danh sách user cần xử lý
            global $list_user_handle;
            if (!empty($_GET['id']))
                if (empty($_SESSION['list_user_handle']) || !in_array(get_user_by_id($_GET['id'], 'tbl_users_deleted'), $_SESSION['list_user_handle']))
                    $_SESSION['list_user_handle'][] = get_user_by_id($_GET['id'], 'tbl_users_deleted');
            $list_user_handle = $_SESSION['list_user_handle'];
            $num_user = count($list_user_handle);
            if (isset($_POST['btn_confim_restore'])) {
                foreach ($list_user_handle as $user_handle) {
                    $data_restore = array(
                        '`id`' => $user_handle['id'],
                        '`username`' => $user_handle['username'],
                        '`password`' => $user_handle['password'],
                        '`email`' => $user_handle['email'],
                        '`phone_number`' => $user_handle['phone_number'],
                        '`privilege`' => $user_handle['privilege'],
                        '`fullname`' => $user_handle['fullname'],
                        '`date_created`' => $user_handle['date_created'],
                        '`avatar`' => $user_handle['avatar'],
                        '`cover_image`' => $user_handle['cover_image'],
                        '`address`' => $user_handle['address'],
                        '`gender`' => $user_handle['gender'],
                    );
                    //Thêm user vào tbl_users và xoá khỏi tbl_users_deleted
                    db_insert('`tbl_users`', $data_restore);
                    $id = $user_handle['id'];
                    db_delete('`tbl_users_deleted`', "`id` = '{$id}'");
                }
                //Xoá session xử lý và về trang list_user
                unset($_SESSION['processing_user']);
                unset($_SESSION['list_user_handle']);
                redirect_to('user', 'index', 'list_user');
            }
            // Nếu đã nhấn button btn_cancel thì xoá session xử lý và về trang list_user
            if (isset($_POST['btn_cancel'])) {
                unset($_SESSION['processing_user']);
                unset($_SESSION['list_user_handle']);
                redirect_to('user', 'index', 'list_user');
            }
            load_view('confim_restore');
        } else redirect_to('user', 'index', 'list_user');
    } else
        redirect_to('not_have_access');
}

#Xoá vĩnh viễn user và dữ liệu liên quan
function user_delete_foreverAction()
{
    $user = get_user_by_username($_SESSION['username']);
    //Kiểm tra quyền user
    if (check_privilege($user['privilege'], get_module(), get_action())) {
        //Nếu tồn tại yêu cầu xử lý hoặc tồn tại id trên url thì xử lý 
        if (!empty($_SESSION['processing_user']) || !empty($_GET['id'])) {
            //Lấy danh sách user cần xử lý
            global $list_user_handle;
            if (!empty($_GET['id']))
                if (empty($_SESSION['list_user_handle']) || !in_array(get_user_by_id($_GET['id'], 'tbl_users_deleted'), $_SESSION['list_user_handle']))
                    $_SESSION['list_user_handle'][] = get_user_by_id($_GET['id'], 'tbl_users_deleted');
            $list_user_handle = $_SESSION['list_user_handle'];
            $num_user = count($list_user_handle);
            if (isset($_POST['btn_confim_delete_forever'])) {
                foreach ($list_user_handle as $user_handle) {
                    $id = $user_handle['id'];
                    $folder_name = "public/images/users/" . $user_handle['username'] . "-" . $user_handle['id'];
                    //Xoá user trong bảng tbl_users_deleted và dữ liệu liên quan
                    if(is_dir($folder_name))rmdir($folder_name);
                    db_delete('`tbl_users_deleted`', "`id` = '{$id}'");
                    
                }
                //xoá session xử lý và về trang list_user
                unset($_SESSION['processing_user']);
                unset($_SESSION['list_user_handle']);
                redirect_to('user', 'index', 'list_user');
            }
            //nếu đã nhấn button btn_cancel thì xoá session xử lý và về trang list_user
            if (isset($_POST['btn_cancel'])) {
                unset($_SESSION['processing_user']);
                unset($_SESSION['list_user_handle']);
                redirect_to('user', 'index', 'list_user');
            }
            load_view('confim_delete_forever');
        } else redirect_to('user', 'index', 'list_user');
    } else
        redirect_to('not_have_access');
}
