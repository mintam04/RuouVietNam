<?php 
  require "../../model/pdo.php";
  
  	if(isset($_POST['dangky'])&&($_POST['dangky'])) { 
		$error = [];
		if(empty($_POST['user'])){
			$error['user'] = "Bạn cần nhập tên user";
		}else{
			$user=$_POST['user'];
		}
		
		if(empty($_POST['pass'])){
			$error['pass'] = "Bạn cần nhập mật khẩu";
		}else{
			$pass=$_POST['pass'];
		}

		if(empty($_POST['email'])){
			$error['email'] = "Bạn cần nhập email";
		}else{
			$email=$_POST['email'];
		}
    
	
	
	if(!empty($error)){

	}else{
		$sql = "INSERT INTO `nguoidung` (`user`, `pass`, `email`) VALUES ('{$user}', '{$pass} ', '{$email}')";
		pdo_execute($sql);
		$thongbao = "Đã đăng ký thành công. Vui lòng đăng nhập để thực hiện chức năng bình luận hoặc đặt hàng";
	}
   
   
    
  }    

?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Đăng ký</title>
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
					<h2 class="heading-section">Đăng ký thành viên</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Don't have an account?</h3>
		      	<form action="" method="post">
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Username" name="user" value="<?php if(isset($user)) echo $user?>">
						  <p class ="thongbao"><?php if(isset($error['user'])) echo $error['user']?></p>
		      		</div>

                    <div class="form-group">
                    <input id="password-field" type="password" class="form-control" placeholder="Password" name="pass" value="<?php if(isset($pass)) echo $pass?>">
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
					<p class ="thongbao"><?php if(isset($error['pass'])) echo $error['pass']?></p>
                    </div>

                    <div class="form-group">
                    <input id="password-field" type="text" class="form-control" placeholder="Email" name="email" value="<?php if(isset($email)) echo $email?>">
					<p class ="thongbao"><?php if(isset($error['email'])) echo $error['email']?></p>
                    </div>

                    <div class="form-group">
						<input type="submit" name="dangky" id="" value="Đăng ký" class="form-control btn btn-primary submit px-3">
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
				<p class="mb-0">Do have an account? <a href="login.php" class="text-white-50 fw-bold">Sign In</a></p>
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

