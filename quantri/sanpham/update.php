<?php
    if(is_array($sp)){
        extract($sp);
    }
    $hinhpath="../upload/".$img;
    if(is_file($hinhpath)){
        $img = " <img src='".$hinhpath."' heigth='50px'; width='50px' >";
    }else{
        $img = "no photo";
    }
?>


<div class="row">
            <div class="row fratitle">
                <h3>Cập nhật sản phẩm</h3>
            </div>
            
            <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
                <div class="row mb10">
                    <select name="iddm" id="">
                    <?php
                        foreach ($listdanhmuc as $danhmuc){
                            extract($danhmuc);
                            if($danhmuc['id']==$sp['id']){  
                    ?>
                            <option value="<?php echo $danhmuc['id']?>" selected><?php echo $danhmuc['name']?></option>
                    <?php
                            }else{
                    ?>
                            <option value="<?php echo $danhmuc['id']?>" ><?php echo $danhmuc['name']?></option>
                    <?php
                            }
                    }
                    ?>  
                    <?php
                    echo "<pre>";
                    print_r($danhmuc);
                    echo "</pre>";
                    ?>
                        <input type="submit" name="listok" value="Go">                       
                    </select>
                </div>
                <div class="row mb10">
                    Tên sản phẩm <br>
                    <input type="text" name="tensp" id="mb10" value="<?=$sp['name']?>">
                    <br>
                    <br>
                </div>
                <div class="row mb10">
                    Giá sản phẩm <br>
                    <input type="text" name="giasp" id="mb10" value="<?=$price?>">
                    <br>
                    <br>
                </div>
                <div class="row mb10">
                    Hình sản phẩm <br>
                   <input type="file" name="hinh" id="" value="<?=$img?>">
                    <br>
                    <?=$img?>
                    <br>
                </div>
                <div class="row mb10">
                    Mô tả <br>
                    <textarea name="mota" id="" cols="30" rows="10"><?=$des?></textarea>
                    <br>
                    <br>
                </div>

                <div class="row mb10">
                    <input type="hidden" name="id" value="<?=$id_sp?>">
                    <input type="submit" name="capnhat" id="" value="Cập nhật" >
                    <input type="reset" name="" id="" value="Nhập lại">
                    <a href="index.php?act=lissp"><input type="button" value="Danh sách"></a>

                </div>
                <?php
                    if(isset($thongbao)&&($thongbao!="")){
                        echo $thongbao;
                    }

                ?>
            </form>
        </div>