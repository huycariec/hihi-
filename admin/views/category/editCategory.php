<body>
    <div class="container-admin">
        <?php
    require_once 'views/sidebar.php';
    ?>
        <div class="col-2-admin">
            <div class="commodities-title">
                <h4>Sửa danh mục<h4>
            </div>
            <div class="notification"></div>
            <div class="table-commodities">
                <form action="index.php?act=update-dm" method="post">
                    <table class="commodities">
                        <tbody class="product-list">
                            <tr>
                                <td>Tên danh mục</td>
                                <td><input name="name-category" value="<?php echo $listdm['name_category'] ?>"
                                        type="text"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="add">
                        <input type="hidden" name="id" value="<?php echo $listdm['id_category'] ?>">
                        <button class="btn-list" type="submit"><a href="index.php?act=listCategory">Danh
                                mục</a></button>
                        <button name="btn-edit" class="btn-add" type="submit">Sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>