
<?php
    require "../model/pdo.php";
    require "../model/danhmuc.php";
    require "../model/sanpham.php";
    require "../model/taikhoan.php";
    require "../model/binhluan.php";
    require "../cart/cart.php";
    require "header.php";

    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){
            case 'adddm':
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $tenloai = $_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao = "Thêm thành công";
                }
                include "danhmuc/add.php";
                break;
            case 'lisdm':
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/list.php"; 
                break;
            case 'xoadm':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_danhmuc($_GET['id']);
                }
                $sql = "select * from danhmuc";
                $listdanhmuc = pdo_query($sql);
                include "danhmuc/list.php"; 
                break;
            case 'suadm':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $dm=loadone_danhmuc($_GET['id']);
                }               
                include "danhmuc/update.php"; 
                break;
            case 'updatedm':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $tenloai = $_POST['tenloai'];
                    $id = $_POST['id'];
                    update_danhmuc($id,$tenloai);
                    $thongbao = "Cập nhật thành công";
                }
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/list.php"; 
                break;


            //sản phẩm
            case 'addsp':
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $iddm=$_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    
                    $dir = "../upload/";
                    $filename = basename($_FILES['hinh']['name']);
                    $fileimg = $dir.$filename;
                    if(move_uploaded_file($_FILES['hinh']['tmp_name'],$fileimg)){
                        $_POST['hinh'] = $fileimg;
                        $hinh = $_POST['hinh'];
                    }else{
                        echo "up load thất bại";
                    }
                    insert_sanpham($tensp, $giasp,$hinh, $mota,$iddm);
                    $thongbao = "Thêm thành công";
                }
                $listdanhmuc=loadall_danhmuc();
                include "sanpham/add.php";
                break;
            case 'lissp':
                if(isset($_POST['listok'])&&($_POST['listok'])){
                    $kyw = $_POST['kyw'];
                    $iddm = $_POST['iddm'];
                }else{
                    $kyw='';
                    $iddm=0;
                }
                $listdanhmuc=loadall_danhmuc();
                $listsanpham=loadall_sanpham($kyw,$iddm);
                include "sanpham/list.php"; 
                break;
            case 'xoasp':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_sanpham($_GET['id']);
                }
                $sql = "select * from sanpham";
                $listsanpham=loadall_sanpham('',0);
                include "sanpham/list.php"; 
                break;
            case 'suasp':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $sp=loadone_sanpham($_GET['id']);
                }      
                $listdanhmuc=loadall_danhmuc();     
                include "sanpham/update.php"; 
                break;
            case 'updatesp':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $iddm=$_POST['iddm'];
                    $id = $_POST['id'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    
                    $dir = "../upload/";
                    $filename = basename($_FILES['hinh']['name']);
                    $fileimg = $dir.$filename;
                    if(move_uploaded_file($_FILES['hinh']['tmp_name'],$fileimg)){
                        $_POST['hinh'] = $fileimg;
                        $hinh = $_POST['hinh'];                       
                    }
                    
                    update_sanpham($id, $tensp, $giasp,$hinh, $mota,$iddm);
                    $thongbao = "Cập nhật thành công";
                }
                $listsanpham=loadall_sanpham('',0);
                include "sanpham/list.php"; 
                break;
            //khach hang
            case 'dskh':     
                $listtaikhoan=loadall_taikhoan();     
                include "taikhoan/list.php"; 
                break;
            //binhluan
            case 'dsbl':                   
                $listbinhluan=loadall_binhluan(0);     
                include "binhluan/list.php"; 
                break;
            case 'xoabl':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_binhluan($_GET['id']);
                }
                $sql = "select * from binhluan";
                $listbinhluan = pdo_query($sql);
                include "binhluan/list.php"; 
                break;

            //bill
            case 'listbill':
                if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                    $kyw = $_POST['kyw'];
                }else{
                    $kyw ="";
                }
                $listbill=loadall_bill($kyw,0);
                include "bill/listbill.php"; 
                break;
             case 'xoadh':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_cart($_GET['id']);
                    delete_bill($_GET['id']);
                }
                $sql = "select * from bill";
                $listbill=loadall_bill("",0);
                include "bill/listbill.php"; 
                break;
            case 'suadh':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $bill=loadone_bill($_GET['id']);
                }      
                $listbill = loadall_bill();    
                include "bill/updatebill.php"; 
                break;
            case 'updatedh':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $ttgh = $_POST['ttgh'];
                    $id = $_POST['id'];
                    update_bill($id,$ttgh);
                    $thongbao = "Cập nhật thành công";
                }
                $listbill=loadall_bill("",0);
                include "bill/listbill.php"; 
                break;
            //thong ke hang hoa
            case 'thongke':
                if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                    $kyw = $_POST['kyw'];
                }else{
                    $kyw ="";
                }
                $listthongke=loadall_thongke();
                include "thongke/list.php"; 
                break;
            case 'bieudo':
                $listthongke=loadall_thongke();
                include "thongke/bieudo.php"; 
                break;
            default:
                include "home.php";
                break;             
        }
    }else{
        include "home.php";
    }



    require "footer.php";
?>


