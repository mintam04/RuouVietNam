<?php 
session_start();
require "../../model/pdo.php";

if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
    $id = $_SESSION['user']['id_nguoidung'];
    $sql = "select * from nguoidung WHERE `id_nguoidung`='".$id."'";
    $checkUser=pdo_query_one($sql);
    // echo "<pre>";
    // print_r($checkUser);
    // echo "</pre>";
}

if(isset($_POST['capnhat'])&&($_POST['capnhat'])) {   
    $user=$_POST['user'];
    $pass=$_POST['pass'];     
    $email=$_POST['email'];     
    $address=$_POST['address'];
    $tel=$_POST['tel'];          
    $sql = "UPDATE `nguoidung` SET `user` = '{$user}', `pass` = '{$pass}', `email` = '{$email}', `address` = '{$address}', `tel` = '{$tel}' WHERE `id_nguoidung` = {$id}";
    pdo_execute($sql);
   
    header("Location:../../view/index.php");
    
  }       

?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Đăng nhập</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">
  	<style>
		.thongbao{
			color: red;
		}
	</style>
	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Cật nhật tài khoản</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	
                  <?php
                    if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
                        extract($_SESSION['user']);
                        // echo "<pre>";
                        // print_r($_SESSION['user']);
                        // echo "</pre>";
                    }


                ?>
		      	<form action="" method="post">
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Username" name="user"  value="<?=$checkUser['user']?>">
		      		</div>
                    <div class="form-group">
                    <input id="password-field" type="password" class="form-control" placeholder="Password" name="pass"  value="<?=$checkUser['pass']?>">
    
                    </div>
                    <div class="form-group">
                    <input id="password-field" type="text" class="form-control" placeholder="Email" name="email"  value="<?=$checkUser['email']?>">
             
                    </div>
                    <div class="form-group">
                    <input id="password-field" type="text" class="form-control" placeholder="Address" name="address"  value="<?=$checkUser['address']?>">

                    </div>
                    <div class="form-group">
                    <input id="password-field" type="text" class="form-control" placeholder="Tel" name="tel"  value="<?=$checkUser['tel']?>">
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="id" value="<?=$checkUser['id_nguoidung']?>">
                        <input type="submit" name="capnhat" id="" value="Cập nhật" class="form-control btn btn-primary submit px-3">
						
                    </div>
                    <div class="form-group d-md-flex">
                        <div class="w-50">
                            <label class="checkbox-wrap checkbox-primary">Remember Me
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#" style="color: #fff">Forgot Password</a>
                                    </div>
                    </div>
	          </form>

			  <div>
				<p class="mb-0">Don't have an account? <a href="dangky.php" class="text-white-50 fw-bold">Sign In</a></p>
			  </div>
  				<p class="thongbao">
                <?php
                  if(isset($thongbao)&&($thongbao!="")){
                    echo $thongbao;
                  }
                ?>
                </p>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

