<body>
    <div class="container-admin">
        <?php
    require_once 'views/sidebar.php';
    ?>
        <div class="col-2-admin">
            <div class="commodities-title">
                <h4>Sửa hàng hoá<h4>
            </div>
            <div class="notification"></div>
            <div class="table-commodities">
                <form action="index.php?act=updateProduct" method="post" enctype="multipart/form-data">
                    <table class="commodities">
                        <tbody class="product-list">
                            <tr>
                                <td>Tên sản phẩm</td>
                                <td><input value="<?php echo $listsp['name_product'] ?>" name="name-product"
                                        type="text"></td>
                            </tr>
                            <tr>
                                <td>Ảnh</td>
                                <td>
                                    <img src="../upload/<?php echo $listsp['img_product'] ?>" alt="" width="60px">
                                    <input type="file" name="img">
                                </td>
                            </tr>
                            <tr>
                                <td>Giá tiền</td>
                                <td><input value="<?php echo $listsp['price']?>" name="price" type="number"></td>
                            </tr>
                            <tr>
                                <td>Giảm giá</td>
                                <td><input value="<?=$listsp['discount'] ?>" name="discount" type="number"></td>
                            </tr>
                            <tr>
                                <td>Danh mục</td>
                                <td><select style="width: 100%" name="category" id="">
                                        <option value="0"> Chọn danh mục</option>
                                        <?php
                                                                foreach ($listdm as $value) {
                                                                    extract($value);
                                                                    if ($value['id_category'] == $listsp['id_category']) {
                                                                        echo '<option value="' . $id_category . '"selected>' . $name_category . '</option>';
                                                                    } else {
                                                                        echo '<option value="' . $id_category . '">' . $name_category . '</option>';
                                                                    }
                                                                } ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Số lượng</td>
                                <td><input value="<?php echo $listsp['total_quantity'] ?>" name="total_quantity" type="number"></td>
                            </tr>
                            <tr>
                                <td>Chip</td>
                                <td><input value="<?php echo $listsp['chip'] ?>" name="chip" type="text"></td>
                            </tr>
                            <tr>
                                <td>Ram</td>
                                <td><input value="<?php echo $listsp['ram'] ?>" name="ram" type="text"></td>
                            </tr>
                            <tr>
                                <td>Màn hình</td>
                                <td><input value="<?php echo $listsp['screen'] ?>" name="screen" type="text"></td>
                            </tr>
                            <tr>
                                <td>Camera trước</td>
                                <td><input value="<?php echo $listsp['camera'] ?>" name="camera" type="text"></td>
                            </tr>
                            <tr>
                                <td>Camera sau</td>
                                <td><input value="<?php echo $listsp['camera_selfie'] ?>" name="camera_selfie"
                                        type="text"></td>
                            </tr>
                            <tr>
                                <td>Xuất sứ</td>
                                <td><input value="<?php echo $listsp['origin'] ?>" name="origin" type="text"></td>
                            </tr>
                        </tbody>

                    </table>
                    <div class="add">
                        <input type="hidden" name="id" value="<?php echo $listsp['id_product'] ?>">
                        <button class="btn-list" type="submit"><a href="index.php?act=listProduct">Danh sách sản
                                phẩm</a>
                        </button>
                        <button name="btn-edit" class="btn-add" type="submit">Sửa</button>

                    </div>
                </form>
            </div>

        </div>
    </div>
    </div>
</body>