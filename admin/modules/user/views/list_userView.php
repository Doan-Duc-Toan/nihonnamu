<?php global $list_user, $num_page, $num_user_per_page, $current_page, $num_user_existing, $num_user_canceled;
$mod = get_module();
$act = get_action();
if (isset($_GET['status']))
    $_SESSION['user_status'] = $_GET['status'];
else
    $_SESSION['user_status'] = 'existing';
$num_box_per_page = 3;
?>
<?php get_header() ?>
<div id="wr-content">
    <?php get_sidebar() ?>
    <div id="content">
        <input style="display:none" id="get_status" value="<?php if (isset($_GET['status']) && $_GET['status'] == 'canceled')
                                                                echo 'canceled';
                                                            else
                                                                echo 'existing'; ?>">
        <div class="content_top">
            <h5>Danh sách thành viên</h5>
            <form class="form-group" method="GET">
                <input type="search" class="form-control" name="keyword" id="search" placeholder="Tìm kiếm">
                <button id="search" name="btn_search" value="search_list_user" class="btn-primary rounded">Tìm kiếm</button>
                <ul id="list_result" class="search_result rounded">
                </ul>
            </form>
        </div>

        <div id="list_user">
            <form class="form-group" method="POST">
                <div id="user_status">
                    <a class="<?php if (!isset($_GET['status']) || $_GET['status'] == 'existing')echo 'active'?>" href="?mod=user&action=list_user&status=existing">Hiện tại (<?php echo $num_user_existing ?>)</a>
                    <a class="<?php if (isset($_GET['status']) && $_GET['status'] == 'canceled')echo 'active' ?>" href="?mod=user&action=list_user&status=canceled">Đã huỷ(<?php echo $num_user_canceled ?>)</a>
                </div>
                <?php if (!empty($list_user)) { ?>
                    <div id="select_action">
                        <select class="form-control" name="select_check_user" id="select_check_user">
                            <option value="0">Chọn</option>
                            <option value="<?php if (isset($_GET['status']) && $_GET['status'] == 'canceled')
                                                echo 'restore';
                                            else echo 'edit' ?>">Tác vụ 1</option>
                            <option value="<?php if (isset($_GET['status']) && $_GET['status'] == 'canceled')
                                                echo 'delete_forever';
                                            else echo 'delete' ?>">Tác vụ 2</option>
                        </select>
                        <button name="btn_apply" value="apply" class="btn-primary rounded">Áp dụng</button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td><input type="checkbox" name="check_all" value="check_all" id="check_all"></td>
                                <td>#</td>
                                <td>Họ và tên</td>
                                <td>Email</td>
                                <td>Số điện thoại</td>
                                <td>Quyền</td>
                                <td>Ngày tạo</td>
                                <td>Tác vụ <?php
                                            ?></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_user as $key => $user) {
                            ?>
                                <?php if (check_element($key + 1, $num_user_per_page, $current_page)) { ?>
                                    <tr>
                                        <td><input type="checkbox" name="check_user[]" value="<?php echo get_user_field($user, 'username') ?>"></td>
                                        <td><?php echo get_user_field($user, 'id') ?></td>
                                        <td><?php echo get_user_field($user, 'fullname') ?></td>
                                        <td><?php echo get_user_field($user, 'email') ?></td>
                                        <td><?php echo get_user_field($user, 'phone_number') ?></td>
                                        <td><?php echo key_to_privilege(get_user_field($user, 'privilege')) ?></td>
                                        <td><?php echo get_user_field($user, 'date_created') ?></td>
                                        <td>
                                            <?php if (!isset($_GET['status']) || $_GET['status'] == 'existing') { ?>
                                                <a href="?mod=user&controller=handle&action=user_update&id=<?php echo get_user_field($user, 'id') ?>"><i class="fa-solid fa-notes-medical node rounded"></i></a>
                                                <a href="?mod=user&controller=handle&action=user_delete&id=<?php echo get_user_field($user, 'id') ?>"><i class="fa-solid fa-trash-can trash rounded"></i></a>
                                            <?php } else { ?>
                                                <a href="?mod=user&controller=handle&action=user_restore&id=<?php echo get_user_field($user, 'id') ?>"><i class="fa-solid fa-window-restore restore rounded"></i></a>
                                                <a href="?mod=user&controller=handle&action=user_delete_forever&id=<?php echo get_user_field($user, 'id') ?>"><i class="fa-solid fa-trash-can trash rounded"></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="pagination">
                        <?php echo pagination_page($mod, $act, $current_page, $num_page, $num_box_per_page); ?>
                    </div>
            </form>
        <?php } ?>
        </div>
    </div>
</div>
<?php get_footer() ?>