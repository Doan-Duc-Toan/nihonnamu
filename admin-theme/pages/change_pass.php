<?php get_header() ?>
<div id="wr-content">
    <?php get_sidebar_info() ?>
    <div id="content">
        <div id="change_pass">
            <h5>Đổi mật khẩu</h5>
            <form action="" method="POST" class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu hiện tại">
                <input type="password" class="form-control" name="new_password" placeholder="Nhập mật khẩu mới">
                <input type="password" class="form-control" name="re_enter_new_password" placeholder="Nhập lại mật khẩu mới">
                <button class="btn-primary rounded" name="btn_update">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
<?php get_footer() ?>