<?php
function select_all_user()
{
    $sql = "select * from user order by id_user desc ";
    $list = pdo_query($sql);
    return $list;
}

function insert_user($name_user,$img_user, $account, $password, $email, $phone, $address, $role)
{
    $sql = "insert into user(name_user,img_user,account, password, email, phone, address,role) values('$name_user','$img_user','$account', '$password', '$email', '$phone', '$address', '$role')";
    pdo_execute($sql);
}


function del_user($id_user)
{
    $sql = " delete from user where id_user = '$id_user'";
    pdo_execute($sql);
}

function update_user($name_user,$img_user, $account, $password, $email, $phone, $address, $role, $id)
{
    if($img_user != ""){
        $sql = "update user set name_user = '$name_user',img_user = '$img_user',account = '$account',password = '$password',email = '$email',phone = '$phone',address = '$address', role = '$role' where id_user = '$id'";
    }else{
        $sql = "update user set name_user = '$name_user',account = '$account',password = '$password',email = '$email',phone = '$phone',address = '$address', role = '$role' where id_user = '$id'";
    }

    pdo_execute($sql);
}

function select_one_user($id)
{
    $sql = "select * from user where id_user = '$id'";
    $list = pdo_query_one($sql);
    return $list;

}
function select_account($account, $password)
{
    $sql = "select * from user where account = '$account' and password = '$password'";
    $list = pdo_query_one($sql);
    return $list;
}
?>