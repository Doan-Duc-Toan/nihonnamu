<?php get_header() ?>
<div id="wr-content">
    <?php get_sidebar_info() ?>
    <div id="content">
        <div id="update_info">
            <h5>Cập nhật thông tin</h5>
            <form action="" class="form-group" method="POST" enctype="multipart/form-data">
                <div id="img_user">
                    <div class="cover_image">
                        <label for="cover_img">Ảnh bìa</label>
                        <input type="file" name="cover_img" id="cover_img">
                        <img src="public/images/demo/cover_image.jpg" alt="">
                    </div>
                    <div class="image_avatar">
                        <label for="img_avatar">Ảnh đại diện</label>
                        <input type="file" name="img_avatar" id="img_avatar">
                        <img src="public/images/demo/avatar.jpg" alt="">
                    </div>
                    <button name="upload_img_user" class="btn-secondary rounded">Upload Ảnh</button>
                </div>
                <label for="fullname">Họ và tên</label>
                <input type="text" name="fullname" id="fullname" class="form-control" readonly value="Phạm Minh Anh"><br>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" readonly value="Admin"><br>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" readonly value="toanymanh@gmail.com"><br>
                <label for="phone_number">Số điện thoại</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control"><br>
                <label for="address">Địa chỉ</label><br>
                <textarea name="address" class="form-control" id="address"></textarea><br><br>
                <button name="btn_update" class="btn-primary rounded">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
<?php get_footer() ?>