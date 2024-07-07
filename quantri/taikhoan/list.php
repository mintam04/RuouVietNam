<div class="row">
    <div class="row fratitle">
        <h1>Danh sách tài khoản</h1>
    </div>   
    <div class="row">
        <table  class="row">
            <tr class="danhmuc">
                <th></th>
                <th>Mã TK</th>
                <th>Tên đăng nhập</th>
                <th>Mật khẩu</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Vai trò</th>
                <th></th>
            </tr>
            <?php
                foreach($listtaikhoan as $taikhoan ){
                    extract($taikhoan);
                    $suatk = "index.php?act=suatk&id=".$id_nguoidung;
                    $xoatk = "index.php?act=xoatk&id=".$id_nguoidung;
                echo '<tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>'.$id_nguoidung.'</td>
                    <td>'.$user.'</td>
                    <td>'.$pass.'</td>
                    <td>'.$email.'</td>
                    <td>'.$address.'</td>
                    <td>'.$tel.'</td>
                    <td>'.$role.'</td>
                    </tr>
                ';

            }
            ?>
           
        </table>
    </div>
    
</div>