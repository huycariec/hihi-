<body>
    <div class="container-admin">
        <?php
    require_once 'views/sidebar.php';
    ?>
        <div class="col-2-admin">
            <div class="commodities-title">
                <h4>Thêm khách hàng<h4>
            </div>

            <div class="table-commodities">
                <form enctype="multipart/form-data" action="index.php?act=addUser" method="post">
                    <table class="commodities">
                        <tbody class="product-list">
                            <tr>
                                <td>Họ và tên</td>
                                <td><input name="name" value="" type="text"></td>
                            </tr>
                            <tr>
                                <td>Ảnh</td>
                                <td><input name="img" value="" type="file"></td>
                            </tr>
                            <tr>
                                <td>Tên tài khoản</td>
                                <td><input name="account" value="" type="text" accept="uploads/*"></td>
                            </tr>
                            <tr>
                                <td>Mật khẩu</td>
                                <td><input name="pass" value="" type="text"></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td><input name="address" value="" type="text"></td>
                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td><input name="phone" value="" type="text"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input name="email" value="" type="text"></td>
                            </tr>
                            <tr>
                                <td>Vai trò</td>

                                <td>
                                    <div class="radio">
                                        <label for="">Khách hàng</label>
                                        <input name="role" type="radio" checked value="0">
                                        <label for="">Quản trị viên</label>
                                        <input name="role" type="radio" value="1">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                        </tbody>

                    </table>
                    <div class="add">
                        <button class="btn-list" type="submit"><a href="index.php?act=listUser">Danh sách khách hàng</a>
                        </button>
                        <button name="btn-add" class="btn-add" type="submit">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>