






<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
	<title>Login V4</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href=" images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href=" vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href=" vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" css/util.css">
	<link rel="stylesheet" type="text/css" href=" css/main.css">
<!--===============================================================================================-->
<?php 
        include '..\..\model\connectDB.php';
        use model\connectDB;
        $connectDB=new connectDB("tctdlich");
        $connectDB->connect();
    ?>
</head>
<body >
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url(' images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="POST" action="">
					<span class="login100-form-title p-b-49">
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100" style="font-family: 'Roboto', sans-serif;">Nhập tên</span>
						<input class="input100" type="text" name="username" placeholder="Type your username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100" style="font-family: 'Roboto', sans-serif;">Nhập mật khẩu</span>
						<input class="input100" type="password" name="pass" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="#" style="font-family: 'Roboto', sans-serif;">
							Quên mật khẩu
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<input class="login100-form-btn" type="submit" name="login" style="background: red"
								value="login" >
                          
						</div>
					</div>
                </form>
                <?php 
                if(isset($_POST["login"])){
                    $name=$_POST["username"];
                    if(isset($_POST["username"])){
                        $name=$_POST["username"];
                    }
                    $pass=$_POST["pass"];
                    if(isset($_POST["pass"])){
                        $pass=$_POST["pass"];
                    }
                    $select="select * from acountadmin where UserName='". $name."'  and Pass='".$pass."'";
                    $result=mysqli_query( $connectDB->conn, $select);
                    if(mysqli_num_rows($result)>0){
                         echo "Đăng nhập thành công";
                         $_SESSION['name'] = $name;
                         $_SESSION['pass'] = $pass;
                         header('Location: ../../admin/index.php');
                    }
                    else{
                        echo "Đăng nhập thất bại";
                    }
                }
               ?>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src=" vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src=" vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src=" vendor/bootstrap/js/popper.js"></script>
	<script src=" vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src=" vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src=" vendor/daterangepicker/moment.min.js"></script>
	<script src=" vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src=" vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src=" js/main.js"></script>

</body>
</html>



















