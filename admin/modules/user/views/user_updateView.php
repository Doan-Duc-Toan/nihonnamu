<?php global $error, $list_user, $num_user, $current_page, $num_page, $notify, $user;
$mod = get_module();
$act = get_action();
$controller = get_controller();
$tail = "&controller=$controller";
$num_box_per_page = 1;
// show_array($user);
?>
<?php get_header() ?>
<div id="wr-content">
    <?php get_sidebar() ?>
    <div id="content" class="update_info">
        <h5>Cập nhật thông tin (<?php echo $num_user ?>)</h5>
        <form action="" class="form-group" method="POST">
            <label for="fullname">Họ và tên</label>
            <input type="text" class="form-control" readonly name="fullname" id="fullname" value="<?php echo get_user_field($user, 'fullname') ?>">
            <p class="show_error"><?php show_error($error, 'fullname') ?></p>

            <label for="username">Tên đăng nhập</label>
            <input type="text" class="form-control" readonly name="username" id="username" value="<?php echo get_user_field($user, 'username') ?>">
            <p class="show_error"><?php show_error($error, 'username') ?></p>
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="<?php echo get_user_field($user, 'email') ?>">
            <p class="show_error"><?php show_error($error, 'email') ?></p>

            <label for="phone_number">Số điện thoại</label>
            <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?php echo get_user_field($user, 'phone_number') ?>">
            <p class="show_error"><?php show_error($error, 'phone_number') ?></p>

            <label for="privilege">Nhóm quyền</label>
            <select name="privilege" id="privilege" class="form-control">
                <option value="0">Chọn quyền</option>
                <option <?php if ($user['privilege'] == 'admintrator') echo 'selected'; ?> value="admintrator">Admintrator</option>
                <option <?php if ($user['privilege'] == 'editor_post') echo 'selected'; ?> value="editor_post">Editor Post</option>
                <option <?php if ($user['privilege'] == 'editor_product') echo 'selected'; ?> value="editor_product">Editor Product</option>
            </select><br>
            <p class="show_error"><?php show_error($error, 'privilege') ?></p>
            <button class="btn-primary rounded" name="btn_update" value="update_user">Cập nhật</button>
            <button class="btn-success rounded" name="btn_success" value="success">Hoàn thành</button>
            <p class="text-success" style="font-style: italic;"><?php show_notify($notify, 'success') ?></p>
            <div class="pagination">
                <?php echo pagination_page($mod, $act, $current_page, $num_page, $num_box_per_page, $tail); ?>
            </div>
        </form>

    </div>
</div>
<?php get_footer() ?>