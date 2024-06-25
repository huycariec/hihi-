<body>
    <div class="container-admin">
        <?php
    require_once 'views/sidebar.php';
    ?>
        <div class="col-2-admin">
            <div class="commodities-title">
                <h4>Quản lí danh mục<h4>
            </div>
            <div class="commodities-container">
                <div class="function-commodities">
                    <button class="add-commodities" type="submit"><a href="index.php?act=addCategory">Tạo danh mục
                            mới</a>
                    </button>
                </div>
                <div class="line-commodities"></div>
                <div class="table-commodities">
                    <table class="commodities">
                        <thead>
                            <tr>
                                <th>Mã danh mục</th>
                                <th>Tên danh mục</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="product-list">
                            <?php foreach ($listdm as $value) {
                        extract($value);
                        $path_edit = 'index.php?act=editCategory&id=' . $id_category;
                        $path_del = 'index.php?act=del-dm&id=' . $id_category;
                        echo '
                            <tr>
                        
                        <td>' . $id_category . '</td>
                        <td>' . $name_category . '</td>
                        <td>'
                        ;?>
                            <button class="delete">
                                <a href="javascript:confirmDeleTe('<?php echo $path_del?>')"><i
                                        class="fas fa-trash-alt"></i></a>
                            </button>
                            <button class="edit">
                                <a href="<?php echo $path_edit?>"><i class="fas fa-edit"></i></a>
                            </button>
                            </td>
                            </tr>
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