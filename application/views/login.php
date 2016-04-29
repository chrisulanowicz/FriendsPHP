<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Belt Exam" />
	<title>Login/Registration</title>
	<link rel="stylesheet" href="<?=base_url();?>/user_guide/_static/css/style.css" />
</head>
<body>
	<div id="container">
		<div class="errors">
		<?php
			if($this->session->flashdata('success'))
			{
				echo $this->session->flashdata('success');
			}
			elseif($this->session->flashdata('errors'))
			{
				echo "<p id='errors'>" . $this->session->flashdata('errors') . "</p>";
			}
		?>
		</div>
		<h2>Welcome!</h2>
		<form id="login" action="/Users/authenticate" method="post">
			<fieldset>
				<legend>Log In</legend>
					<p>Email:</p><input type="text" name="email" />
					<p>Password:</p><input type="password" name="password1" />
					<input class="button" type="submit" value="Login" />
			</fieldset>
		</form>
		<form id="register" action="/Users/create" method="post">
			<fieldset>
				<legend>Register</legend>
					<p>Name:</p><input type="text" name="name" />
					<p>Alias:</p><input type="text" name="alias" />
					<p>Email:</p><input type="text" name="email" />
					<p>Password</p><input type="password" name="password" />
					<h6>*Password should be at least 8 characters</h6>
					<p>Confirm Password:</p><input type="password" name="confirm_pw" />
					<p>Date of Birth:</p><input type="date" name="birthday" />
					<input class="button" type="submit" value="Register" />
			</fieldset>
		</form>
	</div>
</body>
</html>