<?php

use Symfony\Component\HttpFoundation\RedirectResponse;

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}


//Action Đăng nhập
function loginAction()
{
    if (isset($_POST['btn_login'])) {
        global $username, $password, $error;
        #Xử lý validation form
        if (!empty($_POST['username'])) {
            if (is_username($_POST['username'])) $username = $_POST['username'];
            else $error['username'] = "Tên đăng nhập không đúng định dạng";
        } else $error['username'] = "Không được để trống tên đăng nhập";
        if (!empty($_POST['password'])) {
            if (is_password($_POST['password'])) $password = md5($_POST['password']);
            else $error['password'] = "Mật khẩu không đúng định dạng";
        } else $error['password'] = "Không được để trống mật khẩu";
        if (empty($error)) {
            if (check_login($username, $password)) {
                $user = get_user_by_username($username);
                // show_array($user);
                // setcookie('is_login', true, time() + 3600 * 3 * 365);
                // setcookie('username', $username, time() + 2600 * 3 * 365);
                $_SESSION['username'] = $user['username'];
                $_SESSION['is_login'] = true;
                // Chuyển hướng đến trang chủ
                redirect_to();
            } else $error['login'] = "Tên đăng nhập hoặc mật khẩu không chính xác";
        }
    }
    load_view('login');
}
#Action Thoát
function logoutAction()
{
    #Xoá session và chuyển đến trang login
    unset($_SESSION['user']);
    unset($_SESSION['is_login']);
    session_destroy();
    redirect_to('user', 'index', 'login');
}

#Action hiển thị danh sách người dùng
function list_userAction()
{
    $user = get_user_by_username($_SESSION['username']);
    //Kiểm tra quyển người dùng
    if (check_privilege($user['privilege'], get_module(), get_action())) {
        //Nếu đã nhấn button apply
        if (isset($_POST['btn_apply'])) {
            global $error;
            //Xử lý dữ liệu gửi lên
            if (!empty($_POST['select_check_user'])) {
                if (!empty($_POST['check_user'])) {
                    $_SESSION['processing_user'] = true;
                    $list_check_user = $_POST['check_user'];
                    if (isset($_GET['status']) && $_GET['status'] == 'canceled')
                        $table = 'tbl_users_deleted';
                    else
                        $table = 'tbl_users'; 
                    foreach ($list_check_user as $username) {
                        $list_user_handle[] = get_user_by_username($username,$table);
                    }
                    //Láy dữ liệu người dùng cần xử lý
                    $_SESSION['list_user_handle'] = $list_user_handle;
                    //Chuyển hướng đến trang xử lý từng action tương ứng
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
        //Nếu chưa nhấn button apply hoặc nhấn rồi mà có lỗi hoặc không có dữ liệu cần xử lý thì tải trang list_user
        if (empty($_POST['btn_apply']) || !empty($error) || empty($_SESSION['processing_user'])) {
            global $list_user, $num_page, $num_user_existing, $num_user_canceled, $num_user_per_page, $current_page;
            if (isset($_GET['status']) && $_GET['status'] == 'canceled')
                $list_user = db_fetch_array("SELECT * FROM `tbl_users_deleted`");
            else
                $list_user = db_fetch_array("SELECT * FROM `tbl_users`");
            $num_user = count($list_user);
            $num_user_existing = db_num_rows("SELECT * FROM `tbl_users`");
            $num_user_canceled = db_num_rows("SELECT * FROM `tbl_users_deleted`");
            // Dữ liệu pagination
            $num_user_per_page = 5;
            $num_page = ceil($num_user / $num_user_per_page);
            $current_page = empty($_GET['page']) ? 1 : $_GET['page'];
            load_view('list_user');
        }
    } else
        redirect_to('not_have_access');
}


#Action thêm người dùng
function add_userAction()
{
    $user = get_user_by_username($_SESSION['username']);
    $mod = get_module();
    $action = get_action();
    //Kiểm tra quyền người dùng
    if (!check_privilege($user['privilege'], $mod, $action)) redirect_to('not_have_access');
    else {
        if (isset($_POST['btn_add'])) {
            //Xử lý validation form
            global $error, $username, $email, $phone_number, $fullname, $notify;
            if (!empty($_POST['fullname'])) {
                if (is_fullname($_POST['fullname'])) {
                    $fullname = $_POST['fullname'];
                } else $error['fullname'] = "Họ và tên có những kí tự không được chấp nhận";
            } else $error['fullname'] = "Không được để trống họ và tên";
            if (!empty($_POST['username'])) {
                if (is_username($_POST['username'])) {
                    $username = $_POST['username'];
                    if (check_isset_data('username')) $error['username'] = "Tên đăng nhập đã tồn tại";
                } else $error['username'] = "Tên đăng nhập không đúng định dạng";
            } else $error['username'] = "Không được để trống tên đăng nhập";
            if (!empty($_POST['password'])) {
                if (is_password($_POST['password'])) $password = $_POST['password'];
                else $error['password'] = "Mật khẩu không đúng định dạng";
            } else $error['password'] = "Không được để trống mật khẩu";
            if (!empty($_POST['email'])) {
                if (is_email($_POST['email'])) {
                    $email = $_POST['email'];
                    if (check_isset_data('email')) $error['email'] = "Email đã được đăng kí";
                } else $error['email'] = "Email không đúng định dạng";
            } else $error['email'] = "Không được để trống Email";
            if (!empty($_POST['phone_number'])) {
                if (is_phone_number($_POST['phone_number'])) {
                    $phone_number = $_POST['phone_number'];
                    if (check_isset_data('phone_number')) $error['phone_number'] = "Số điện thoại đã được đăng kí";
                } else $error['phone_number'] = "Số điện thoại không đúng định dạng";
            } else $error['phone_number'] = "Không được để trống số điện thoại";
            if (!empty($_POST['privilege'])) {
                $privilege = $_POST['privilege'];
            } else $error['privilege'] = "Bạn cần chọn quyền cho người dùng mới";
            //Cập nhật dữ liệu người dùng
            if (empty($error)) {
                $data_user_update = array(
                    '`username`' => $username,
                    '`password`' => md5($password),
                    '`email`' => $email,
                    '`phone_number`' => $phone_number,
                    '`privilege`' => $privilege,
                    '`fullname`' => $fullname,
                    '`date_created`' => date("d/m/Y h:m")
                );
                db_insert('`tbl_users`', $data_user_update);
                $subject = "Xin chúc mừng $fullname, bạn đã trở thành một thành viên của mái nhà chung NihonNamu";
                $body = "Bạn đã đăng kí tài khoản thành công với tên đăng nhập là <b>$username</b> và password là <b>$password</b>. Vui lòng không chia sẻ thông tin này cho bất kì ai để tránh xảy ra những trường hợp xấu. Khi nhận được email này, bạn vui lòng đăng nhập <a href = 'http://localhost/NihonNamu/admin/?mod=user&action=login'><b>tại đây</b></a> và đổi mật khẩu khi đã đăng nhập thành công.";
                if (send_mail($username, $email, $subject, $body)) {
                    $notify['success'] =  "<br><p>Đã thêm thành viên và gửi thông báo đến $fullname thành công</p>";
                    $username = NULL;
                    $email = NULL;
                    $phone_number = NULL;
                    $fullname = NULL;
                }
            }
        }
        load_view('add_user');
    }
}


#Action xem thông tin chi tiết bản thân
function user_detailAction()
{
    load_view('user_detail');
}

#Action cập nhật thông tin
function info_updateAction()
{
    if (isset($_POST['btn_update']) || isset($_POST['btn_upload_img_user'])) {
        global $error;
        $error = array();
        $img_link = array();
        //Tạo file chứa ảnh người dùng
        $user = get_user_by_username($_SESSION['username']);
        $user_update = array();
        $upload_dir = "public/images/users/" . $user['username'] . "-" . $user['id'];
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir);
        }
        //Xử lý ảnh bìa
        if (!empty($_FILES['cover_img']['tmp_name'])) {
            $type_cover_img = pathinfo($_FILES['cover_img']['name'], PATHINFO_EXTENSION);
            if (check_type($type_cover_img)) {
                if ($_FILES['cover_img']['size'] < 20971520) {
                    //Tạo đường dẫn file, đuôi file mặc định là jpg
                    $file_name = $user['username'] . "-cover_image.jpg";
                    $upload_file = $upload_dir . "/" . $file_name;
                    if (file_exists($upload_file)) unlink($upload_file);
                    //Upload file ảnh
                    if (!move_uploaded_file($_FILES['cover_img']['tmp_name'], $upload_file))
                        $error['file'] = "Lỗi upload file";
                    else {
                        $user_update['cover_image'] = $upload_file;
                    }
                } else $error['cover_img']['size'] = "Chỉ được upload ảnh dưới 20MB";
            } else  $error['cover_img']['type'] = "Chỉ được upload những file ảnh có đuôi jpg, png, gif, jpeg";
        }
        // Xử lý ảnh đại diện
        if (!empty($_FILES['img_avatar']['tmp_name'])) {
            $type_avatar = pathinfo($_FILES['img_avatar']['name'], PATHINFO_EXTENSION);
            if (check_type($type_avatar)) {
                if ($_FILES['img_avatar']['size'] < 20971520) {
                    //Tạo đường dẫn file, đuôi file mặc định là jpg
                    $file_name = $user['username'] . "-avatar.jpg";
                    $upload_file = $upload_dir . "/" . $file_name;
                    if (file_exists($upload_file)) unlink($upload_file);
                    //Upload file ảnh
                    if (!move_uploaded_file($_FILES['img_avatar']['tmp_name'], $upload_file))
                        $error['file'] = "Lỗi upload file";
                    else {
                        $user_update['avatar'] = $upload_file;
                    }
                } else $error['avatar']['size'] = "Chỉ được upload ảnh dưới 20MB";
            } else $error['avatar']['type'] = "Chỉ được upload những file ảnh có đuôi jpg, png, gif, jpeg";
        }

      //Xử lý address, phone_number, gender
        $user_update['address'] = $_POST['address'];
        if (is_phone_number($_POST['phone_number']))
            $user_update['phone_number'] = $_POST['phone_number'];
        else {
            $error['phone_number'] = "Số điện thoại không đúng định dạng";
        }
        if (!empty($_POST['gender']))
            $user_update['gender'] = $_POST['gender'];
        // echo $user_update['address'];
        // show_array($error);
        // show_array($_POST);
        // show_array($user_update);
        if (empty($error) && !empty($user_update)) {
            user_update($user_update, $user['username']);
        }
    }
    load_view('info_update');
}


#Action đổi mật khẩu
function change_passAction()
{
    if (isset($_POST['btn_change'])) {
        global $error;
        if (!empty($_POST['password'])) {
            // Xử lý validation password
            if (is_password($_POST['password'])) {
                $password  = md5($_POST['password']);
                $user = get_user_by_username($_SESSION['username']);
                if ($password == $user['password']) {
                    //Xử lý new_password
                    if (!empty($_POST['new_password'])) {
                        if (is_password($_POST['new_password'])) $new_password = $_POST['new_password'];
                        else $error['new_password'] = "Mật khẩu mới không đúng định dạng";
                    } else $error['new_password'] = "Bạn chưa nhập mật khẩu mới";
                    // Xử lý re_new_password
                    if (!empty($_POST['re_new_password'])) {
                        if (is_password($_POST['re_new_password'])) $re_new_password = $_POST['re_new_password'];
                        else $error['re_new_password'] = "Mật khẩu mới nhập lại không đúng định dạng";
                    } else $error['re_new_password'] = "Bạn chưa lại nhập mật khẩu mới";
                    if (empty($error)) {
                        //Kiểm tra new_password có bằng re_new_password hay không
                        if ($new_password == $re_new_password) {
                            $user_update['password'] = md5($new_password);
                            user_update($user_update, $_SESSION['username']);
                            global $notify;
                            $notify['change_pass'] = "Bạn đã đổi mật khẩu thành công";
                        } else $error['check'] = "Mật khẩu mới bạn nhập lại không khớp";
                    }
                } else $error['password'] = "Mật khẩu bạn nhập không chính xác";
            } else $error['password'] = "Mật khẩu không đúng định dạng";
        } else $error['password'] = "Bạn chưa nhập mật khẩu hiện tại";
        // show_array($error);
    }
    load_view('change_pass');
}
