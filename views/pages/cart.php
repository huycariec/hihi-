<?php if (!empty($_SESSION['cart'])) : ?>
 <div id="order">
 <div  class="cart-container">
     <div></div>
     <div class="cart-columns-1">
         <?php

            $total = 0;
            $number = 0;
            foreach ($dataDb as $key => $value) {
                $quantity = 0 ;
                foreach ($_SESSION['cart'] as $cart) {
                    if ($cart['id_product'] == $value['id_product']) {
                        $quantity = $cart['quantity'];
                        $number += $quantity;
                        break;
                    }
                }
                    if ($_SESSION['account']['id_user'] == $cart['id_user']){
                        $total += $quantity * $value['price'];
                ?>
         <form action="" method="post">
             <div class="block-cart">

                 <input name="id_product" value="<?= $value['id_product'] ?>" type="hidden">
<!--                 <input name="selectedProducts[]" class="checkbox-cart" type="checkbox">-->
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
                             <input min="1" id="quantity_<?= $value['id_product'] ?>" type="number" name="quantity" oninput="updateQuantity(<?= $value['id_product'] ?>, <?= $key ?>)" value="<?= $quantity ?>">
                         </div>
                     </div>
                 </div>
                 <a class="bin" onclick="removeFormCart(<?= $value['id_product'] ?>)"><i class="fa-solid fa-xmark" style="color: #000000;"></i></a>
         </form>
     </div>
     <?php }} ?>
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
     </div>
 <?php else : ?>
 <div class="cart-empty"><span>Giỏ hàng trống.</span></div>
 <?php endif; ?>

 <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
 <script>
     // hàm cập nhật số lượng
     function updateQuantity(id_product, index) {
         // lấy giá trị của ô input
         let newQuantity = $('#quantity_' + id_product).val();
         if (newQuantity <= 0) {
             newQuantity = 1
         }

         // Gửi yêu cầu bằng ajax để cập nhật giỏ hàng
         $.ajax({
             type: 'POST',
             url: 'index.php?act=updateQuantity',
             data: {
                 id_product: id_product,
                 quantity: newQuantity
             },
             success: function(response) {
                 // Sau khi cập nhật thành công
                 $.post('views/pages/tableOrders.php', function(data) {
                     $('#order').html(data);
                 })
             },
             error: function(error) {
                 console.log(error);
             },
         })
     }

     function removeFormCart(id_product) {
         if (confirm("Bạn có đồng ý xóa sản phẩm hay không?")) {
             // Gửi yêu cầu bằng ajax để cập nhật giỏ hàng
             $.ajax({
                 type: 'POST',
                 url: 'index.php?act=deleteProductInCart',
                 data: {
                     id_product: id_product
                 },
                 success: function(response) {
                     // Sau khi cập nhật thành công
                     $.post('views/pages/tableOrders.php', function(data) {
                         $('#order').html(data);
                     })
                 },
                 error: function(error) {
                     console.log(error);
                 },
             })
         }
     }
 </script>