<?php
function insert_danhmuc($tenloai) {
    $sql = "INSERT INTO `danhmuc` (`name`) VALUES ( '{$tenloai}')";
    pdo_execute($sql);
}

function delete_danhmuc($id) {
    $sql= "DELETE FROM danhmuc WHERE `id` =".$_GET['id'];
    pdo_execute($sql);
}

function loadall_danhmuc() {
    $sql = "select * from danhmuc";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}

function loadone_danhmuc($id) {
    $sql = "select * from danhmuc WHERE `id` =".$id;
    $dm=pdo_query_one($sql);
    return $dm;
}
function load_name_danhmuc($id) {
    if($id >0){
        $sql = "select * from danhmuc WHERE `id` =".$id;
        $dm=pdo_query_one($sql);
        extract($dm);
        return $name;
    }else{
        return "";
    }
    
}

function update_danhmuc($id,$tenloai) {
    $sql = "UPDATE `danhmuc` SET `name` = '{$tenloai}' WHERE `id` = {$id}";
    pdo_execute($sql);
}


?>