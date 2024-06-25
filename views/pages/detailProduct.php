<?php
if(isset($list_sp)){
    extract($list_sp);
}

?>

<main class="deltail">
    <div class="container-deltail">
        <form action="index.php?act=addToCart" method="post">
            <input name="id_product" value="<?=$id_product ?>" type="hidden">
            <input name="name_product" value="<?=$name_product ?>" type="hidden">
            <input name="img_product" value="<?=$img_product ?>" type="hidden">
            <input name="price" value="<?=$price ?>" type="hidden">
            <input name="discount" value="<?=$discount ?>" type="hidden">
            <input name="chip" value="<?=$chip ?>" type="hidden">
            <input name="ram" value="<?=$ram ?>" type="hidden">
            <input name="screen" value="<?=$screen ?>" type="hidden">
            <input name="camera" value="<?=$camera ?>" type="hidden">
            <input name="camera_selfie" value="<?=$camera_selfie ?>" type="hidden">
            <input name="origin" value="<?=$origin ?>" type="hidden">
            <div class="row-1-deltail">
                <div></div>
                <div class="col-1-deltail">
                    <div class="img-deltail">
                        <div class="img-deltail-for">
                            <div class="img-deltail-content">
                                <img src="upload/<?= $img_product ?>" alt="">
                            </div>
                        </div>
                        <div class="img-deltail-nav">
                            <div class="img-deltail-content">
                                <img src="upload/<?= $img_product ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="information-deltail">
                        <h1><?= $name_product ?></h1>
                        <div class="deltail-content">
                            <?php
                        if($id_category == 7){?>
                            <ul>
                                <li><span><strong>Thể loại:</strong>Phụ Kiện</span></li>
                                <li><span><strong>Sử dụng cho thiết bị:</strong>iPhone, iPad, Macbook</span></li>
                                <li><span><strong>Cam kết:</strong>Hàng chính hãng</span></li>
                                <li><span><strong>Bảo hành:</strong>12 tháng</span></li>
                            </ul>

                            <?php }else{ ?>
                            <ul>
                                <li><span><strong>Chip:</strong><?= $chip ?></span></li>
                                <li><span><strong>Ram:</strong><?= $ram ?></span></li>
                                <li><span><strong>Màn hình:</strong><?= $screen ?></span></li>
                                <li><span><strong>Camera sau</strong><?= $camera ?></span></li>
                                <li><span><strong>Camera trước:</strong><?= $camera_selfie ?></span></li>
                                <li><span><strong>Xuất xứ:</strong><?= $origin ?></span></li>
                                <li><span><strong>Dung lượng:</strong>1.24kg</span></li>
                                <li><span><strong>Màu sắc:</strong>MLY13 (Starlight)</span></li>
                            </ul>

                            <?php } ?>
                        </div>
                        <div class="price-deltail">

                            <?php
                        if($discount == 0){
                            echo '<div class="price-new-deltail">' . number_format($price, 0, '.', '.') . '
                            <p>VNĐ</p>
                        </div>';
                        }else{
                            echo '<s class="price-old-deltail">' . number_format($price, 0, '.', '.') . '<p>VNĐ</p></s>
                        <div class="price-new-deltail">' . number_format($discount, 0, '.', '.') . '
                            <p>VNĐ</p>
                        </div>
                            ';}
                        ?>

                        </div>
                        <div class="btn-add-buy">
                            <button data-id="<?= $id_product ?>" onclick="addToCart(<?= $id_product ?>, '<?= $name_product ?>', <?= $price ?>, <?= $img_product ?>)" name="btnAddToCart" class="add-product"><span>THÊM VÀO GIỎ HÀNG</span></button>
                            <button class="buy-product"><span>MUA NGAY</span></button>
                        </div>
                    </div>
                </div>
                <div class="col-2-deltail">
                    <img src="image/side-bar.jpeg" alt="">
                    <div class="side-bar-deltail">
                        <h2>Chính sách bán hàng</h2>
                        <div class="policy">
                            <p><img src="image/tick-green.png" alt="">
                                Lỗi 1 đổi 1 trong 15 ngày đầu (Macbook like new)</p>
                            <p><img src="image/tick-green.png" alt="">
                                Hỗ trợ Ship COD toàn quốc, FreeShip nội thành HN</p>
                            <p><img src="image/tick-green.png" alt="">
                                Thanh toán khi nhận hàng (nội thành)</p>
                            <p><img src="image/tick-green.png" alt="">
                                Hỗ trợ trả góp, duyệt hồ sơ online cực nhanh</p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row-2-deltail">
            <section class="main">
                <div class="title-container">
                    <div class="line"></div>
                    <h1 class="title-main">SẢN PHẨM LIÊN QUAN</h1>
                    <div class="line"></div>
                </div>

                <div class="product-container">
                    <div class="row-product">
                        <?php foreach ($list_samekind as $product_same) {
                            extract($product_same);
                        $money = (($price - $discount) / $price) * 100;
                        $persent = round($money, 0);
                            $path_deltail = 'index.php?act=deltailProduct&id=' . $id_product;
                            echo '  
                                             <div class="product">';
                                            if($discount != 0){
                                                echo '<span class="discount">Giảm '.$persent.'%</span>';
                                            }
                                            echo'
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
    <div class="row-3-deltail">
        <div></div>
        <div>
            <h4>Bình Luận</h4>
            <div class="line-deltail"></div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
            <script>
            $(document).ready(function() {
                $("#comment").load("views/comment/comment.php", {
                    id_product: <?php  echo $list_sp['id_product']; ?>
                });
            });
            </script>
            <div id="comment">
            </div>
        </div>
        <div></div>
    </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    let totalProduct = document.getElementById('totalProduct');
    function addToCart(productId, productName, productPrice,productImg) {
        // console.log(productId, productName, productPrice);
        // Sử dụng jQuery
        $.ajax({
            type: 'POST',
            // Đường dẫ tới tệp PHP xử lý dữ liệu
            url: 'index.php?act=addToCart',
            data: {
                id_product: productId,
                name_product: productName,
                price: productPrice,
                img_product: productImg
            },
            success: function(response) {
                totalProduct.innerText = response;
                alert('Bạn đã thêm sản phẩm vào giỏ hàng thành công!')
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>