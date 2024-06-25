<?php
function insert_orders($codeOrders,$date_order,$pay,$status,$total_money,$name_user,$email,$phone,$address,$note,$id_user)
{
    $sql = "insert into orders(code_order,date_order,pay,status,total_money,name_user,email,phone,address,note,id_user) values ('$codeOrders','$date_order','$pay','$status','$total_money','$name_user','$email','$phone','$address','$note','$id_user')";
    pdo_execute($sql);

}

function insert_orders_detail($codeOrders,$idProduct,$quantity,$price)
{
    $sql = "insert into orders_detail(code_order,id_product,quantity,price) values ('$codeOrders','$idProduct','$quantity','$price')";
    pdo_execute($sql);
}

function loadProductCart($idList){
    $sql = "SELECT * FROM product WHERE id_product IN ($idList)";
    $list = pdo_query($sql);
    return $list;
}
?>