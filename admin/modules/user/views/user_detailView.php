<?php  $user = get_user_by_username($_SESSION['username'],'tbl_users'); ?> 
<?php get_header() ?>
<div id="wr-content">
    <?php get_sidebar('info-user')?>
    <div id="content">
        <div id="user_detail" class="rounded">
            <div id="cover_image">
                <a href="">
                    <img class="rounded" src="<?php get_user_field_img($user,'cover_image') ?>" alt="">
                    <?php //show_array($_SESSION['user']); 
                    //get_user_field_img($_SESSION['user'],'cover_image') ?>
                </a>
            </div>
            <div id="avatar">
                <a href="">
                    <img class="rounded-circle" src="<?php get_user_field_img($user,'avatar')?>" alt="">
                </a>
                <span id="fullname"><?php echo get_user_field($user,'fullname'); ?></span>
            </div>
            <div id="detail">
                <span id="username">Username: <b><?php echo get_user_field($user,'username'); ?></b></span>
                <span id="gender">Giới tính: <b><?php $gender = get_user_field($user, 'gender');
                key_to_gender($gender); ?></b></span>
                <span id="email">Email: <b><?php echo get_user_field($user,'email'); ?></b></span>
                <span id="phone_number">Số điện thoại: <b><?php echo get_user_field($user,'phone_number'); ?></b></span>
                <span id="address">Địa chỉ: <b><?php echo get_user_field($user,'address'); ?></b></span>
                <span id="privilege">Quyền: <b style="color: goldenrod;"><?php echo key_to_privilege(get_user_field($user,'privilege')); ?></b></span>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>