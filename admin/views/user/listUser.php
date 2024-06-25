<body>
    <div class="container-admin">
        <?php
    require_once 'views/sidebar.php';
    ?>
        <div class="col-2-admin">
            <div class="commodities-title">
                <h4>Quản lí khách hàng<h4>
            </div>
            <div class="commodities-container">
                <div class="function-commodities">
                    <button class="add-commodities" type="submit"><a href="index.php?act=addUser">Tạo khách hàng mới</a>
                    </button>
                </div>
                <div class="line-commodities"></div>
                <div class="table-commodities">
                    <table class="commodities">
                        <thead>
                            <tr>

                                <th>Mã khách hàng</th>
                                <th>Ảnh</th>
                                <th>Họ và tên</th>
                                <th>Tên tài khoản</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Vai trò</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <?php foreach ($listUser as $user) {
                        extract($user);
                        $path_edit = 'index.php?act=editUser&id=' . $id_user;
                        $path_del = 'index.php?act=deleteUser&id=' . $id_user;
                        if ($role == 1) {
                            $role_user = "Quản trị viên";
                        } else {
                            $role_user = "Khách hàng";
                        }
                        echo '
                    <tbody class="product-list">
                    <tr>
                        
                        <td>' . $id_user . '</td>
                        <td><img width="100px" src="../upload/'.$img_user.'" alt=""></td>
                        <td>' . $name_user . '</td>
                        <td>' . $account . '</td>
                        <td>' . $email . '</td>
                        <td>' . $phone . '</td>
                        <td>' . $address . '</td>
                        <td>' . $role_user . '</td>
                        ';?>
                        <td>
                            <button class="delete">
                                <a href="javascript:confirmDeleTe('<?php echo $path_del?>')"><i
                                        class="fas fa-trash-alt"></i></a>
                            </button>
                            <button class="edit">
                                <a href="<?php echo $path_edit?>"><i class="fas fa-edit"></i></a>
                            </button>
                        </td>
                        </tr>
                        </tbody>
                        <?php } ?>

                    </table>
                    <div id="pagination"></div>
                </div>
            </div>
        </div>
    </div>
</body>