<?php
    session_start();
    require "../model/pdo.php";
    require "../model/sanpham.php";
    require "../model/danhmuc.php";
    require "../model/taikhoan.php";
    require "cart.php";

    $dstop10 = loadall_sanpham_top10();
    $dsdm = loadall_danhmuc();

    $listbill = loadall_bill($_SESSION['user']['id_nguoidung']);
    
   
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
            color: white;
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
                            <li><a href="../cart/mybill.php">Đơn hàng của tôi</a></li>
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
        <div class="col s12 m4 l8" style="background-color: black;"><h5><b style="color: white";>Đơn hàng của tôi</b></h5></div>
        <div class="col s12 m4 l2"></div>
        </div>

        <div class="row">
        <div class="col s12 m4 l2"></div>
        <div class="col s12 m4 l8">
        <table class="highlight">
            <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Ngày đặt</th>
                <th>Số lượng mặt hàng</th>
                <th>Tổng giá trị đơn hàng</th>
                <th>Tình trạng đơn hàng</th>
            </tr>
            </thead>
            <?php
                if(isset($listbill)){
                    foreach ($listbill as $bill){
                        extract($bill);
                        $countsp = loadall_cart_count($bill['id_bill']);
                        // echo "<pre>";
                        // print_r($countsp);
                        // echo "</pre>";
                        $ttdh= get_ttdh($bill['bill_status']);
            ?>
            <tbody>
            <tr>
                <td>DHCB-<?php echo $bill['id_bill']?></td>
                <td><?php echo $bill['ngaydathang']?></td>
                <td><?php echo $countsp?></td>
                <td><?php echo $bill['total']?></td>    
                <td><?php echo $ttdh?></td>        
            </tr>
            </tbody>
            <?php
                    }
                }
            ?>               
            
        </table>
        </div>
        <div class="col s12 m4 l2"></div>
        </div>
    </div>
                    
</body>
    