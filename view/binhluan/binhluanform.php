<?php
    session_start();
    require "../../model/pdo.php";
    require "../../model/binhluan.php";
    $id_sp = $_REQUEST['id_sp'];
    $dsbl = loadall_binhluan($id_sp);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Pacifico&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/d6a8ce8d77.js" crossorigin="anonymous"></script>
    <title>Rượu Việt Nam</title>

    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/detail.css" />
    <style>
        .binhluan{
            height: 350px;
            background-color:pink;
        }
    </style>
</head>
                <span>Bình luận: </span>   
                <div class="binhluan" id="binhluan">
                    <table>
                    <tr>
                        <th>User</th>
                        <th>Nội dung</th>
                        <th>Ngày bình luận</th>
                    </tr>
                    <?php
                    foreach($dsbl as $bl){
                        extract($bl);
                    ?>
                        <tr>
                            <td><?php echo $bl['id_nguoidung'] ?></td>
                            <td><?php echo $bl['noidung'] ?></td>
                            <td><?php echo $bl['ngaybinhluan'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                </div>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="id_sp" value="<?php echo $id_sp?>">
                    <input type="text" class="search-box" name="noidung" placeholder="Bình luận" style="left:100px; width: 200px; height:25px; color:black" >
                    <input type="submit" name="guibinhluan" value="Bình luận" class="search-button">             
                </form>   

<body>
    

<?php
if(isset($_POST['guibinhluan'])&&($_POST['guibinhluan'])){
    $noidung = $_POST['noidung'];
    $id_sp = $_POST['id_sp'];
    $id_nguoidung = $_SESSION['user']['id_nguoidung'];
    $ngaybinhluan = date("h:i:sa d/m/Y");
    insert_binhluan($noidung,$id_sp,$id_nguoidung,$ngaybinhluan);
    header("Location:". $_SERVER['HTTP_REFERER']);
}
?>