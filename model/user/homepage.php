<?php
function search_sp($value)
{
    $sql = " SELECT * FROM product WHERE name_product LIKE '%$value%'";
    $list = pdo_query($sql);
    return $list;
}

function select_all_danhmuc()
{
    $sql = 'select * from category';
    $list = pdo_query($sql);
    return $list;
}

function select_one_sanpham($id_product)
{
    $sql = "select * from product where id_product = '$id_product'";
    $list = pdo_query_one($sql);
    return $list;
}

//function select_sp_samekind($id_product, $id_category)
//{
//    $sql = "select * from product where id_category = '$id_category' and id_product != '$id_product'";
//    $list = pdo_query($sql);
//    return $list;
//}

function select_sp_samekind($id_product)
{
    $sql = "select * from product where id_product != '$id_product' order by id_product desc";
    $list = pdo_query($sql);
    return $list;
}

function select_sp_by_dm($id)
{
    $sql = "select * from product where id_category = '$id'";
    $list = pdo_query($sql);
    return $list;
}

function select_all_product()
{
    $sql = "SELECT * FROM product where id_category != 7 order by id_product desc limit 0,9";
    $listsp = pdo_query($sql);
    return $listsp;
}
function select_all_phukien()
{
    $sql = "SELECT * FROM product where id_category = 7 order by id_product desc limit 0,6";
    $listsp = pdo_query($sql);
    return $listsp;
}
?>