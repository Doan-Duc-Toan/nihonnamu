<?php get_header() ?>
<div id="wr-content">
    <?php get_sidebar('info-user') ?>
    <div id="content">
        <div id="change_pass">
            <h5>Đổi mật khẩu</h5>
            <form method="POST" class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu hiện tại">
                <p class="show_error"><?php global $error,$notify; show_error($error,'password') ?></p>
                <input type="password" class="form-control" name="new_password" placeholder="Nhập mật khẩu mới">
                <p class="show_error"><?php  show_error($error,'new_password') ?></p>
                <input type="password" class="form-control" name="re_new_password" placeholder="Nhập lại mật khẩu mới">
                <p class="show_error"><?php  show_error($error,'re_new_password') ?></p>
                <button class="btn-primary rounded" name="btn_change">Cập nhật</button><br>
                <p class="text-success font-italic"><b><?php show_notify($notify,'change_pass') ?></b></p>
                <p class="show_error"><?php show_error($error,'check') ?></p>
            </form>
        </div>
    </div>
</div>
<?php get_footer() ?>