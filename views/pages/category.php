<div class="product-container-main">

    <div class="product-col-1">
        <div class="main-product">
            <div class="product-list">
                <?php foreach ($list_sp as $product) {
                extract($product);
                $money = (($price - $discount) / $price) * 100;
                $persent = round($money, 0);
                $path_deltail = 'index.php?act=deltailProduct&id=' . $id_product;
                echo '
                                             <div class="product">';
                if($discount != 0){
                    echo '<span class="discount">Giảm '.$persent.'%</span>';
                }
                echo '
                                            
                                            <div class="img-product">
                                                <a href="' . $path_deltail . '"><img src="upload/' . $img_product . '" alt=""></a>
                                            </div>
                                            <div class="price-product">'?>
                <?php
                if($discount == 0){
                    echo '<div class="price-new">' . number_format($price, 0, '.', '.') . '<p> VNĐ</p>';
                }else{
                    echo '<s class="price-old">' . number_format($price, 0, '.', '.') . '<p>VNĐ</p></s>
                                                      <div class="price-new">' . number_format($discount, 0, '.', '.') . '<p>VNĐ</p>
                                                   ';} ?>



            </div>
        </div>
        <h4><a href="<?= $path_deltail ?>"><?= $name_product?></a></h4>
    </div>

    <?php
    } ?>

</div>
</div>
</div>
<div class="product-col-2">
    <div class="nav-bar-product">
        <ul class="nav-bar-product-menu">
            <?php
            foreach ($list_dm as $category){
                extract($category);

                echo '
            
            <li>
                <img src="image/navbar_1.svg" alt="">
                <a href="index.php?act=category&id='.$id_category.'">'.$name_category.'</a>
            </li>';
            }
            ?>
        </ul>
    </div>
</div>
</div>