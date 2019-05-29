<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link href="<?= URL ?>/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!--===============================================================================================-->
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= URL . URL_LOGIN ?>images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= URL . URL_LOGIN ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= URL . URL_LOGIN ?>fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= URL . URL_LOGIN ?>vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= URL . URL_LOGIN ?>vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= URL . URL_LOGIN ?>vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= URL . URL_LOGIN ?>vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= URL . URL_LOGIN ?>vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= URL . URL_LOGIN ?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= URL . URL_LOGIN ?>css/main.css">
	<!--===============================================================================================-->
</head>

<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?= URL . URL_LOGIN ?>images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-40 p-b-20">
				<form class="login100-form validate-form" action="<?= URL ?>/login/login" method="POST">
					<span class="login100-form-title p-b-20">Login</span>
					<?php if (@$_GET['error'] == 1) : ?>
					<span class="text-danger flex-col-c">*username or password is incorrect*</span>
					<?php endif; ?>
					<?php if (@$_GET['error'] == 2) : ?>
					<span class="text-danger text-center">*this account is not active*</span>
					<?php endif; ?>

					<div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Type your username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="flex-sb-m">
						<div class="form-check text-left p-t-8 p-b-20">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" name="remember" id="" value="checkedValue" checked>
								Remember me
							</label>
						</div>

						<div class="text-right p-t-8 p-b-20">
							<a href="#">
								Forgot password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="submit" value="submit">
								Login
							</button>
						</div>
					</div>
					<div class="txt1 text-center p-t-40 p-b-20">
						<span>
							Or Sign Up Using
						</span>
					</div>
					<div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>
						<a href="#" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>
						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div>
					<div class="flex-col-c p-t-15">
						<a href="<?= URL ?>/register" class="txt2">
							Sign Up
						</a>
					</div>
					<!--  -->
				</form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="<?= URL ?>/libs/jquery-3.3.1.min.js"></script>
	<script src="<?= URL ?>/libs/bootstrap/js/popper.js"></script>
	<script src="<?= URL ?>/libs/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= URL . URL_LOGIN ?>vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= URL . URL_LOGIN ?>vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= URL . URL_LOGIN ?>vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= URL . URL_LOGIN ?>vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="<?= URL . URL_LOGIN ?>vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="<?= URL . URL_LOGIN ?>js/main.js"></script>
</body>

</html>