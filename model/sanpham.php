<?php
function insert_sanpham($tensp, $giasp,$hinh, $mota,$iddm) {
    $sql = "INSERT INTO `sanpham` (`name`, `price`, `img`, `des`, `id`) VALUES ('{$tensp}', '{$giasp} ', '{$hinh}', '{$mota}',  '{$iddm}')";
    pdo_execute($sql);
}

function delete_sanpham($id) {
    $sql= "DELETE FROM sanpham WHERE `id_sp` =".$_GET['id'];
    pdo_execute($sql);
}

function loadall_sanpham($kyw,$iddm) {
    $sql = "select * from sanpham where 1";
    if($kyw!=""){
        $sql.=" and name like '%{$kyw}%'";
    }
    if($iddm>0){
        $sql.=" and id like '%{$iddm}%'";
    }
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function loadall_sanpham_home() {
    $sql = "select * from sanpham where 1 order by id desc limit 0,9";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham_top10() {
    $sql = "select * from sanpham where 1 order by view desc limit 0,5";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadone_sanpham($id) {
    $sql = "select * from sanpham WHERE `id_sp` =".$id;
    $sp=pdo_query_one($sql);
    return $sp;
}
function load_sanpham_cungloai($id,$iddm) {
    $sql = "select * from sanpham WHERE id=".$iddm." and `id_sp` <> ".$id;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function update_sanpham($id, $tensp, $giasp,$hinh, $mota,$iddm) {
    if($hinh!=""){
        $sql = "UPDATE `sanpham` SET `name` = '{$tensp}', `price` = '{$giasp}', `img` = '{$hinh}', `des` = '{$mota}', `id` = '{$iddm}' WHERE`id_sp` =".$id;
    }else{
        $sql = "UPDATE `sanpham` SET `name` = '{$tensp}', `price` = '{$giasp}', `des` = '{$mota}', `id` = '{$iddm}' WHERE`id_sp` =".$id;
    }
    
    pdo_execute($sql);
}


?>