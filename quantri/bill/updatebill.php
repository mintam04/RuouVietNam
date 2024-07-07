<?php
    if(is_array($bill)){
        extract($bill);
    }
    
?>

<div class="row">
            <div class="row fratitle">
                <h3>Cập nhật đơn hàng</h3>
            </div>
            
            <form action="index.php?act=updatedh" method="post" >
                <div class="row mb10">
                     Tình trạng giao hàng <br>
                    <input type="text" name="ttgh" id="mb10" value="<?=$bill['bill_status']?>">
                    <br>
                    <br>
                </div>
                <div class="row">
                <table  class="row">
                    <tr class="danhmuc">
                        <th></th>
                        <th>Mã đơn hàng</th>
                        <th>Khách hàng</th>
                        <th>Số lượng hàng</th>
                        <th>Giá trị đơn hàng</th>
                        <th>Ngày đặt hàng</th>
                        <th></th>
                    </tr>
                    <?php
                            $countsp = loadall_cart_count($bill['id_bill']);
                            $kh = $bill['bill_name']."<br>".$bill['bill_tel']."<br>".$bill['bill_address']."<br>".$bill['bill_email'];
                    ?>
                        <tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>DHCB-<?php echo $bill['id_bill'] ?></td>
                        <td><?php echo $kh ?></td>
                        <td><?php echo $countsp ?></td>
                        <td><?php echo $bill['total']?> VNĐ</td>
                        <td><?php echo $bill['ngaydathang']?></td>
                    
                    </tr>
                    </table>
                </div>

                <div class="row mb10">
                    <input type="hidden" name="id" value="<?=$bill['id_bill']?>">
                    <input type="submit" name="capnhat" id="" value="Cập nhật" >
                    <input type="reset" name="" id="" value="Nhập lại">
                    <a href="index.php?act=listbill"><input type="button" value="Danh sách đơn hàng"></a>

                </div>
                <?php
                    if(isset($thongbao)&&($thongbao!="")){
                        echo $thongbao;
                    }

                ?>
            </form>
        </div>