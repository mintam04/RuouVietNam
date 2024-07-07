
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
    <link rel="stylesheet" href="css/detail.css" />
    <style>
        .binhluan{
            height: 150px;
            background-color:pink;
        }
    </style>
</head>

<body>
    
    <div class="row" id="menu" style="padding-left: 50px; padding-right: 50px">
        <div class="container info">
            <?php
                extract($onesp);
            ?>
            
            <div class="box-left">
                <img src="<?php echo $onesp['img'] ?>" width="100%" alt="" />
            </div>
            <div class="box-right">
                <h3><?php echo $onesp['name'] ?></h3>

                <div class="is-divider"></div>
                <p class="price"><?php echo $onesp['price'] ?>đ</p>
                <p>
                <?php echo $onesp['des'] ?>
                </p>
                <form action="../cart/viewcart.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $onesp['id_sp']?>">
                                <input type="hidden" name="name" value="<?php echo $onesp['name']?>">
                                <input type="hidden" name="img" value="<?php echo $onesp['img']?>">
                                <input type="hidden" name="price" value="<?php echo $onesp['price']?>">
                                <input type="submit" value="Thêm vào giỏ hàng" name="addtocart" style="background-color:brown !important;">
                                <!-- <a href="" name="addtocart"><i class="material-icons right">add_shopping_cart</i></a>                          -->
                </form>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                        $("#binhluan").load("binhluan/binhluanform.php", {id_sp: <?php echo $id_sp?>});
                    });  
                </script>
                <div id="binhluan">
                   
                </div>
                            
            </div>
        </div>
    </div>
    <div class="row" id="menu" style="padding-left: 50px; padding-right: 50px">
        <div class="container">
            
            <h2 class="header center">Danh sách rượu cùng loại</h2>

            <?php
                foreach($spcungloai as $spCL){
                    extract($spCL);
                
            ?> 
            <div class="col s12 m6 l4" style="padding: 30px 5px">
                <a href="index.php?act=sanphamct&idsp=<?php echo $spCL['id_sp']?>">
                    <div class="card" style="height:580px">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="<?php echo $spCL['img']?>" />
                        </div>
                        <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4" style="font-weight: 500">
                            <?php echo $sp['name']?></span>
                            <span style="color: red;font-weight: 500">Giá: <?php echo $sp['price']?> đ</span>
                            <form action="../cart/viewcart.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $sp['id_sp']?>">
                                <input type="hidden" name="name" value="<?php echo $sp['name']?>">
                                <input type="hidden" name="img" value="<?php echo $sp['img']?>">
                                <input type="hidden" name="price" value="<?php echo $sp['price']?>">
                                <input type="submit" value="Thêm vào giỏ hàng" name="addtocart" style="background-color:brown !important;">
                                <!-- <a href="" name="addtocart"><i class="material-icons right">add_shopping_cart</i></a>                          -->
                            </form>
                        </div>
                    </div>
                </a>
            </div>  

            <?php
                }
            ?>
            
               
        </div>
</div>

    