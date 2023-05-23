<?php get_header() ?>
<div id="wr-content">
    <?php get_sidebar() ?>
    <div id="content">
        <div class="content_top">
            <h5>Danh sách thành viên</h5>
            <form class="form-group" method="GET">
                <input type="text" class="form-control" name="search" id="search" placeholder="Tìm kiếm">
                <button class="btn-primary rounded">Tìm kiếm</button>
            </form>
        </div>
        <div id="list_user">
            <form class="form-group">
                <div id="user_status">
                    <a href="">Hiện tại(135)</a>
                    <a href="">Đang chờ(23)</a>
                    <a href="">Đã huỷ(18)</a>
                </div>
                <div id="select_action">
                    <select class="form-control" name="select_check_user" id="select_check_user">
                        <option>Chọn</option>
                        <option>Tác vụ 1</option>
                        <option>Tác vụ 2</option>
                    </select>
                    <button class="btn-primary rounded">Áp dụng</button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td><input type="checkbox" id="check_all"></td>
                            <td>#</td>
                            <td>Họ và tên</td>
                            <td>Email</td>
                            <td>Số điện thoại</td>
                            <td>Quyền</td>
                            <td>Ngày tạo</td>
                            <td>Tác vụ</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>1</td>
                            <td>Phạm Minh Anh</td>
                            <td><a href="">manhytoan@gmail.com</a></td>
                            <td>0911577985</td>
                            <td>Admintrator</td>
                            <td>05/22/2022 10:12</td>
                            <td>
                                <a href=""><i class="fa-solid fa-notes-medical node"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>2</td>
                            <td>Đoàn Đức Toàn</td>
                            <td><a href="">toanymanh@gmail.com</a></td>
                            <td>0911577985</td>
                            <td>Editor</td>
                            <td>11/21/2022 10:12</td>
                            <td>
                                <a href=""><i class="fa-solid fa-notes-medical node"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>3</td>
                            <td>Đoàn Đức Toàn</td>
                            <td><a href="">toanymanh@gmail.com</a></td>
                            <td>0911577985</td>
                            <td>Editor</td>
                            <td>11/21/2022 10:12</td>
                            <td>
                                <a href=""><i class="fa-solid fa-notes-medical node"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>4</td>
                            <td>Đoàn Đức Toàn</td>
                            <td><a href="">toanymanh@gmail.com</a></td>
                            <td>0911577985</td>
                            <td>Editor</td>
                            <td>11/21/2022 10:12</td>
                            <td>
                                <a href=""><i class="fa-solid fa-notes-medical node"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>5</td>
                            <td>Đoàn Đức Toàn</td>
                            <td><a href="">toanymanh@gmail.com</a></td>
                            <td>0911577985</td>
                            <td>Editor</td>
                            <td>11/21/2022 10:12</td>
                            <td>
                                <a href=""><i class="fa-solid fa-notes-medical node"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>6</td>
                            <td>Đoàn Đức Toàn</td>
                            <td><a href="">toanymanh@gmail.com</a></td>
                            <td>0911577985</td>
                            <td>Editor</td>
                            <td>11/21/2022 10:12</td>
                            <td>
                                <a href=""><i class="fa-solid fa-notes-medical node"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="pagination">
                    <ul>
                        <li class="prev"><a href=""><i class="fa-solid fa-backward"></i></a></li>
                        <li class="pagination_page"><a href="">1</a></li>
                        <li class="pagination_page"><a href="">2</a></li>
                        <li class="pagination_page"><a href="">3</a></li>
                        <li class="next"><a href=""><i class="fa-solid fa-forward"></i></a></li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
</div>
<?php get_footer() ?>