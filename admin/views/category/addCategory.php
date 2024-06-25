<body>
    <div class="container-admin">
        <?php
    require_once 'views/sidebar.php';
    ?>
        <div class="col-2-admin">
            <div class="commodities-title">
                <h4>Thêm danh mục<h4>
            </div>
            <div class="notification"></div>
            <div class="table-commodities">
                <form enctype="multipart/form-data" action="index.php?act=addCategory" method="post">
                    <table class="commodities">
                        <tbody class="product-list">
                            <tr>
                                <td>Tên danh mục</td>
                                <td><input name="name-category" type="text"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="add">
                        <button class="btn-list" type="submit"><a href="index.php?act=listCategory">Danh
                                mục</a></button>
                        <button name="btn-add" class="btn-add" type="submit">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>