<?php
function listOrdersProduct($code_order){
    $sql ="SELECT *, product.price AS priceProduct, orders_detail.price AS priceOrder
FROM orders_detail
INNER JOIN product ON product.id_product = orders_detail.id_product
inner join orders on orders.code_order = orders_detail.code_order
WHERE orders_detail.code_order = '$code_order'";
    $list = pdo_query($sql);
    return $list;
}
function listOrders($id_status,$id_user){
    if ($id_status != 'All' ){
        if($id_status == 3){
            $sql ="select * from orders where status = 3 or status = 4 and id_user= '$id_user'  order by id_order desc ";
        }else {
            $sql = "select * from orders where status = '$id_status' and id_user= '$id_user' order by id_order desc ";
        }
    }else{
        $sql ="select * from orders where id_user= '$id_user' order by id_order desc ";
    }

    $list = pdo_query($sql);
    return $list;
}
function StatusSuccess($id_order)
{
        $sql = "update orders set status = 5 where id_order = '$id_order'";
    pdo_execute($sql);
}

function StatusCancel($id_order)
{
    $sql = "update orders set status = 6 where id_order = '$id_order'";
    pdo_execute($sql);
}

function OrdersDetail($code_order){
    $sql ="SELECT *
FROM orders_detail
INNER JOIN product ON product.id_product = orders_detail.id_product
inner join orders on orders.code_order = orders_detail.code_order
WHERE orders_detail.code_order = '$code_order'";
    $list = pdo_query($sql);
    return $list;
}

function update_total($id_product,$quantity){
    $sql = "update product set total_quantity = (total_quantity - '$quantity') where id_product = '$id_product'";
    pdo_execute($sql);
}
?>