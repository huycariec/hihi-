<body>
    <div class="container-admin">
        <?php
    require_once 'views/sidebar.php';
    ?>
        <div class="col-2-admin">
            <div class="commodities-title">
                <h4>Quản lí đơn hàng<h4>
            </div>
            <div class="commodities-container">
                <div class="select-option">
                    <form id="filterForm" action="index.php?act=listOrders" method="post">
                        <div class="input-select">
                            <select id="options_status" style="width: 100%" name="options_status">
                                <option value="">Tất cả</option>
                                <option value="1">Chờ xác nhận</option>
                                <option value="2">Đang xử lí</option>
                                <option value="3">Đang vận chuyển</option>
                                <option value="4">Giao hàng thành công</option>
                                <option value="5">Hoàn tất đơn hàng</option>
                                <option value="6">Huỷ bỏ</option>
                            </select>
                            <button name="btn-filter" type="submit"><i class="fa-solid fa-magnifying-glass"
                                    style="color: #000000;"></i></button>
                        </div>
                    </form>
                </div>
                <div class="line-commodities"></div>
                <div class="table-commodities">
                    <table class="commodities">
                        <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Địa chỉ</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Ngày đặt hàng</th>
                                <th>Trạng thái đơn hàng</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="product-list">
                            <?php
                    if(isset($_POST['btn-filter']) && ($_POST['btn-filter'] != "All")){
                        foreach ($filterStatus as $value) {
                            extract($value);
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
                            $path_detail = 'index.php?act=detailOrders&codeOder=' . $code_order;
                            $path_updateStatus = 'index.php?act=updateStatus&codeOder=' . $code_order;
                            echo '
                    <tr>
  
                        <td>' . $code_order . '</td>
                        <td>' . $name_user . '</td>
                         <td>'.$address.'</td>
                        <td>' . $email . '</td>
                        <td>'.$phone.'</td>
                        <td>'.$date_order.'</td>
                        <td>' . $statusDiffirent . '</td>
                        <td class="">
                                            ';?>

                            <?php if($status == 1){ ?>
                            <button class="btn-green">
                                <a class="handle"
                                    href="javascript:confirmSuccess('<?php echo $path_updateStatus?>&status=<?=$status ?>')"><i
                                        class="fa-solid fa-check fa-xl" style="color: green"></i></i></i></a>
                            </button>
                            <button class="btn-red">
                                <a class="cancel" href="javascript:confirmSuccess('<?php echo $path_updateStatus?>')"><i
                                        class="fa-solid fa-xmark fa-xl" style="color: red"></i></i></i></a>
                            </button>
                            <button class="edit">
                                <a href="<?= $path_detail?>"><i class="fas fa-edit"></i></a>
                            </button>
                            <?php }elseif ($status == 2){?>
                            <button class="btn-green">
                                <a class="transport"
                                    href="javascript:confirmSuccess('<?php echo $path_updateStatus?>&status=<?=$status ?>')"><i
                                        class="fa-solid fa-check fa-xl" style="color: green"></i></i></i></a>
                            </button>
                            <button class="edit">
                                <a href="<?= $path_detail?>"><i class="fas fa-edit"></i></a>
                            </button>
                            <?php }elseif ($status == 3){ ?>
                            <button class="btn-green">
                                <a class="deliver"
                                    href="javascript:confirmSuccess('<?php echo $path_updateStatus?>&status=<?=$status ?>')"><i
                                        class="fa-solid fa-check fa-xl" style="color: green"></i></i></i></a>
                            </button>
                            <button class="edit">
                                <a href="<?= $path_detail?>"><i class="fas fa-edit"></i></a>
                            </button>
                            <?php }else{?>
                            <button class="edit">
                                <a href="<?= $path_detail?>"><i class="fas fa-edit"></i></a>
                            </button>
                            <?php } ?>
                            </td>
                            <?php }
                    }else{
                    foreach ($listOrders as $value) {
                        extract($value);
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
                        $path_detail = 'index.php?act=detailOrders&codeOder=' . $code_order;
                        $path_updateStatus = 'index.php?act=updateStatus&codeOder=' . $code_order;
                        echo '
                    <tr>
             
                        <td>' . $code_order . '</td>
                        <td>' . $name_user . '</td>
                         <td>'.$address.'</td>
                        <td>' . $email . '</td>
                        <td>'.$phone.'</td>
                        <td>'.$date_order.'</td>
                        <td>' . $statusDiffirent . '</td>
                        <td class="purchase-button">
                                            ';?>

                            <?php if($status == 1){ ?>
                            <button class="btn-green">
                                <a class="handle"
                                    href="javascript:confirmSuccess('<?php echo $path_updateStatus?>&status=<?=$status ?>')"><i
                                        class="fa-solid fa-check fa-xl" style="color: green"></i></i></i></a>
                            </button>
                            <button class="btn-red">
                                <a class="cancel" href="javascript:confirmSuccess('<?php echo $path_updateStatus?>')"><i
                                        class="fa-solid fa-xmark fa-xl" style="color: red"></i></i></i></a>
                            </button>
                            <button class="edit">
                                <a href="<?= $path_detail?>"><i class="fas fa-edit"></i></a>
                            </button>
                            <?php }elseif ($status == 2){?>
                            <button class="btn-green">
                                <a class="transport"
                                    href="javascript:confirmSuccess('<?php echo $path_updateStatus?>&status=<?=$status ?>')"><i
                                        class="fa-solid fa-check fa-xl" style="color: green"></i></i></i></a>
                            </button>
                            <button class="edit">
                                <a href="<?= $path_detail?>"><i class="fas fa-edit"></i></a>
                            </button>
                            <?php }elseif ($status == 3){ ?>
                            <button class="btn-green">
                                <a class="deliver"
                                    href="javascript:confirmSuccess('<?php echo $path_updateStatus?>&status=<?=$status ?>')"><i
                                        class="fa-solid fa-check fa-xl" style="color: green"></i></i></i></a>
                            </button>
                            <button class="edit">
                                <a href="<?= $path_detail?>"><i class="fas fa-edit"></i></a>
                            </button>
                            <?php }else{?>
                            <button class="edit">
                                <a href="<?= $path_detail?>"><i class="fas fa-edit"></i></a>
                            </button>
                            <?php } ?>
                            </td>
                            <?php
                    } }?>
                        </tbody>
                    </table>
                    <div id="pagination"></div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
function confirmSuccess(delUrl) {
    if (confirm("Thay đổi trạng thái đơn hàng?")) {
        document.location = delUrl;
    }
}
</script>