<div class="row">
            <div class="row fratitle">
                <h3>Thêm mới sản phẩm</h3>
            </div>
            <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
                <div class="row mb10">
                    Danh mục<br>                   
                    <select name="iddm" id="">
                        <?php
                        foreach ($listdanhmuc as $danhmuc){
                            extract($danhmuc);
                        ?>
                            <option value="<?php echo $danhmuc['id']?>"><?php echo $danhmuc['name']?></option>
                        <?php
                        }
                        ?>  
                        
                    </select>
                    <br>
                </div>
                <div class="row mb10">
                    Tên sản phẩm <br>
                    <input type="text" name="tensp" id="mb10">
                    <br>
                    <br>
                </div>
                <div class="row mb10">
                    Giá sản phẩm <br>
                    <input type="text" name="giasp" id="mb10">
                    <br>
                    <br>
                </div>
                <div class="row mb10">
                    Hình sản phẩm <br>
                    <input type="file" name="hinh" id="">
                    <br>
                    <br>
                </div>
                <div class="row mb10">
                    Mô tả <br>
                    <textarea name="mota" id="" cols="30" rows="10"></textarea>
                    <br>
                    <br>
                </div>

                <div class="row mb10">
                    <input type="submit" name="themmoi" id="" value="Thêm mới" >
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