<?php global $error, $username, $phone_number, $email, $notify; ?>
<?php get_header() ?>
<div id="wr-content">
    <?php get_sidebar() ?>
    <div id="content" class="add_user">
        <h5>Thêm thành viên</h5>
        <form action="" class="form-group" method="POST">
            <label for="fullname">Họ và tên</label>
            <input type="text" class="form-control" name="fullname" id="fullname" value="<?php print_field_ok($error, 'fullname') ?>">
            <p class="show_error"><?php show_error($error, 'fullname') ?></p>

            <label for="username">Tên đăng nhập</label>
            <input type="text" class="form-control" name="username" id="username" value="<?php print_field_ok($error, 'username') ?>">
            <p class="show_error"><?php show_error($error, 'username') ?></p>

            <label for="password">Mật khẩu</label>
            <input type="password" class="form-control" name="password" id="password">
            <p class="show_error"><?php show_error($error, 'password') ?></p>

            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="<?php print_field_ok($error, 'email') ?>">
            <p class="show_error"><?php show_error($error, 'email') ?></p>

            <label for="phone_number">Số điện thoại</label>
            <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?php print_field_ok($error, 'phone_number') ?>">
            <p class="show_error"><?php show_error($error, 'phone_number') ?></p>

            <label for="privilege">Nhóm quyền</label>
            <select name="privilege" id="privilege" class="form-control">
                <option value="0">Chọn quyền</option>
                <option value="admintrator">Admintrator</option>
                <option value="editor_post">Editor Post</option>
                <option value="editor_product">Editor Product</option>
            </select><br><br>
            <p class="show_error"><?php show_error($error, 'privilege') ?></p>

            <button class="btn-primary rounded" name="btn_add">Thêm mới</button><br>
            <span class="text-success"><?php show_notify($notify,'success'); ?></span>

        </form>
    </div>
</div>
<?php get_footer() ?>