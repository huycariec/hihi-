<body>
    <div class="container_purchase">
        <div class="menu_purchase">
            <ul id="menu_purchase">
                <li><a <?php if($_GET['status'] == 'All'){echo 'style="color: #7AC142"';} ?> href="index.php?act=myOrders&status=All">Tất cả</a></li>
                <li><a <?php if($_GET['status'] == 10){echo 'style="color: #7AC142"';} ?> href="index.php?act=myOrders&status=10">Đã thanh toán</a></li>
                <li><a <?php if($_GET['status'] == 1){echo 'style="color: #7AC142"';} ?> href="index.php?act=myOrders&status=1">Chờ xác nhận</a></li>
                <li><a <?php if($_GET['status'] == 2){echo 'style="color: #7AC142"';} ?> href="index.php?act=myOrders&status=2">Đang xử lí</a></li>
                <li><a <?php if($_GET['status'] == 3){echo 'style="color: #7AC142"';} ?> href="index.php?act=myOrders&status=3">Đang vận chuyển</a></li>
                <li><a <?php if($_GET['status'] == 5){echo 'style="color: #7AC142"';} ?> href="index.php?act=myOrders&status=5">Hoàn thành</a></li>
                <li><a <?php if($_GET['status'] == 6){echo 'style="color: #7AC142"';} ?> href="index.php?act=myOrders&status=6">Đã Huỷ</a></li>
            </ul>
        </div>
        <?php foreach ($listOrders as $orders){
            extract($orders);
            $listOrdersProduct = listOrdersProduct($code_order);
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
        <div class="purchase">
            <div class="content_purchase">
                <div class="truck">
                    <i class="fa-solid fa-truck fa-s" style="color: #24aa99;"></i>
                    <span><?=$statusDiffirent ?></span>
                </div>
                <div class="linePurchase"></div>
                <div class="inFo-purchase">
                    <?php
                    foreach ($listOrdersProduct as $product){
                        extract($product)?>
                    <div class="myOrders">
                        <div><a href="index.php?act=deltailProduct&id=<?= $id_product ?>" ><img src="upload/<?= $product['img_product'] ?>" alt=""></a></div>

                        <div>
                            <h3 class="title-purchase"><a href="index.php?act=deltailProduct&id=<?= $id_product ?>" ><?=$product['name_product'] ?></a></h3>
                            <p>Số lượng: <?=$product['quantity'] ?></p>
                        </div>
                        <div class="total-purchase">
                            <span class="priceProduct-purchare"><?=number_format($priceProduct, 0, '.', '.')?> VNĐ</span>
                            <span class="discount-purchare"><?=number_format($discount, 0, '.', '.') ?> VNĐ</span>
                        </div>
                    </div>
                    <?php } ?>


                </div>
                <div class="linePurchase"></div>
                <div class="footer-purchase">
                    <div>
                        <span class="start-purchase"><span style="font-size: 20px;font-weight: bold">Thành
                                tiền:</span><span class="total-conclusion"><?= number_format($total_money, 0, '.', '.') ?> VNĐ</span></span>
                    </div>
                    <div class="end-purchase">
                        <p class="date-purchase">Ngày đặt: <?=$date_order ?></p>

                        <?php if($status == 1 or $status == 2){?>
                        <div class="btn-purchase">
                            <form action="" method="post">
                                <button name="detail_order" class="reBuy detail_order"><a href="index.php?act=myOrdersDetail&codeOrder=<?=$code_order?>">Chi tiết</a></button>
                                <button name="btnCancel" class="checkOrder"><a href="javascript:confirmCancel('index.php?act=CanceledOrders&id=<?= $id_order?>')">Huỷ đơn hàng</a></button>
                        </div>
                        <?php } elseif($status == 4) {?>
                        <div class="btn-purchase">
                                <button name="btnSuccess" class="checkOrder"><a href="javascript:confirmSuccess('index.php?act=SuccessOrders&id=<?= $id_order?>')">Đã nhận được hàng</a></button>
                        </div>
                        <?php }elseif($status == 5){?>
                        <div class="btn-purchase">
                                <button name="detail_order"  class="reBuy detail_order"><a href="index.php?act=myOrdersDetail&codeOrder=<?=$code_order?>">Chi tiết</a></button>
                        </div>
                        <?php }elseif($status == 3){?>
                            <div class="btn-purchase">
                                    <button name="detail_order"  class="reBuy detail_order"><a href="index.php?act=myOrdersDetail&codeOrder=<?=$code_order?>">Chi tiết</a></button>
                            </div>
                    <?php }?>

                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</body>

<script>
    function confirmCancel(delUrl) {
        if (confirm("Bạn có muốn huỷ đơn hàng không?")) {
            alert('Huỷ thành công')
            document.location = delUrl;
        }
    }

    function confirmSuccess(delUrl) {
        if (confirm("Bạn đã nhận được hàng?")) {
            document.location = delUrl;
        }
    }
</script>