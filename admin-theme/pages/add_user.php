<?php get_header() ?>
<div id="wr-content">
    <?php get_sidebar() ?>
    <div id="content" class="add_user">
        <h5>Thêm thành viên</h5>
        <form action="" class="form-group" method="POST">
            <label for="username">Tên đăng nhập</label>
            <input type="text" class="form-control" name="user_name" id="user_name">
            <label for="password">Mật khẩu</label>
            <input type="password" class="form-control" name="password" id="password">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email">
            <label for="phone_number">Số điện thoại</label>
            <input type="text" class="form-control" name="phone_number" id="phone_number">
            <label for="privilege">Nhóm quyền</label>
            <select name="privilege" id="privilege" class="form-control">
                <option value="">Chọn quyền</option>
                <option value="">Admintrator</option>
                <option value="">Editor</option>
            </select><br><br>
            <button class="btn-primary rounded">Thêm mới</button>
        </form>
    </div>
</div>
<?php get_footer() ?>