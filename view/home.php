<div class="row" id="menu" style="padding-left: 50px; padding-right: 50px">
        <div class="container">
            
            <h2 class="header center">Danh sách rượu</h2>

            <?php
                foreach($spnew as $sp){
                    extract($sp);
                    
            ?> 
            <div class="col s12 m6 l4" style="padding: 30px 5px">
                <a href="index.php?act=sanphamct&idsp=<?php echo $sp['id_sp']?>">
                    <div class="card" style="height:580px">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="<?php echo $sp['img']?>" />
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4" style="font-weight: 500">
                            <?php echo $sp['name']?></span>
                            <span style="color:red;font-weight: 500">Giá: <?php echo $sp['price']?> đ</span>
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

   