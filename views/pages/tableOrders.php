<?php
session_start();

include "../../model/user/cart.php";
include '../../model/PDO.php';
include '../../model/user/login.php';
include '../../model/user/homepage.php';
include '../../model/user/orders.php';
include '../../mail/index.php';

if (!empty($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];

    // Tạo mảng chứa ID các sản phẩm trong giỏ hàng
    $productId = array_column($cart, 'id_product');

    // Chuyển đôi mảng id thành một cuỗi để thực hiện truy vấn
    $idList = implode(',', $productId);

    // Lấy sản phẩm trong bảng sản phẩm theo id
    $dataDb = loadProductCart($idList);}?>

<div  class="cart-container">
    <div></div>
    <div class="cart-columns-1">
        <?php

        $total = 0;
        $number = 0;
        foreach ($dataDb as $key => $value) {
        //                extract($cart);
        $quantity = 0 ;
        foreach ($_SESSION['cart'] as $cart) {
            if ($cart['id_product'] == $value['id_product']) {
                $quantity = $cart['quantity'];
                $number += $quantity;
                break;
            }
        }
        //                    if ($_SESSION['account']['id_user'] == $value['id_user']){
        //
        $total += $quantity * $value['price'];
        ?>
        <form action="" method="post">
            <div class="block-cart">

                <input name="id_product" value="<?= $value['id_product'] ?>" type="hidden">
                <input name="selectedProducts[]" class="checkbox-cart" type="checkbox">
                <a href="index.php?act=deltailProduct&id=<?=$value['id_product']?>"><img src="upload/<?= $value['img_product'] ?>" alt=""></a>
                <div class="inFor_product">
                    <div class="name-product-cart">
                        <h4>Tên sản phẩm:</h4>
                        <p><?= $value['name_product'] ?></p>
                    </div>
                    <div class="name-price-cart">
                        <h4>Giá:</h4>
                        <p><?= number_format($value['price'], 0, '.', '.') ?> VNĐ</p>
                    </div>
                    <div class="quantity-product-cart">
                        <h4>Số lượng:</h4>
                        <div class="adjust">
                            <!--                             <button name="btnUpdateCart" onclick="reduceValue(this)">-</button>-->
                            <input min="1" id="quantity_<?= $value['id_product'] ?>" type="number" name="quantity" oninput="updateQuantity(<?= $value['id_product'] ?>, <?= $key ?>)" value="<?= $quantity ?>">
                            <!--                             <button name="btnUpdateCart" onclick="increaseValue(this)">+</button>-->
                        </div>
                    </div>
                </div>
                <a class="bin" onclick="removeFormCart(<?= $value['id_product'] ?>)">
                    <i class="fa-solid fa-xmark" style="color: #000000;"></i>
                </a>
        </form>
    </div>
    <?php } ?>
</div>
<div class="cart-columns-2">
    <h3>THÔNG TIN TỔNG</h3>
    <p>---------------------------------------------------------------------------------</p>
    <div class="soluong">
        <h4>Số lượng hàng:</h4>
        <div><?= $number ?></div>
    </div>
    <div class="total">
        <h4>Tổng tiền:</h4>
        <div><?= number_format($total, 0, '.', '.') ?> VNĐ</div>
    </div>
    <form action="" method="post">
        <button name="btn-orders" type="submit">
            <p>TIẾN HÀNH ĐẶT HÀNG</p>
        </button>
    </form>
</div>
<div></div>
</div>

