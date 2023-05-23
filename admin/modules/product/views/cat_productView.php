<?php get_header() ?>
<div id="wr-content">
    <?php get_sidebar() ?>
    <div id="content" class="cat_product">
        <div id="add_cat_product">
            <form action="" class="form-group">
                <label for="name_cat_product">Tên danh mục</label><br>
                <input type="text" name="name_cat_product" class="form-control" id="name_cat_product" placeholder="Nhập tên danh mục"><br>
                <label for="select_cat_father">Danh mục cha</label><br>
                <select name="select_cat_father" id="select_cat_father" class="form-control">
                    <option value="">Chọn danh mục cha</option>
                    <option value="">Công nghệ</option>
                    <option value="">Thời trang</option>
                    <option value="">Ẩm thực</option>
                </select><br>
                <button name="add_cat_product" class="btn-primary rounded">Thêm mới</button>
            </form>
        </div>
        <div id="list_cat_product">
            <div id="list_cat_product_having">
                <h5>Danh sách các danh mục sản phẩm trên trang web</h5>
                <table>
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Tên danh mục</td>
                            <td>Danh mục cha</td>
                            <td>Ngày tạo</td>
                            <td>Trạng thái</td>
                            <td>Tác vụ</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Phụ kiện laptop</td>
                            <td>Công nghệ</td>
                            <td>11/21/2022 10:12</td>
                            <td class="approved"><span class="rounded">Đã duyệt</span></td>
                            <td>
                                <a href=""><i class="fa-solid fa-notes-medical node"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Công nghệ AI</td>
                            <td>Công nghệ</td>
                            <td>11/21/2022 10:12</td>
                            <td class="approved"><span class="rounded">Đã duyệt</span></td>
                            <td>
                                <a href=""><i class="fa-solid fa-notes-medical node"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Thời trang bãi biển</td>
                            <td>Thời trang</td>
                            <td>11/21/2022 10:12</td>
                            <td class="approved"><span class="rounded">Đã duyệt</span></td>
                            <td>
                                <a href=""><i class="fa-solid fa-notes-medical node"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Những món ăn truyền thống</td>
                            <td>Ẩm thực</td>
                            <td>11/21/2022 10:12</td>
                            <td class="approved"><span class="rounded">Đã duyệt</span></td>
                            <td>
                                <a href=""><i class="fa-solid fa-notes-medical node"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="list_cat_product_browsing">
                <h5>Danh sách các danh mục đang chờ duyệt</h5>
                <table>
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Tên danh mục</td>
                            <td>Danh mục cha</td>
                            <td>Ngày tạo</td>
                            <td>Trạng thái</td>
                            <td>Tác vụ</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Đồ chơi điện tử người lớn</td>
                            <td>Công nghệ</td>
                            <td>11/21/2022 10:12</td>
                            <td class="pending_approval"><span class="rounded">Đang chờ duyệt</span></td>
                            <td>
                                <a href=""><i class="fa-solid fa-check agree"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Món ăn độc và dị</td>
                            <td>Ẩm thực</td>
                            <td>11/21/2022 10:12</td>
                            <td class="pending_approval"><span class="rounded">Đang chờ duyệt</span></td>
                            <td>
                                <a href=""><i class="fa-solid fa-check agree"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Đồ ngủ dễ thương</td>
                            <td>Thời trang</td>
                            <td>11/21/2022 10:12</td>
                            <td class="pending_approval"><span class="rounded">Đang chờ duyệt</span></td>
                            <td>
                                <a href=""><i class="fa-solid fa-check agree"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Trang phục hẹn hò</td>
                            <td>thời trang</td>
                            <td>11/21/2022 10:12</td>
                            <td class="pending_approval"><span class="rounded">Đang chờ duyệt</span></td>
                            <td>
                                <a href=""><i class="fa-solid fa-check agree"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>