<?php

require_once 'core/init.php';

if(Input::exists()) {
    if(Token::check(Input::get('token'))) {

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array('required' => true),
            'password' => array('required' => true)
        ));

        if($validate->passed()) {
            $user = new User();

            $remember = (Input::get('remember') === 'on') ? true : false;
            $login = $user->login(Input::get('username'), Input::get('password'), $remember);

            if($login) {
                Redirect::to('index.php');
            } else {
                echo '<p>Incorrect username or password</p>';
            }
        } else {
            foreach($validate->errors() as $error) {
                echo $error, '<br>';
            }
        }
    }
}
?>
<html lang="en">
<head>
	<title>Login V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="bootstrap/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="bootstrap/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="bootstrap/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="bootstrap/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="bootstrap/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="bootstrap/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="bootstrap/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="bootstrap/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="bootstrap/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/util.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('bootstrap/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</input>
					</div>
					<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

					<!--<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>-->
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="bootstrap/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="bootstrap/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="bootstrap/vendor/bootstrap/js/popper.js"></script>
	<script src="bootstrap/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="bootstrap/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="bootstrap/vendor/daterangepicker/moment.min.js"></script>
	<script src="bootstrap/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="bootstrap/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="bootstrap/js/main.js"></script>

</body>
</html>
