<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V9</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?= URL . URL_IMAGES_LOGIN ?>images/icons/favicon.ico"/>
<!--===============================================================================================-->
<link href="<?= URL ?>/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= URL . URL_FONTS_LOGIN ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= URL . URL_FONTS_LOGIN ?>fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= URL . URL_VENDOR_LOGIN ?>vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= URL . URL_VENDOR_LOGIN ?>vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= URL . URL_VENDOR_LOGIN ?>vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= URL . URL_VENDOR_LOGIN ?>vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= URL . URL_VENDOR_LOGIN ?>vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= URL . URL_CSS_LOGIN ?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= URL . URL_CSS_LOGIN ?>css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="container-login100" style="background-image: url('<?= URL . URL_IMAGES_LOGIN ?>images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" action="<?= URL ?>/login/login" method="POST">
				<span class="login100-form-title p-b-37">Sign In</span>
		<?php if (@$_GET['error'] == 1) : ?>
		<center><span class="text-danger">*username or password is incorrect*</span></center>
		<?php endif; ?>
		<?php if (@$_GET['error'] == 2) : echo "<center><span class=\" text-danger\">*this account is not active*</span></center>"; ?>
        <?php endif; ?>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username">
					<input class="input100" type="text" name="username" placeholder="username">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" type="password" name="password" placeholder="password">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn" type="submit" name="submit" value="submit">
						Sign In
					</button>
				</div>

				<div class="text-center p-t-57 p-b-20">
					<span class="txt1">
						Or login with
					</span>
				</div>

				<div class="flex-c p-b-112">
					<a href="#" class="login100-social-item">
						<i class="fa fa-facebook-f"></i>
					</a>

					<a href="#" class="login100-social-item">
						<img src="<?= URL . URL_IMAGES_LOGIN ?>images/icons/icon-google.png" alt="GOOGLE">
					</a>
				</div>

				<div class="text-center">
					<a href="<?= URL ?>/register" class="txt2 hov1">
						Sign Up
					</a>
				</div>
			</form>
		</div>
	</div>
	
	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?= URL . URL_VENDOR_LOGIN ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= URL . URL_VENDOR_LOGIN ?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= URL . URL_VENDOR_LOGIN ?>vendor/bootstrap/js/popper.js"></script>
	<script src="<?= URL . URL_VENDOR_LOGIN ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= URL . URL_VENDOR_LOGIN ?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= URL . URL_VENDOR_LOGIN ?>vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= URL . URL_VENDOR_LOGIN ?>vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?= URL . URL_VENDOR_LOGIN ?>vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?= URL . URL_JS_LOGIN ?>js/main.js"></script>

</body>
</html>