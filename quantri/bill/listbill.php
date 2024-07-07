<div class="row">
    <div class="row fratitle">
        <h1>Danh sách đơn hàng</h1>
    </div>   
    <form action="index.php?act=listbill" method="post">
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
                <th>Mã đơn hàng</th>
                <th>Khách hàng</th>
                <th>Số lượng hàng</th>
                <th>Giá trị đơn hàng</th>
                <th>Ngày đặt hàng</th>
                <th>Tình trạng đơn hàng</th>
                <th>Thao tác</th>
                <th></th>
            </tr>
            <?php
                foreach ($listbill as $bill){
                    extract($bill);
                    $suadh = "index.php?act=suadh&id=".$bill['id_bill'];
                    $xoadh = "index.php?act=xoadh&id=".$bill['id_bill'];
                    $countsp = loadall_cart_count($bill['id_bill']);
                    $ttdh= get_ttdh($bill['bill_status']);
                    $kh = $bill['bill_name']."<br>".$bill['bill_tel']."<br>".$bill['bill_address']."<br>".$bill['bill_email']
            ?>
                <tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>DHCB-<?php echo $bill['id_bill'] ?></td>
                <td><?php echo $kh ?></td>
                <td><?php echo $countsp ?></td>
                <td><?php echo $bill['total']?> VNĐ</td>
                <td><?php echo $bill['ngaydathang']?></td>
                <td><?php echo $ttdh?></td>
                <td><a href="<?php echo $suadh?>"><input type="button" value="Sửa"> </a>| <a href="<?php echo $xoadh?>"><input type="button" value="Xóa"></td></a>
            </tr>
            <?php
                }
            ?>
            
           
        </table>
    </div>
    
</div>