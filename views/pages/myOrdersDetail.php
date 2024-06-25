<body>
<div class="myOrders-container">
    <div></div>
    <div class="cart-columns-1">
        <?php foreach ($lisProduct as $value){
            extract($value);
            if($pay == 0){
                $payNew = "Thanh toán khi nhận hàng";
            }else{
                $payNew = "Thanh toán online";
            }
        if($status == 1){
            $statusDiffirent = 'Chờ xác nhận';
        }elseif ($status == 2){
            $statusDiffirent = 'Đang xử lí';
        }elseif ($status == 3){
            $statusDiffirent = 'Đang vận chuyển';
        }elseif ($status == 4){
            $statusDiffirent = 'Giao hàng thành công';
        }elseif ($status == 6){
            $statusDiffirent = 'Huỷ bỏ';
        }elseif ($status == 5){
            $statusDiffirent = 'Hoàn tất';
        }

            ?>
        <form action="" method="post">
            <div class="block-cart">

                <input name="id_product" value="<?= $value['id_product'] ?>" type="hidden">
                <input class="checkbox-cart" type="checkbox">
                <img src="upload/<?= $value['img_product'] ?>" alt="">
                <div class="inFor_product">
                    <div class="name-product-cart">
                        <h4>Tên sản phẩm:</h4>
                        <p>
                            <?= $value['name_product'] ?>
                        </p>
                    </div>
                    <div class="name-price-cart">
                        <h4>Giá:</h4>
                        <p>
                            <?= number_format($value['price'], 0, '.', '.') ?> VNĐ
                        </p>
                    </div>
                    <div class="quantity-product-cart">
                        <h4>Số lượng:</h4>
                        <p>
                            <?= $value['quantity'] ?>
                        </p>
                    </div>
                </div>
        </form>
    </div>
    <?php } ?>
</div>
<div class="cart-columns-2">
    <form action="index.php?act=order" method="post">
        <div>
            <h3>THÔNG TIN ĐẶT HÀNG</h3>
            <div class="data-order">
                <table>
                    <tr class="container-information">
                        <td><label class="label-orderDetail" for="">
                                Mã đơn hàng:
                            </label></td>
                        <td> <span>
                                    <?=$code_order ?>
                                </span></td>
                    </tr>
                    <tr class="container-information">
                        <td><label class="label-orderDetail" for="">
                                Họ và tên:
                            </label></td>
                        <td> <span>
                                    <?=$name_user ?>
                                </span></td>
                    </tr>
                    <tr class="container-information">
                        <td><label class="label-orderDetail" for="">
                                Số điện thoại:
                            </label></td>
                        <td> <span>
                                    <?=$phone ?>
                                </span></td>
                    </tr>
                    <tr class="container-information">
                        <td><label class="label-orderDetail" for="">
                                Địa chỉ nhận hàng:
                            </label></td>
                        <td> <span>
                                    <?=$address ?>
                                </span></td>
                    </tr>
                    <tr class="container-information">
                        <td><label class="label-orderDetail" for="">
                                Ghi chú:
                            </label></td>
                        <td> <span>
                                    <?=$note ?>
                                </span></td>
                    </tr>
                    <tr class="container-information">
                        <td><label class="label-orderDetail" for="">
                                Phương thức thanh toán:
                            </label></td>
                        <td> <span>
                                    <?=$payNew ?>
                                </span></td>
                    </tr>
                    <tr class="container-information">
                        <td><label class="label-orderDetail" for="">
                                Ngày đặt:
                            </label></td>
                        <td> <span>
                                    <?=$date_order ?>
                                </span></td>
                    </tr>
                    <tr class="container-information">
                        <td><label class="label-orderDetail" for="">
                                Trạng thái:
                            </label></td>
                        <td> <span>
                                    <?=$statusDiffirent ?>
                                </span></td>
                    </tr>
                </table>
            </div>
        </div>
        <h4 class="total-costs">TỔNG TIỀN:
            <?=number_format($total_money, 0, '.', '.') ?> VNĐ
        </h4>
        <div class="comback">
            <a href="index.php?act=myOrders">Đơn Mua</a>
        </div>
    </form>

</div>
<div></div>
</div>
</body>