<?php get_header() ?>
<div id="wr-content">
    <?php get_sidebar() ?>
    <div id="content" class="cat_post">
        <div id="add_cat_post">
            <form action="" class="form-group">
                <label for="name_cat_post">Tên danh mục</label><br>
                <input type="text" name="name_cat_post" class="form-control" id="name_cat_post" placeholder="Nhập tên danh mục"><br>
                <label for="select_cat_father">Danh mục cha</label><br>
                <select name="select_cat_father" id="select_cat_father" class="form-control">
                    <option value="">Chọn danh mục cha</option>
                    <option value="">Văn hoá</option>
                    <option value="">Những điều kì thú</option>
                    <option value="">Học tiếng Nhật</option>
                </select><br>
                <button name="add_cat_post" class="btn-primary rounded">Thêm mới</button>
            </form>
        </div>
        <div id="list_cat_post">
            <div id="list_cat_post_having">
                <h5>Danh sách các danh mục trên trang web</h5>
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
                            <td>Cuộc sống sinh hoạt</td>
                            <td>Văn hoá</td>
                            <td>11/21/2022 10:12</td>
                            <td class="approved"><span class="rounded">Đã duyệt</span></td>
                            <td>
                                <a href=""><i class="fa-solid fa-notes-medical node"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Tín ngưỡng tôn giáo</td>
                            <td>Văn hoá</td>
                            <td>11/21/2022 10:12</td>
                            <td class="approved"><span class="rounded">Đã duyệt</span></td>
                            <td>
                                <a href=""><i class="fa-solid fa-notes-medical node"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Văn hoá Anime</td>
                            <td>Văn hoá</td>
                            <td>11/21/2022 10:12</td>
                            <td class="approved"><span class="rounded">Đã duyệt</span></td>
                            <td>
                                <a href=""><i class="fa-solid fa-notes-medical node"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Những bãi biển đẹp và thơ mộng</td>
                            <td>Du lịch</td>
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
            <div id="list_cat_post_browsing">
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
                            <td>Du lịch vùng Kanto</td>
                            <td>Du lịch</td>
                            <td>11/21/2022 10:12</td>
                            <td class="pending_approval"><span class="rounded">Đang chờ duyệt</span></td>
                            <td>
                                <a href=""><i class="fa-solid fa-check agree"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Tín ngưỡng tôn giáo</td>
                            <td>Văn hoá</td>
                            <td>11/21/2022 10:12</td>
                            <td class="pending_approval"><span class="rounded">Đang chờ duyệt</span></td>
                            <td>
                                <a href=""><i class="fa-solid fa-check agree"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Văn hoá Anime</td>
                            <td>Văn hoá</td>
                            <td>11/21/2022 10:12</td>
                            <td class="pending_approval"><span class="rounded">Đang chờ duyệt</span></td>
                            <td>
                                <a href=""><i class="fa-solid fa-check agree"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Những bãi biển đẹp và thơ mộng</td>
                            <td>Du lịch</td>
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