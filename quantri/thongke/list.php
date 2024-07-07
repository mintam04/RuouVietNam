<div class="row">
    <div class="row fratitle">
        <h1>Thống kê</h1>
    </div>  
    <div class="row">
        <br>
        <table  class="row">
            <tr class="danhmuc">
                <th>Mã danh mục</th>
                <th>Tên danh mục</th>
                <th>Số lượng hàng</th>
                <th>Giá cao nhất</th>
                <th>Giá thấp nhất</th>
                <th>Giá trung bình</th>
            </tr>
            <?php
                foreach ($listthongke as $thongke){
                    extract($thongke);
            ?>
                <tr>
                <td><?php echo $madm ?></td>
                <td><?php echo $tendm ?></td>
                <td><?php echo $countsp ?></td>
                <td><?php echo $maxprice ?></td>
                <td><?php echo $minprice ?></td>
                <td><?php echo $avgprice ?></td>
            </tr>
            <?php
                }
            ?>
            
           
        </table>
    </div>
    <a href="index.php?act=bieudo"><input type="button" value="Xem biểu đồ"></a>
</div>