<?php get_header() ?>
<div id="wr-content">
    <?php get_sidebar() ?>
    <div id="content">
        <div class="content_top">
            <h5>Danh sách sản phẩm</h5>
            <form class="form-group" method="GET">
                <input type="text" class="form-control" name="search" id="search" placeholder="Tìm kiếm">
                <button class="btn-primary rounded">Tìm kiếm</button>
            </form>
        </div>
        <div id="list_order">
            <form class="form-group">
                <div id="order_status">
                    <a href="">Đã được duyệt(135)</a>
                    <a href="">Đang xử lý(243)</a>
                    <a href="">Đã huỷ(18)</a>
                </div>
                <div id="select_action">
                    <select class="form-control" name="select_check_order" id="select_check_order">
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
                            <td>Mã</td>
                            <td>Khách hàng</td>
                            <td>Ảnh</td>
                            <td>Tên sản phẩm</td>
                            <td>Số lượng</td>
                            <td>Giá</td>
                            <td>Ngày mua</td>
                            <td>Trạng thái</td>
                            <td>Tác vụ</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>1</td>
                            <td>1212</td>
                            <td>Đoàn Đức Toàn 20215148</td>
                            <td><img src="public/images/demo/demo.jpg" alt=""></td>
                            <td><a href="">Kimono trong lễ hội mùa hè 2022</a></td>
                            <td>1</td>
                            <td>27.500 yên</td>
                            <td>11/21/2022 10:12</td>
                            <td class="still"><span class="rounded">hoàn thành</span></td>
                            <td>
                                <a href=""><i class="fa-solid fa-notes-medical node"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>1</td>
                            <td>1212</td>
                            <td>Đoàn Đức Toàn 20215148</td>
                            <td><img src="public/images/demo/demo.jpg" alt=""></td>
                            <td><a href="">Kimono trong lễ hội mùa hè 2022</a></td>
                            <td>1</td>
                            <td>27.500 yên</td>
                            <td>11/21/2022 10:12</td>
                            <td class="still"><span class="rounded">hoàn thành</span></td>
                            <td>
                                <a href=""><i class="fa-solid fa-notes-medical node"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>1</td>
                            <td>1212</td>
                            <td>Đoàn Đức Toàn 20215148</td>
                            <td><img src="public/images/demo/demo.jpg" alt=""></td>
                            <td><a href="">Kimono trong lễ hội mùa hè 2022</a></td>
                            <td>1</td>
                            <td>27.500 yên</td>
                            <td>11/21/2022 10:12</td>
                            <td class="still"><span class="rounded">hoàn thành</span></td>
                            <td>
                                <a href=""><i class="fa-solid fa-notes-medical node"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>1</td>
                            <td>1212</td>
                            <td>Đoàn Đức Toàn 20215148</td>
                            <td><img src="public/images/demo/demo.jpg" alt=""></td>
                            <td><a href="">Kimono trong lễ hội mùa hè 2022</a></td>
                            <td>1</td>
                            <td>27.500 yên</td>
                            <td>11/21/2022 10:12</td>
                            <td class="still"><span class="rounded">hoàn thành</span></td>
                            <td>
                                <a href=""><i class="fa-solid fa-notes-medical node"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>1</td>
                            <td>1212</td>
                            <td>Đoàn Đức Toàn 20215148</td>
                            <td><img src="public/images/demo/demo.jpg" alt=""></td>
                            <td><a href="">Kimono trong lễ hội mùa hè 2022</a></td>
                            <td>1</td>
                            <td>27.500 yên</td>
                            <td>11/21/2022 10:12</td>
                            <td class="still"><span class="rounded">hoàn thành</span></td>
                            <td>
                                <a href=""><i class="fa-solid fa-notes-medical node"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>1</td>
                            <td>1212</td>
                            <td>Đoàn Đức Toàn 20215148</td>
                            <td><img src="public/images/demo/demo.jpg" alt=""></td>
                            <td><a href="">Kimono trong lễ hội mùa hè 2022</a></td>
                            <td>1</td>
                            <td>27.500 yên</td>
                            <td>11/21/2022 10:12</td>
                            <td class="still"><span class="rounded">hoàn thành</span></td>
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