<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function list_postAction()
{
    load_view('index');
}
function add_postAction()
{
    load_view('add_post');
}
function cat_postAction()
{

    if (isset($_POST['add_cat_post'])) {
        global $error, $name_cat_post;
        if (!empty($_POST['name_cat_post'])) {
            if (is_name($_POST['name_cat_post'])) {
                $name_cat_post = $_POST['name_cat_post'];
                if (!empty($_POST['select_cat_father'])) {
                    $cat_father_id = $_POST['select_cat_father'];
                    if (check_isset_cat($name_cat_post)) {
                        $created_date = date('d/m:/y h:m');
                        $data = array(
                            '`name_cat`' => $name_cat_post,
                            '`cat_father_id`' => $cat_father_id,
                            '`created_date`' => $created_date
                        );
                        add_cat_post($data);
                    } else
                        $error['add_cat_post'] = 'Danh mục đã tồn tại';
                } else
                    $error['select_cat_father'] = 'Bạn chưa chọn danh mục cha cho danh mục này';
            } else
                $error['name_cat_post'] = "Tên danh mục có chứa kí tự không hợp lệ";
        } else
            $error['name_cat_post'] = "Bạn chưa nhập tên danh mục";
    }
    global $list_cat_posts;
    
    $list_cat_posts = get_list_cat_posts();
    $list_cat_posts = tree_cat_posts($list_cat_posts);
    // show_array($list_cat_posts);
    load_view('cat_post');
}
