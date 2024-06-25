<?php
function insert_danhmuc($name_category)
{
    $sql = "insert into category values (NULL,'$name_category')";
    pdo_execute($sql);
}

function del_danhmuc($id_category)
{
    $sql = " delete from category where id_category = '$id_category'";
    pdo_execute($sql);
}

function select_all_danhmuc()
{
    $sql = 'select * from category order by id_category desc ';
    $list = pdo_query($sql);
    return $list;
}

function select_one_danhmuc($id_category)
{
    $sql = "select * from category where id_category = '$id_category'";
    $list = pdo_query_one($sql);
    return $list;
}

function update_danhmuc($name_category, $id_category)
{
    $sql = "update category set name_category = '$name_category' where id_category = '$id_category'";
    pdo_execute($sql);
}
?>