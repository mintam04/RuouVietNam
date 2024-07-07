<?php
function insert_taikhoan($user,$pass,$email){
    $sql = "INSERT INTO `nguoidung` (`user`, `pass`, `email`) VALUES ('{$user}', '{$pass}','{$email}')";
    pdo_execute($sql);
}
function loadall_taikhoan() {
    $sql = "select * from nguoidung";
    $listtaikhoan= pdo_query($sql);
    return $listtaikhoan;
}
?>