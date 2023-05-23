<?php
get_header();
?>
<div id="wr-content">
    <?php get_sidebar() ?>
    <div id="content">
        <h5 id="add_post_title">Thêm bài viết</h5>
        <form method="POST" id="add_post" class="form-group">
            <label for="select_cat">Chọn danh mục</label><br>
            <select name="select_cat" id="select_cat">
                <option value="0">Chọn danh mục</option>
                <option value="culture">Văn hoá</option>
                <option value="intriguing">Những điều kì thú</option>
                <option value="travel">Du lịch</option>
            </select>
            <select name="select_cat_child" class="select_cat_child" id="select_culture">
                <option value="0">Văn hoá</option>
                <option value="1">Cuộc sống sinh hoạt</option>
                <option value="2">Tín ngưỡng tôn giáo</option>
                <option value="3">Phong tục tập quán</option>
            </select>
            <select name="select_cat_child" class="select_cat_child" id="select_travel">
                <option value="0">Du lịch</option>
                <option value="1">Những bãi biển đẹp</option>
                <option value="2">Du lịch vùng Kanto</option>
                <option value="3">Điêm hấp dẫn của Tokyo</option>
            </select>
            <br><br>
            <label for="post_title">Tiêu đề bài viết</label><br>
            <input type="text" name="post_title" class="form-control" id="post_title" placeholder="Tiêu đề bài viết"><br><br>
            <label for="post_content">Nội dung bài viết</label>
            <textarea id="post_content" class="ckeditor form-control post_content" name="" id="" cols="30" rows="10"></textarea><br>
            <button name="btn_upload" class="btn-primary rounded">Upload</button>
        </form>
    </div>
</div>
<?php get_footer() ?>