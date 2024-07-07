<div class="row">
    <div class="row fratitle">
        <h1>Danh sách sản phẩm</h1>
    </div>   
    <form action="index.php?act=lissp" method="post">
            <input type="text" name="kyw" id="">
            <select name="iddm" id="">
                <option value="0" selected>Tất cả</option>
                <?php
                    foreach ($listdanhmuc as $danhmuc){
                        extract($danhmuc);
                ?>
                    <option value="<?php echo $danhmuc['id']?>"><?php echo $danhmuc['name']?></option>
                <?php
                }
                ?>  
                <input type="submit" name="listok" value="Go">                       
            </select>
        </form>
    <div class="row">
        <table  class="row">
            <tr class="danhmuc">
                <th></th>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Hình</th>
                <th>Lượt xem</th>
                <th></th>
            </tr>
            <?php
                foreach($listsanpham as $sanpham ){
                    extract($sanpham);
                    $suasp = "index.php?act=suasp&id=".$id_sp;
                    $xoasp = "index.php?act=xoasp&id=".$id_sp;
                    $hinhpath="../upload/".$img;
                    if(is_file($hinhpath)){
                        $img = " <img src='".$hinhpath."' heigth='50px'; width='50px' >";
                    }else{
                        $img = "no photo";
                    }
                echo '<tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>'.$id_sp.'</td>
                    <td>'.$name.'</td>
                    <td>'.$price.'</td>
                    <td>'.$img.'</td>
                    <td>'.$view.'</td>
                    <td><a href="'.$suasp.'"><input type="button" value="Sửa"></a>| <a href="'.$xoasp.'"><input type="button" value="Xóa"></td></a>
                    </tr>
                ';
               

            }
            ?>
           
        </table>
    </div>
    <div class="row mb10">
        <input type="button" value="Chọn tất cả">
        <input type="button" value="Bỏ chọn tất cả">
        <input type="button" value="Xóa các mục đã chọn">
        <a href="index.php?act=addsp"><input type="button" value="Nhập thêm"></a>
    </div>
</div>