<?php get_header() ?>
<div id="wr-content">
    <?php get_sidebar() ?>
    <div id="content" class="add_product">
        <h5>Thêm sản phẩm</h5>
        <form class="form-group" method="POST" enctype="multipart/form-data">
            <div id="general_product">
                <div id="product_info">
                    <label for="name_product">Tên sản phẩm</label>
                    <input type="text" name="name_product" id="name_product" class="form-control" placeholder="Nhập tên sản phẩm"><br>
                    <label for="price_product">Giá</label>
                    <input type="text" name="price_product" id="price_product" class="form-control" placeholder="Nhập giá sản phẩm">
                </div>
                <div id="describe">
                    <label for="describe_product">Mô tả sản phẩm</label><br>
                    <textarea name="describe_product" id="describe_product" class="form-control"></textarea>
                </div>
            </div>
            <label for="detail_product">Chi tiết sản phẩm</label>
            <textarea name="detail_product" id="detail_product" class="ckeditor form-control"></textarea>
            <br><br>
            <label for="select_cat">Chọn danh mục</label><br>
            <select class="form-control" name="select_cat" id="select_cat">
                <option value="0">Chọn danh mục</option>
                <option value="technology">Công nghệ</option>
                <option value="fashion">Thời trang</option>
                <option value="cuisine">Ẩm thực</option>
            </select>
            <select  name="select_cat_child" class="form-control select_cat_child" id="select_technology">
                <option value="0">Công nghệ</option>
                <option value="1">Điện thoại</option>
                <option value="2">Laptop</option>
                <option value="3">Máy tính bảng</option>
            </select>
            <select  name="select_cat_child" class="form-control select_cat_child" id="select_fashion">
                <option value="0">Thời trang</option>
                <option value="1">Quẩn áo thương hiệu</option>
                <option value="2">Đồ bơi quyến rũ</option>
                <option value="3">Trang phục theo mùa</option>
            </select>
            <select  name="select_cat_child" class="form-control select_cat_child" id="select_cuisine">
                <option value="0">Ẩm thực</option>
                <option value="1">Món ăn đặc sản</option>
                <option value="2">Ramen</option>
                <option value="3">Đồ ăn vặt</option>
            </select>
            <div id="img_upload">
                <input type="file" name="img_product" id="img_product">
                <button name="upload_img_product" class="btn-secondary rounded">Upload ảnh</button>
                <img src="public/images/demo/demo.jpg" alt="">
            </div>
            <button name="add_product" class="btn-primary rounded">Thêm sản phẩm</button>
        </form>
    </div>
</div>
<?php get_footer() ?>