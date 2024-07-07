<?php 
   
    require "../model/pdo.php";
    require "../model/sanpham.php";
    require "../model/danhmuc.php";
    require "../model/taikhoan.php";
    
 
    $dstop10 = loadall_sanpham_top10();
    $dsdm = loadall_danhmuc();
    require "header.php";

    $spnew = loadall_sanpham_home();
    if(isset($_GET['act'])&&($_GET['act'])!=""){
        $act = $_GET['act'];
        switch($act){
            case 'sanpham':  
                if(isset($_POST['kyw'])&&($_POST['kyw']!="")) {
                    $kyw = $_POST['kyw'];
                }else{
                    $kyw = "";
                }
                if(isset($_GET['iddm'])&&($_GET['iddm']>0)) { 
                    $iddm =  $_GET['iddm'];                  
                    
                }else{
                    $iddm =0;
                }    
                $dssp = loadall_sanpham($kyw,$iddm);
                $namedm = load_name_danhmuc($iddm);
                require "sanpham.php";                   
                break;
            case 'sanphamct':  
                
                if(isset($_GET['idsp'])&&($_GET['idsp']>0)) {                    
                    $onesp = loadone_sanpham($_GET['idsp']); 
                    extract($onesp);

                    $spcungloai = load_sanpham_cungloai($_GET['idsp'],$onesp['id']);
                    require "sanphamct.php";
                }else{
                    require "home.php";
                }                       
                break;
            // case "add_binhluan":
                
                
            //     require "sanphamct.php";
            //     break;
            default:
                require "home.php";
                break;
        }
    }else{
        require "home.php";
    }


    
    require "footer.php";

?>