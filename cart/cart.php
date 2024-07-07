<?php
    function tongdonhang(){
        $tong = 0;
        foreach($_SESSION['mycart'] as $cart){
            $ttien = $cart[3]*$cart[4];
            $tong += $ttien;
        }
        return $tong; 
    }
    function insert_bill($iduser,$name, $email,$address,$tel,$pttt,$ngaydathang,$tongdonhang){
        $sql = "INSERT INTO `bill` (`id_nguoidung`,`bill_name`, `bill_email`,`bill_address`, `bill_tel`, `bill_pttt`,`ngaydathang`, `total`) VALUES ('$iduser','$name', '$email','$address','$tel','$pttt','$ngaydathang','$tongdonhang')";
        return pdo_execute_return_lastinsertinto($sql);
    }
    function insert_cart($id_user, $id_sp,$img,$name,$price,$soluong,$thanhtien,$id_bill){
        $sql = "INSERT INTO `cart` (`id_nguoidung`, `id_sp`, `img`, `name`, `price`, `soluong`, `thanhtien`, `id_bill`) VALUES ('$id_user', '$id_sp','$img','$name','$price','$soluong','$thanhtien','$id_bill')";
        return pdo_execute($sql);
    }

    function loadone_bill($id) {
        $sql = "select * from bill WHERE `id_bill` =".$id;
        $bill=pdo_query_one($sql);
        return $bill;
    }

    function loadall_bill($kyw="",$iduser=0) {
        $sql = "select * from bill WHERE 1";
        if($iduser>0){
            $sql.= " and `id_nguoidung` =".$iduser;
        } 
        if($kyw!=""){
            $sql.= " and `id_bill` like '%".$kyw."'";
        }     
        $listbill=pdo_query($sql);
        return $listbill;
    }
    function loadall_cart_count($id_bill) {
        $sql = "select * from cart WHERE `id_bill` =".$id_bill;
        $bill=pdo_query($sql);
        return sizeof($bill);
    }
    function get_ttdh($n){
        switch($n){
            case 0:
                $tt = "Đang chờ";
                break;
            case 1:
                $tt = "Đang xử lí";
                break;
            case 2:
                $tt = "Đang giao hàng";
                break;
            case 3:
                $tt = "Hoàn tất";
                break;
            default:
                $tt = "Đang chờ";
                break;
        }
        return $tt;
    }
    function loadall_thongke() {
        $sql = "select danhmuc.id as madm,  danhmuc.name as tendm, count(sanpham.id_sp) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice";
        $sql.= " from sanpham left join danhmuc on danhmuc.id=sanpham.id";
        $sql.= " group by danhmuc.id ";
        $listtk=pdo_query($sql);
        return $listtk;
    }
    function delete_bill($id) {
        $sql= "DELETE FROM bill WHERE `id_bill` =".$_GET['id'];
        pdo_execute($sql);
    }
    function delete_cart($id_bill) {
        $sql= "DELETE FROM cart WHERE `id_bill` =".$_GET['id'];
        pdo_execute($sql);
    }
    function update_bill($id,$ttgh) {
        $sql = "UPDATE `bill` SET `bill_status` = '{$ttgh}' WHERE `id_bill` = {$id}";
        pdo_execute($sql);
    }
    
?>