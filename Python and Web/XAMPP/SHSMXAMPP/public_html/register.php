<?php

require_once 'core/init.php';

if (Input::exists()) {
    if(Token::check(Input::get('token'))) {
      echo "Well you did something wrong.... not me...... <br>";
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'FirstName' => array(
                'name' => 'FirstName',
                'required' => true,
                'min' => 2,
                'max' => 50
            ),
            'LastName' => array(
                'name' => 'LastName',
                'required' => true,
                'min' => 2,
                'max' => 50
            ),
            'ID' => array(
                'name' => 'ID',
                'required' => true,
                'min' => 2,
                'max' => 20,
                'unique' => 'login'
            ),
            'password' => array(
                'name' => 'password',
                'required' => true,
                'min' => 6
            ),
            'password_again' => array(
                'required' => true,
                'matches' => 'password'
            ),
            'role' => array(
              'name' => 'role',
              'required' => true
            ),
        ));
        if ($validate->passed()) {
            if(Input::get('role') == 'Teacher'){
              $teacher = 1;
            }
            try {
              $user = new User();

              $arr = array('ID' => Input::get('ID'));
              foreach($user->perms() as $key => $data){
                if($key != "ID" && $key != "Admin"){
                    echo $key;
                    $arr[$key] = isset($_POST[$key]) ? 1 : 0;
                  }
                }

                $user->create(array(
                    'FirstName' => Input::get('FirstName'),
                    'ID' => Input::get('ID'),
                    'LastName'=>Input::get("LastName"),
                    'password' => password_hash(Input::get('password'),PASSWORD_DEFAULT),
                    'Teacher' => $teacher
                ),
                  $arr
              );
                Session::flash('home', 'Welcome ' . Input::get('FirstName') . '! Your account has been registered. You may now log in.');
            #    Redirect::to('login.php');
            } catch(Exception $e) {
                echo $e, '<br>';
            }
        } else {
            foreach ($validate->errors() as $error) {
                echo $error . "<br>";
            }
        }
    }
}
?>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="bootstrap/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="bootstrap/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
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
          <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

					<span class="login100-form-logo">
            <img src="bootstrap/images/icons/SHSM.ico"style="width:90%;"></img>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Register
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter First Name">
						<input class="input100" type="text" name="FirstName" placeholder="First Name" value="<?php echo escape(Input::get('FirstName')); ?>">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
          <div class="wrap-input100 validate-input" data-validate = "Enter Last Name">
						<input class="input100" type="text" name="LastName" placeholder="Last Name" value="<?php echo escape(Input::get('LastName')); ?>">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="ID" placeholder="Username"value="<?php echo escape(Input::get('ID')); ?>">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter password again">
						<input class="input100" type="password" name="password_again" placeholder="Enter Password Again">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

          <div class="radio" style="color:white">
            <label style="display:inline;"><input type="radio" name="role" value="Teacher"><b style="padding-left:1%;">Teacher</b></label>
            <label style="display:inline; float:right;padding-right:5%;"><input type="radio" name="role" value="Student"><b style="padding-left:0%;">Student</b></label>
          </div>
          <br>
          <b>
          <span class="checkbox checkbox-inline" style="color:white">
            <label class="checkbox-inline" style="text-align:left !important; display:inline;"><input type="checkbox" name="Manufacturing"value="Manufacturing" style="">Manufacturing</label>
          </span>
          <span class="checkbox checkbox-inline" style="float:right;color:white;">
            <label class="checkbox-inline" style="text-align:right !important; display:inline;"><input type="checkbox" name="Justice"value="Justice">Justice</label>
          </span>
        </b>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Register
						</button>
					</div>
        </form>
          <br>
            <form action="login.php">
              <div class="container-login100-form-btn">
                <button type="submit" class="login100-form-btn">
                  Login
                </input>
              </div>

          </form>


				<!--	<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>-->
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
