<?php
session_start();
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

    <link rel="stylesheet" href="css/style.css" />
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
        .search-button{
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
                    <a href="index.php" class="brand-logo">Rượu Việt Nam</a>
                    <a href="index.php" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <label class="right hide-on-med-and-down">
                    <form action="index.php?act=sanpham" method="post">
                    <input type="text" class="search-box" name="kyw" placeholder="Nhập từ khóa tìm kiếm" style="left:100px; width: 200px; height:25px" >
                    <button type="submit" class="search-button" name="timkiem">Tìm kiếm</button></form>
                    </label>
                </div>
            </nav>
        </div>
        <?php
            if(isset($_SESSION['user'])){
                extract($_SESSION['user']);

        ?>
        <div class="navbar-fixed">
            <nav class="brown darken-2" id="menu">
                <div class="nav-wrapper container" >
                    <ul id="nav-mobile" class="left hide-on-med-and-down">
                            <li><a href="../cart/viewcart.php">Giỏ hàng</a></li>
                            <li><a href="../cart/mybill.php">Đơn hàng của tôi</a></li>
                            <li><a href="../login-form-20/login-form-20/edit_tk.php">Cập nhật tài khoản</a></li>
                            <?php if($_SESSION['user']['role']==1){?>
                            <li><a href="../quantri/index.php">Đăng nhập admin</a></li>
                            <?php } ?>
                            <li><a href="../login/thoat.php">Thoát</a></li>
                        
                        
                    </ul>
                </div>           
            </nav>
        </div>
        <?php
            }
        ?>
        <div class="navbar-fixed">
            <nav class="brown darken-2" id="menu">
                <div class="nav-wrapper container" >
                        <ul id="nav-mobile" class="left hide-on-med-and-down">
                        <li>
                            <a href="index.php"> Trang chủ<i class="material-icons left">home</i></a>
                        </li>
                        <li>
                            <a href="index.php#menu">Danh mục loại hàng<i class="material-icons left">content_paste</i></a>
                            <ul>
                                <?php 
                                    foreach($dsdm as $dm){
                                        extract($dm);
                                        $linkdm = "index.php?act=sanpham&iddm=".$id;
                                ?>
                                 <li><a href="<?php echo $linkdm?>"><?php echo $dm['name'] ?></a></li>
                                <?php
                                    }
                                
                                ?>
                                
                            </ul> 
                        </li>
                        <li>
                            <a href="index.php#menu">Top 5 yêu thích<i class="material-icons left">content_paste</i></a>
                            <ul>
                                <?php
                                    foreach($dstop10 as $sp){
                                        extract($sp);
                                        $linksp = "index.php?act=sanphamct&idsp=".$sp['id_sp'];
                                ?>  
                                    <li><a href="<?php echo $linksp?>"><?php echo $sp['name']?></a></li>
                                <?php
                                    }
                                ?>         
                            </ul> 
                        </li>
                        <li><a href="index.php#aboutus">Thông tin thêm</a></li>
                        <li><a href="index.php#contact">Tricks uống rượu</a></li>
                        <?php
                            if(isset($_SESSION['user'])){
                                extract($_SESSION['user']);
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
    <div class="slider">
        <ul class="slides">
            <li>
                <img src="image/bakichbanner.png" alt="" />
                <div class="caption center-align white-text">
                    <h3>Rượu Việt Nam</h3>
                    <h5 class="light text-lighten-3">Ba kích</h5>
                </div>
            </li>
            <li>
                <img src="image/nepcaihoavangbanner.jpg" alt="" />
                <div class="caption center-align white-text">
                    <h3 style="color: #295f2d">Rượu Việt Nam</h3>
                    <h5 class="light text-lighten-3">Nếp cái hoa vàng</h5>
                </div>
            </li>
            <li>
                <img src="image/mobanner.jpg" alt="" />
                <div class="caption center-align white-text">
                    <h3 style="color: black">Rượu Việt Nam</h3>
                    <h5 style="color: black" class="light text-lighten-3">Rượu mơ</h5>
                </div>
            </li>
        </ul>
    </div>

    <div class="section white center">
        <h2 class="header">Rượu Việt Nam</h2>
        <div class="row container">
            <div class="col l8 s12 center-align move">
                Rượu Việt Nam đã có từ rất lâu đời, được lưu truyền qua các thế hệ và trở thành một phần của văn hóa
                ẩm thực của đất nước. Những chiếc thùng gỗ thông được sử dụng để ủ rượu, cùng với các loại cối xay
                giặt, là những công cụ truyền thống được sử dụng để chưng cất và sản xuất rượu. Trong tục lệ và tập
                quán của người Việt, việc uống rượu không chỉ đơn thuần là việc thưởng thức một loại đồ uống, mà còn
                thể hiện tình cảm, lòng biết ơn, chân thành và lòng trung thành giữa các gia đình và bạn bè. Uống
                rượu cũng là một phần của cuộc sống xã hội, giúp cho tinh thần đoàn kết và hòa thuận trong cộng
                đồng.
            </div>
            <div class="col l4 s12 center">
                <img src="image/ruounep.png" style="object-fit: contain" height="200px" width="auto" alt="" />
            </div>
        </div>
    </div>

    <div class="parallax-container">
        <div class="parallax">
            <img src="image/background.jpeg" />
        </div>
    </div>