<body>
    <div class="container-admin">
        <?php
    require_once 'views/sidebar.php';
    ?>
        <div class="col-2-admin">
            <div class="commodities-title">
                <h4>Sửa khách hàng<h4>
            </div>
            <div class="notification"></div>
            <div class="table-commodities">
                <?php extract($list_user); ?>
                <form action="index.php?act=updateUser" enctype="multipart/form-data" method="post">
                    <table class="commodities">
                        <tbody class="product-list">
                            <tr>
                                <td>Họ và tên</td>
                                <td><input name="name" value="<?= $name_user ?>" type="text"></td>
                            </tr>
                            <tr>
                                <td>Ảnh</td>
                                <td>
                                    <img width="100px" src="../upload/<?= $img_user ?>" alt="">
                                    <input name="img" type="file">
                                </td>
                            </tr>
                            <tr>
                                <td>Tên tài khoản</td>
                                <td><input name="account" value="<?= $account ?>" type="text"></td>
                            </tr>
                            <tr>
                                <td>Mật khẩu</td>
                                <td><input name="pass" value="<?= $password ?>" type="text"></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td><input name="address" value="<?= $address ?>" type="text"></td>
                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td><input name="phone" value="<?= $phone ?>" type="text"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input name="email" value="<?= $email ?>" type="text"></td>
                            </tr>
                            <tr>
                                <td>Vai trò</td>

                                <td>
                                    <div class="radio">
                                        <label for="">Khách hàng</label>
                                        <input name="role" type="radio" <?php if ($role == 1) {
                                    echo '';
                                } else {
                                    echo 'checked';
                                } ?> value="0">
                                        <label for="">Quản trị viên</label>
                                        <input name="role" type="radio" <?php if ($role == 1) {
                                    echo 'checked';
                                } else {
                                    echo '';
                                } ?> value="1">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                        </tbody>
                    </table>
                    <div class="add">
                        <input type="hidden" name="id" value="<?php echo $id_user ?>">
                        <button class="btn-list" type="submit"><a href="index.php?act=listUser">Danh sách khách hàng</a>
                        </button>
                        <button name="btn-edit" class="btn-add" type="submit">Sửa</button>
                    </div>
                </form>
                <?php ?>
            </div>
        </div>
    </div>
</body>