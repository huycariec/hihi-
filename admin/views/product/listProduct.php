<body>
    <div class="container-admin">
        <?php
    require_once 'views/sidebar.php';
    ?>
        <div class="col-2-admin">
            <div class="commodities-title">
                <h4>Quản lí hàng hoá<h4>
            </div>
            <div class="commodities-container">
                <div class="function-commodities">
                    <button class="add-commodities" type="submit"><a href="index.php?act=addProduct">Tạo sản phẩm
                            mới</a>
                    </button>
                </div>
                <div class="line-commodities"></div>
                <div class="table-commodities">
                    <table class="commodities">
                        <thead>
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Giá tiền</th>
                                <th>Giảm giá</th>
                                <th>Danh mục</th>
                                <th>Số lượng</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="product-list">
                            <?php
                    foreach ($listsp as $value) {
                        extract($value);
                        $path_edit = 'index.php?act=editProduct&id=' . $id_product;
                        $path_del = 'index.php?act=deleteProduct&id=' . $id_product;
                        echo '
                    <tr>
                        
                        <td>' . $id_product . '</td>
                        <td>' . $name_product . '</td>
                         <td><img width="70px" src="../upload/' . $img_product . '" alt=""></td>
                        <td>' . number_format($price, 0, '.', '.') . ' VNĐ</td>
                        <td>' . number_format($discount, 0, '.', '.') . ' VNĐ</td>
                        <td>' . $name_category . '</td>
                        <td>' . $total_quantity . '</td>
                        <td>
                                            ';?>

                            <button class="delete">
                                <a href="javascript:confirmDeleTe('<?php echo $path_del?>')"><i
                                        class="fas fa-trash-alt"></i></a>
                            </button>
                            <button class="edit">
                                <a href="<?= $path_edit?>"><i class="fas fa-edit"></i></a>
                            </button>

                            </td>
                            <?php
                    } ?>

                        </tbody>
                    </table>
                    <div id="pagination"></div>
                </div>
            </div>
        </div>
    </div>
</body>