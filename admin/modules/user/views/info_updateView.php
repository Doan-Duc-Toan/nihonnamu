<?php $user = get_user_by_username($_SESSION['username'],'tbl_users'); ?>
<?php get_header() ?>
<div id="wr-content">
    <?php get_sidebar('info-user') ?>
    <div id="content">
        <div id="update_info">
            <h5>Cập nhật thông tin</h5>
            <form action="" class="form-group" method="POST" enctype="multipart/form-data">
                <div id="img_user">
                    <div class="cover_image">
                        <label for="cover_img">Ảnh bìa</label>
                        <input type="file" name="cover_img" id="cover_img">
                        <img class="rounded" src="<?php get_user_field_img($user, 'cover_image') ?>" alt="">
                        <p class="show_error"><?php global $error;
                                                if (isset($error['cover_img'])) {
                                                    show_error($error['cover_img'], 'size');
                                                    show_error($error['cover_img'], 'type');
                                                } ?></p>
                    </div>
                    <div class="image_avatar">
                        <label for="img_avatar">Ảnh đại diện</label>
                        <input type="file" name="img_avatar" id="img_avatar">
                        <img class="rounded" src="<?php get_user_field_img($user, 'avatar') ?>" alt="">
                        <p class="show_error"><?php if (isset($error['avatar'])) {
                                                    show_error($error['avatar'], 'size');
                                                    show_error($error['avatar'], 'type');
                                                } ?></p>
                    </div>
                    <button name="btn_upload_img_user" class="btn-secondary rounded">Cập Nhật</button>
                    <p class="show_error"><?php show_error($error, 'file'); ?></p>
                </div>
                <label for="fullname">Họ và tên</label>
                <input type="text" name="fullname" id="fullname" class="form-control" readonly value="<?php echo get_user_field($user, 'fullname') ?>"><br>

                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" readonly value="<?php echo get_user_field($user, 'username') ?>"><br>

                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" readonly value="<?php echo get_user_field($user, 'email') ?>"><br>
                <label for="male">Nam</label>
                <input type="radio" name="gender" id="male" value="male" class="mr-2"  <?php if(empty(get_user_field($user,'gender')) || get_user_field($user,'gender')=='male') echo "checked" ?>>
                <label for="female">Nữ</label>
                <input type="radio" name="gender" id="female" value="female" class="" <?php if(get_user_field($user,'gender')=='female') echo "checked" ?>><br>
                <label for="phone_number">Số điện thoại</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control" value="<?php echo get_user_field($user, 'phone_number') ?>"><br>
                <p class="show_error"><?php global $error;
                                        show_error($error, 'phone_number') ?></p>

                <label for="address">Địa chỉ</label><br>

                <textarea name="address" class="form-control" id="address"><?php echo get_user_field($user, 'address') ?></textarea><br><br>
                <button name="btn_update" class="btn-primary rounded">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
<?php get_footer() ?>