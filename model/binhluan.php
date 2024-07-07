<?php
function insert_binhluan($noidung,$id_sp,$id_nguoidung,$ngaybinhluan){
    $sql = "INSERT INTO `binhluan` (`noidung`, `id_sp`, `id_nguoidung`, `ngaybinhluan`) VALUES ('{$noidung}', '{$id_sp}', '{$id_nguoidung}', '{$ngaybinhluan}');";
    pdo_execute($sql);
}
function loadall_binhluan($id_sp) {
    $sql = "select * from binhluan where 1";
    if($id_sp>0){
        $sql.= " and id_sp='".$id_sp."' ";
    }
    $listbinhluan= pdo_query($sql);
    return $listbinhluan;
}
function delete_binhluan($id) {
    $sql= "DELETE FROM binhluan WHERE `id_binhluan` =".$_GET['id'];
    pdo_execute($sql);
}
?>