<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Bootstrap Simple Registration Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<style>
body {
	color: #fff;
	background: #63738a;
	font-family: 'Roboto', sans-serif;
}
.form-control {
	height: 40px;
	box-shadow: none;
	color: #969fa4;
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 450px;
	margin: 0 auto;
	padding: 30px 0;
  	font-size: 15px;
}
.signup-form h2 {
	color: #636363;
	margin: 0 0 15px;
	position: relative;
	text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
	content: "";
	height: 2px;
	width: 30%;
	background: #d4d4d4;
	position: absolute;
	top: 50%;
	z-index: 2;
}	
.signup-form h2:before {
	left: 0;
}
.signup-form h2:after {
	right: 0;
}
.signup-form .hint-text {
	color: #999;
	margin-bottom: 30px;
	text-align: center;
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #f2f3f7;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
	margin-top: 3px;
}
.signup-form .btn {        
	font-size: 16px;
	font-weight: bold;		
	min-width: 140px;
	outline: none !important;
}
.signup-form .row div:first-child {
	padding-right: 10px;
}
.signup-form .row div:last-child {
	padding-left: 10px;
}    	
.signup-form a {
	color: #fff;
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #5cb85c;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}  
</style>
</head>
<body>
<?php if(isset($_SESSION['error']['uid'])){
	$alert = "<script>alert('Email has been taken')</script>";
	echo $alert;
}
	?>
<div class="signup-form">
    <form action="signup-process.php" method="post">
		<h2>Register</h2>
		<p class="hint-text">Create your account. It's free and only takes a minute.</p>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control <?php if(isset($_SESSION['error']['firstname'])):?>is-invalid<?php endif ?>" 
				name="firstname" placeholder="First Name">
        <?php if(isset($_SESSION['error']['firstname'])):?>
        <div class="invalid-feedback">
            <?php echo $_SESSION['error']['firstname']?>
        </div>
		<?php endif;?>		
		</div>	
		<div class="col"><input type="text" class="form-control <?php if(isset($_SESSION['error']['lastname'])):?>is-invalid<?php endif ?>" 
				name="lastname" placeholder="Last Name">
        <?php if(isset($_SESSION['error']['lastname'])):?>
        <div class="invalid-feedback">
            <?php echo $_SESSION['error']['lastname']?>
        </div>
		<?php endif;?>		
		</div>	
			</div>        	
        </div>
		
		<div class="form-group">
        	<input type="date" class="form-control" name="dateofbirth" placeholder="Date of Birth" required = "required">
        </div>

        <div class="form-group">
        	<input type="email" class="form-control <?php if(isset($_SESSION['error']['email'])):?>is-invalid<?php endif ?>" 
			name="email" placeholder="Email">
			<?php if(isset($_SESSION['error']['email'])):?>
        <div class="invalid-feedback">
            <?php echo $_SESSION['error']['email']?>
        </div>
		<?php endif;?>	
        </div>
		<div class="form-group">
            <input type="password" class="form-control <?php if(isset($_SESSION['error']['password'])):?>is-invalid<?php endif ?>" 
			name="password" placeholder="Password">
			<?php if(isset($_SESSION['error']['password'])):?>
        <div class="invalid-feedback">
            <?php echo $_SESSION['error']['password']?>
        </div>
		<?php endif;?>
        </div>
		<div class="form-group">
            <input type="password" class="form-control <?php if(isset($_SESSION['error']['repeat_password'])):?>is-invalid<?php endif ?>"
			 name="repeat_password" placeholder="Repeat Password">
			 <?php if(isset($_SESSION['error']['repeat_password'])):?>
        <div class="invalid-feedback">
            <?php echo $_SESSION['error']['repeat_password']?>
        </div>
		<?php endif;?>
        </div>        
        <div class="form-group">
			<label class="form-check-label"><input type="checkbox"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
		</div>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
        </div>
    </form>
	<div class="text-center">Already have an account? <a href="../Signin">Sign in</a></div>
</div>
</body>
</html>