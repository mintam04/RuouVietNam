<div class="row">
    <div class="row fratitle">
        <h1>Danh sách tài khoản</h1>
    </div>   
    <div class="row">
        <table  class="row">
            <tr class="danhmuc">
                <th></th>
                <th>Id</th>
                <th>Nội dung bình luận</th>
                <th>Id Sản phẩm</th>
                <th>Id User</th>
                <th>Ngày bình luận</th>
                <th></th>
            </tr>
            <?php
                foreach($listbinhluan as $binhluan ){
                    extract($binhluan);
                    $xoabl = "index.php?act=xoabl&id=".$id_binhluan;
                echo '<tr>
                    <td><input type="checkbox" name="" id=""></td>                   
                    <td>'.$id_binhluan.'</td>
                    <td>'.$noidung.'</td>
                    <td>'.$id_sp.'</td>
                    <td>'.$id_nguoidung.'</td>
                    <td>'.$ngaybinhluan.'</td>
                    <td></td>
                    <td><a href="'.$xoabl.'"><input type="button" value="Xóa"></td></a>
                    </tr>
                ';

            }
            ?>
           
        </table>
    </div>
   
</div>