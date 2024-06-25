<?php
function selectALlOrders(){
    $sql = "Select * from orders order by id_order desc ";
    $list = pdo_query($sql);
    return $list;
}

function selectALlOrdersDetail($code_order){
    $sql = "Select *, name_product from orders_detail inner join product 
                       on orders_detail.id_product = product.id_product 
                       where code_order = '$code_order'";
    $list = pdo_query($sql);
    return $list;
}

function updateStatus($status,$code_order)
{
    if($status == 1){
        $sql = "update orders set status = 2 where code_order = '$code_order'";
    }elseif ($status == 2){
        $sql = "update orders set status = 3 where code_order = '$code_order'";
    }elseif ($status == 3){
        $sql = "update orders set status = 4 where code_order = '$code_order'";
    }elseif ($status == 4){
        $sql = "update orders set status = 5 where code_order = '$code_order'";
    }elseif ($status == 5){
        $sql = "update orders set status = 6 where code_order = '$code_order'";
    }elseif ($status == 6){
        $sql = "update orders set status = 7 where code_order = '$code_order'";
    }elseif ($status == 7){
        $sql = "update orders set status = 8 where code_order = '$code_order'";
    }
    pdo_execute($sql);
}
function select_status($id_status){
    if ($id_status != ""){
        $sql = "Select * from orders where status = '$id_status' order by id_order desc ";
    }else {
        $sql = "Select * from orders order by id_order desc ";
    }
    $list = pdo_query($sql);
    return $list;
}
?>