<section class="main-body">
    <div class="banner">
        <div class="slide active">
            <a href=""><img src="image/Banner.png" alt=""></a>
        </div>
<!--        <div class="slide active">-->
<!--            <a href=""><img style="margin: auto;width: 1200px;margin-top: 40px" src="image/banner.jpeg" alt=""></a>-->
<!--        </div>-->
<!--        <div class="slide active">-->
<!--            <img style="margin: auto;width: 1200px;margin-top: 40px" src="image/banner-2.jpeg" alt="">-->
<!--        </div>-->
    </div>
    <main>
        <section class="main">
            <!-- --------------------- -->
            <div class="new">
                <div class="title-container">
                    <div class="line"></div>
                    <h1 class="title-main">SẢN PHẨM NỔI BẬT</h1>
                    <div class="line"></div>
                </div>


                <div class="product-container">
                    <div class="row-product">

                        <?php foreach ($listsp as $product) {
                            extract($product);
                            $money = (($price - $discount) / $price) * 100;
                            $persent = round($money, 0);
                            $path_deltail = 'index.php?act=deltailProduct&id=' . $id_product;
                            echo '
                                             <div class="product">';

                            if ($discount != 0) {
                                echo '<span class="discount">Giảm ' . $persent . '%</span>';
                            }
                            echo '
                                            <div class="img-product">
                                                <a href="' . $path_deltail . '"><img src="upload/' . $img_product . '" alt=""></a>
                                            </div>
                                            <div class="price-product">' ?>
                        <?php
                            if ($discount == 0) {
                                echo '<div class="price-new">' . number_format($price, 0, '.', '.') . '<p> VNĐ</p>';
                            } else {
                                echo '<s class="price-old">' . number_format($price, 0, '.', '.') . '<p>VNĐ</p></s>
                                                      <div class="price-new">' . number_format($discount, 0, '.', '.') . '<p>VNĐ</p>
                                                     ';
                            } ?>
                    </div>
                </div>
                <h4><a href="<?= $path_deltail ?>">
                        <?= $name_product ?>
                    </a></h4>
            </div>

            <?php
                        } ?>
            </div>
            </div>
            </div>
            <!-- --------------------- -->
            <div class="new">
                <div class="title-container">
                    <div class="line"></div>
                    <h1 class="title-main">SẢN PHẨM MỚI NHẤT</h1>
                    <div class="line"></div>
                </div>

                <div class="product-container">
                    <div class="row-product">
                        <?php foreach ($listsp as $product) {
                            extract($product);
                            $money = (($price - $discount) / $price) * 100;
                            $persent = round($money, 0);
                            $path_deltail = 'index.php?act=deltailProduct&id=' . $id_product;
                            echo '
                                             <div class="product">';

                            if ($discount != 0) {
                                echo '<span class="discount">Giảm ' . $persent . '%</span>';
                            }
                            echo '
                                            <div class="img-product">
                                                <a href="' . $path_deltail . '"><img src="upload/' . $img_product . '" alt=""></a>
                                            </div>
                                            <div class="price-product">' ?>
                        <?php
                            if ($discount == 0) {
                                echo '<div class="price-new">' . number_format($price, 0, '.', '.') . '<p> VNĐ</p>';
                            } else {
                                echo '<s class="price-old">' . number_format($price, 0, '.', '.') . '<p>VNĐ</p></s>
                                                      <div class="price-new">' . number_format($discount, 0, '.', '.') . '<p>VNĐ</p>
                                                     ';
                            } ?>
                    </div>
                </div>
                <h4><a href="<?= $path_deltail ?>">
                        <?= $name_product ?>
                    </a></h4>
            </div>

            <?php
                        } ?>
            </div>
            </div>
            </div>
            <!-- --------------------- -->
            <div class="new">
                <div class="title-container">
                    <div class="line"></div>
                    <h1 class="title-main">PHỤ KIỆN ĐIỆN THOẠI</h1>
                    <div class="line"></div>
                </div>

                <div class="product-container">
                    <div class="row-product">
                        <?php foreach ($listpk as $pk) {
                    extract($pk);
                    $money = (($price - $discount) / $price) * 100;
                    $persent = round($money, 0);
                    $path_deltail = 'index.php?act=deltailProduct&id=' . $id_product;
                    echo '
                            <div class="product">';
                            if ($discount != 0) {
                            echo '<span class="discount">Giảm ' . $persent . '%</span>';
                            }
                            echo '
                            <div class="img-product">
                            <a href="' . $path_deltail . '"><img src="upload/' . $img_product . '" alt=""></a>
                            </div>
                            <div class="price-product">' ?>
                            <?php
                            if ($discount == 0) {
                            echo '<div class="price-new">' . number_format($price, 0, '.', '.') . '<p> VNĐ</p>';
                            } else {
                            echo '<s class="price-old">' . number_format($price, 0, '.', '.') . '<p>VNĐ</p></s>
                            <div class="price-new">' . number_format($discount, 0, '.', '.') . '<p>VNĐ</p>
                            ';} ?>
                    </div>
                </div>
                <h4><a href="<?= $path_deltail ?>">
                        <?= $name_product ?>
                    </a></h4>
            </div>

            <?php
                } ?>
            </div>
            </div>
            </div>
            </div>
        </section>
    </main>
</section>