<?php
session_start();
require "../model/pdo.php";
require "../model/sanpham.php";
require "../model/danhmuc.php";
require "../model/taikhoan.php";
require "cart.php";

$dstop10 = loadall_sanpham_top10();
$dsdm = loadall_danhmuc();

if(isset($_POST['dongydathang'])&&($_POST['dongydathang'])){
    if(isset($_SESSION['user'])){
        $iduser =  $_SESSION['user']['id_nguoidung'];
    }else{
        $id = 0;
    }
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $pttt = $_POST['pttt'];
    $ngaydathang =date('h:i:sa  d/m/Y');
    $tongdonhang = tongdonhang();

    $id_bill = insert_bill($iduser,$name, $email,$address,$tel,$pttt,$ngaydathang,$tongdonhang);
    foreach($_SESSION['mycart'] as $cart){
        insert_cart($_SESSION['user']['id_nguoidung'],$cart['0'],$cart['2'],$cart['1'],$cart['3'],$cart['4'],$cart['5'],$id_bill);
    }  
    $_SESSION['cart'] = "";
}
$listbill = loadone_bill($id_bill); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Pacifico&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/d6a8ce8d77.js" crossorigin="anonymous"></script>
    <title>Rượu Việt Nam</title>

    <link rel="stylesheet" href="../view/css/style.css" />
    <style>

        #menu>ul>li {
            display: inline-block;
            position: relative;
        }
       
        #menu ul ul {
            position: absolute;
            display: none;
            padding: 0px;
            margin: 0px;
            list-style: none;
            border-radius: 3px;
            width: 170px;
            background-color: #5d4037 !important;

        }
    
        #menu ul ul a {
            display: block;
            color: white;
            text-decoration: none;
            font-variant: small-caps;
            padding: 0 10px;
        }
    
        #menu ul ul a:hover{
            color: white;
        }
    
        #menu ul li:hover ul {
            display: block;
        }
        button{
            color: white ;
            background-color: brown !important;
            height: 25px;
        }
        input{
            color: black;
        }
        /* label color */
        .input-field label {
            color: #000;
        }
        /* label focus color */
        .input-field input[type=text]:focus + label {
            color: #000;
        }
        /* label underline focus color */
        .input-field input[type=text]:focus {
            border-bottom: 1px solid #000;
            box-shadow: 0 1px 0 0 #000;
        }
        /* valid color */
        .input-field input[type=text].valid {
            border-bottom: 1px solid #000;
            box-shadow: 0 1px 0 0 #000;
        }
        /* invalid color */
        .input-field input[type=text].invalid {s
            border-bottom: 1px solid #000;
            box-shadow: 0 1px 0 0 #000;
        }
        /* icon prefix focus color */
        .input-field .prefix.active {
            color: #000;
        }
        </style>
</head>

<body>
        <div class="navbar-fixed">
            <nav class="brown darken-2">
                <div class="nav-wrapper container">
                    <a href="../view/index.php" class="brand-logo">Rượu Việt Nam</a>
                    <a href="../view/index.php" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <label class="right hide-on-med-and-down">
                    <form action="index.php?act=sanpham" method="post">
                    <input type="text" class="search-box" name="kyw" placeholder="Nhập từ khóa tìm kiếm" style="left:100px; width: 200px; height:25px" >
                    <button type="submit" class="search-button" name="timkiem">Tìm kiếm</button></form>
                    </label>
                </div>
            </nav>
        </div>
        <div class="navbar-fixed">
            <nav class="brown darken-2" id="menu">
                <div class="nav-wrapper container" >
                        <ul id="nav-mobile" class="left hide-on-med-and-down">
                        <li>
                            <a href="../view/index.php"> Trang chủ<i class="material-icons left">home</i></a>
                        </li>
                        <li>
                            <a href="../view/index.php#menu">Danh mục loại hàng<i class="material-icons left">content_paste</i></a>
                            <ul>
                                <?php 
                                    foreach($dsdm as $dm){
                                        extract($dm);
                                        $linkdm = "../view/index.php?act=sanpham&iddm=".$id;
                                ?>
                                 <li><a href="<?php echo $linkdm?>"><?php echo $dm['name'] ?></a></li>
                                <?php
                                    }
                                
                                ?>
                                
                            </ul> 
                        </li>
                        <li>
                            <a href="../view/index.php#top5">Top 5 yêu thích<i class="material-icons left">content_paste</i></a>
                            <ul>
                                <?php
                                    foreach($dstop10 as $sp){
                                        extract($sp);
                                        $linksp = "../view/index.php?act=sanphamct&idsp=".$sp['id_sp'];
                                ?>  
                                    <li><a href="<?php echo $linksp?>"><?php echo $sp['name']?></a></li>
                                <?php
                                    }
                                ?>         
                            </ul> 
                        </li>
                        <?php
                            if(isset($_SESSION['user'])){
                                extract($_SESSION['user']);
                        ?>  
                            <li><a href="../cart/viewcart.php">Giỏ hàng</a></li>
                            <li><a href="../cart/mybill.php">Đơn hàng</a></li>
                            <li><a href="../login/edit_tk.php">Cập nhật tài khoản</a></li>
                            <?php if($_SESSION['user']['role']==1){?>
                            <li><a href="../quantri/index.php">Đăng nhập admin</a></li>
                            <?php } ?>
                            <li><a href="../login/thoat.php">Thoát</a></li>
                        <?php        
                            }else{
                        ?>
                             <li><a href="../login-form-20/login-form-20/dangky.php">Sign up/Sign in</a></li>
                        <?php
                               
                            }
                        ?>
                    </ul>
                </div>           
            </nav>
        </div>
   
        <br>                      
        <div class="row">
        <div class="col s12 m4 l2"></div>
        <div class="col s12 m4 l8" style="background-color: black;"><h5><b style="color: white";>Giỏ hàng</b></h5></div>
        <div class="col s12 m4 l2"></div>
        </div>

        <div class="row">
        <div class="col s12 m4 l2"></div>
        <div class="col s12 m4 l8">
        <table class="highlight">
            <thead>
                <tr>
                    <th>Hình</th>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
                </thead>
                <?php
                    $tong = 0;
                    $i = 0;
                    foreach($_SESSION['mycart'] as $cart){
                        $ttien = $cart[3]*$cart[4];
                        $tong += $ttien;
                    
                ?>
                
                    <tbody>
                    <tr>
                        <td><img src="<?php echo $cart[2]?>" alt=""></td>
                        <td><?php echo $cart[1]?></td>
                        <td><?php echo $cart[3]?></td>
                        <td><?php echo $cart[4]?></td>
                        <td><?php echo $ttien?></td>
                            
                    </tr>
                    </tbody>
                <?php
                $i+=1;
                    }
                ?>
                <tbody>
                    <tr>
                    <td>Tổng đơn hàng</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo $tong?></td>               
                    </tr>
                </tbody>
        </table>
        </div>
        <div class="col s12 m4 l2"></div>
        </div>
        <?php
            if(isset($listbill)){
                extract($listbill);
            }

        ?>
        <div class="row">
        <div class="col s12 m4 l2"></div>
        <div class="col s12 m4 l8" style="background-color: black;"><h5><b style="color: white">Phương thức thanh toán</b></h5></div>
        <div class="col s12 m4 l2"></div>
        </div>
        
        <div class="row">
        <div class="col s12 m4 l2"></div>
        <div class="col s12 m4 l8">
        <h6 style="font-size:25px; font-weight: 100;" class="center-align"><?php echo $listbill['bill_pttt']?></h6>
            

        </div>
        <div class="col s12 m4 l2"></div>
        </div>
        
        <div class="row">
        <div class="col s12 m4 l2"></div>
        <div class="col s12 m4 l8" style="background-color: black;"><h5><b style="color: white">Thông tin đặt hàng</b></h5></div>
        <div class="col s12 m4 l2"></div>
        </div>

        <div class="row">
        <div class="col s12 m4 l2"></div>
        <div class="col s12 m4 l8">
        <table class="highlight">
            <thead>
                <tr>
                    <th>Họ và tên</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Tổng tiền</th>
                    <th>Ngày đặt hàng</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                      <td><?php echo $listbill['bill_name']?></td>
                      <td><?php echo $listbill['bill_address']?></td>
                      <td><?php echo $listbill['bill_tel']?></td>
                      <td><?php echo $listbill['bill_email']?></td>
                      <td><?php echo $listbill['total']?></td>
                      <td><?php echo $listbill['ngaydathang']?></td>
                    </tr>
                    </tbody>
        </table>
    
    
    
    
        </div>
        <div class="col s12 m4 l2"></div>
        </div>

        <div class="col s12 m4 l2"></div>
        </div>
        <div class="row">
        <div class="col s12 m4 l2"></div>
        <div class="col s12 m4 l8" style="background-color: black;"><h5><b style="color: white">Mã đơn hàng</b></h5></div>
        <div class="col s12 m4 l2"></div>
        </div>
        <div class="row">
        <div class="col s12 m4 l2"></div>
        <div class="col s12 m4 l8">
            <h6 style="font-size:25px; font-weight: 100;" class="center-align">DHCB-<?php echo $listbill['id_bill']?></h6>
        </div>
        <div class="col s12 m4 l2"></div>
        </div>
        <div class="row">
        <div class="col s12 m4 l2"></div>
        <div class="col s12 m4 l8" style="background-color: black;"><h5><b style="color: white";>Cảm ơn quý khách</b></h5></div>
        <div class="col s12 m4 l2"></div>
        </div>
        <div class="row">
        <div class="col s12 m4 l2"></div>
        <div class="col s12 m4 l8">
            <h6 style="color:brown; font-size:25px; font-weight: 900;" class="center-align">Cảm ơn quý khách đã đặt hàng!!!</h6>
        </div>
        <div class="col s12 m4 l2"></div>
        </div>
                           
</body>
