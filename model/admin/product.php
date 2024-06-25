<?php
function select_all_sanpham()
{
    $sql = 'select *,name_category from product
    left join category on category.id_category = product.id_category
    order by id_product desc ';
    $list = pdo_query($sql);
    return $list;
}

function insert_sanpham($name_product, $price, $discount, $img, $id_category, $chip, $ram, $screen, $camera, $camera_selfie, $origin,$total)
{
    $sql = "insert into product( name_product, price, discount, img_product, id_category, chip, ram, screen, camera, camera_selfie, origin,total_quantity ) values ('$name_product','$price','$discount','$img','$id_category','$chip','$ram','$screen','$camera','$camera_selfie','$origin','$total')";
    pdo_execute($sql);
}

function select_one_sanpham($id_product)
{
    $sql = "select * from product where id_product = '$id_product'";
    $list = pdo_query_one($sql);
    return $list;
}

function update_sanpham($name_product, $price, $discount, $img, $id_category, $chip, $ram, $screen, $camera, $camera_selfie, $origin,$total, $id)
{
    if ($img != "") {
        $sql = "update product set ram ='$ram',screen = '$screen',camera = '$camera',camera_selfie = '$camera_selfie',origin = '$origin', name_product = '$name_product',price = '$price',discount = '$discount',img_product = '$img',chip = '$chip',id_category = '$id_category',total_quantity='$total' where id_product = '$id'";
    } else {
        $sql = "update product set ram ='$ram',screen = '$screen',camera = '$camera',camera_selfie = '$camera_selfie',origin = '$origin', name_product = '$name_product',price = '$price',discount = '$discount',chip = '$chip',id_category = '$id_category',total_quantity='$total' where id_product = '$id'";
    }
    pdo_execute($sql);
}

function del_sanpham($id_product)
{
    $sql = " delete from product where id_product = '$id_product'";
    pdo_execute($sql);
}