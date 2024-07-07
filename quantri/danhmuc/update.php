<?php
    if(is_array($dm)){
        extract($dm);
    }
?>

<div class="row">
            <div class="row fratitle">
                <h3>Cập nhật loại hàng hóa</h3>
            </div>
            <form action="index.php?act=updatedm" method="post">
                <div class="row mb10">
                    Mã loại <br>
                    <input type="text" name="maloai" id="mb10">
                    <br>
                </div>
                <div class="row mb10">
                    Tên loại <br>
                    <input type="text" name="tenloai" id="mb10" value="<?php if(isset($name)&&($name!="")) echo $name; ?>">
                    <br>
                    <br>
                </div>
                <div class="row mb10">
                    <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id; ?>">
                    <input type="submit" name="capnhat" id="" value="Cập nhật" >
                    <input type="reset" name="" id="" value="Nhập lại">
                    <a href="index.php?act=lisdm"><input type="button" value="Danh sách"></a>

                </div>
                <?php
                    if(isset($thongbao)&&($thongbao!="")){
                        echo $thongbao;
                    }

                ?>
            </form>
        </div>