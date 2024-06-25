<div class="cart-container">
    <div></div>
    <div class="cart-columns-1">
        <?php if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
        $quantity = 0 ;
        $total = 0;
        foreach ($_SESSION['cart'] as $cart) {
                if ($_SESSION['account']['id_user'] == $cart['id_user']){
        $quantity += $cart['quantity'];
        $total += $cart['quantity'] * $cart['price'];
        ?>
        <form action="" method="post">
            <div class="block-cart">

                <input name="id_product" value="<?= $cart['id_product'] ?>" type="hidden">
                <img src="upload/<?= $cart['img_product'] ?>" alt="">
                <div class="inFor_product">
                    <div class="name-product-cart">
                        <h4>Tên sản phẩm:</h4>
                        <p><?= $cart['name_product'] ?></p>
                    </div>
                    <div class="name-price-cart">
                        <h4>Giá:</h4>
                        <p><?= number_format($cart['price'], 0, '.', '.') ?> VNĐ</p>
                    </div>
                    <div class="quantity-product-cart">
                        <h4>Số lượng:</h4>
                        <p><?= $cart['quantity'] ?></p>
                    </div>
                </div>
        </form>
    </div>
    <?php }}} ?>

</div>
<div class="cart-columns-2">
    <form action="index.php?act=order" method="post">
        <div>
            <h3>THÔNG TIN ĐẶT HÀNG</h3>
            <div class="data-order">
                <input name="name_order" type="text" placeholder="  Họ và tên">
                <input name="phone_order" type="text" placeholder="  Số điện thoại">
                <input name="email_order" type="text" placeholder="  Email">
                <input name="address_order" type="text" placeholder="  Địa chỉ">
                <input name="takeNode" type="text" placeholder="  Ghi chú">
            </div>
        </div>
        <div class="pay">
            <h3>PHƯƠNG THỨC THANH TOÁN</h3>
            <div><input value="0" name="pay" type="radio"> Thanh toán khi nhận hàng</div>
            <div> <input value="1" name="pay" type="radio"> Thanh toán bằng thẻ tín dụng</div>
        </div>
        <h4 class="total-pay">TỔNG TIỀN: <?= number_format($total, 0, '.', '.') ?> VNĐ </h4>
        <input name="total" value="<?= $total ?>" type="hidden">
        <div style="margin-top: 10px" class="validation">
            <?php if (isset($_SESSION['error'])){
                echo "<span class='validation-error'>". $_SESSION['error'] ."</span>";
                unset($_SESSION['error']);
            } ?>
        </div>
        <div class="adjust-pay">
            <?php
                if (empty($_SESSION['cart'])){?>
            <input name="btn-submit" type="submit" value="Đặt Hàng" class="btn-pay">
            <?php }else{ ?>
            <input name="btn-submit" type="submit" value="Đặt Hàng" class="btn-pay">
            <?php } ?>
        </div>
    </form>

</div>
<div></div>
</div>
<script>
function notify() {
    alert("Đặt hàng thành công")
}
</script>