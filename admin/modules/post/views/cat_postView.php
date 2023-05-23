<?php global $error, $name_cat_post, $list_cat_posts; ?>
<?php get_header() ?>
<div id="wr-content">
    <?php get_sidebar() ?>
    <div id="content" class="cat_post">
        <div id="add_cat_post">
            <form method="POST" class="form-group">
                <label for="name_cat_post">Tên danh mục</label><br>
                <input type="text" name="name_cat_post" class="form-control" value="<?php print_field_ok($error, 'name_cat_post') ?>" id="name_cat_post" placeholder="Nhập tên danh mục"><br>
                <p class="show_error"><?php show_error($error, 'name_cat_post') ?></p>
                <label for="select_cat_father">Danh mục cha</label><br>
                <select name="select_cat_father" id="select_cat_father" class="form-control">
                    <option value="0">Chọn danh mục cha</option>
                    <option value="none">Không</option>
                    <?php if (!empty($list_cat_posts)) {
                        foreach ($list_cat_posts as $cat_post) { ?>
                            <option value="<?php echo $cat_post['id'] ?>"><?php echo str_repeat('---',$cat_post['level']).$cat_post['name_cat'] ?></option>
                    <?php }
                    } ?>
                </select><br>
                <p class="show_error"><?php show_error($error, 'select_cat_father'); ?></p>
                <button name="add_cat_post" value="add_cat" class="btn-primary rounded">Thêm mới</button>
                <p class="show_error"><?php show_error($error, 'add_cat_post') ?></p>
            </form>
        </div>
        <div id="list_cat_post">
            <div id="list_cat_post_having">
                <h5>Danh sách các danh mục trên trang web</h5>
                <table>
                    <thead>
                        <tr>
                            <td>id</td>
                            <td>Tên danh mục</td>
                            <td>Danh mục cha</td>
                            <td>Ngày tạo</td>
                            <td>Tác vụ</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($list_cat_posts)) {
                            foreach ($list_cat_posts as $cat_post) { ?>
                                <tr>
                                    <td><?php echo $cat_post['id'] ?></td>
                                    <td><?php echo str_repeat('---',$cat_post['level'])." ".$cat_post['name_cat'] ?></td>
                                    <td><?php echo get_cat_father_by_id($list_cat_posts, $cat_post['cat_father_id']);?></td>
                                    <td><?php echo $cat_post['created_date'] ?></td>
                                    <td>
                                        <a href=""><i class="fa-solid fa-notes-medical node"></i></a>
                                        <a href=""><i class="fa-solid fa-trash-can trash"></i></a>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
            <!-- <div id="list_cat_post_browsing">
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
            </div> -->
        </div>
    </div>
</div>
<?php get_footer() ?>