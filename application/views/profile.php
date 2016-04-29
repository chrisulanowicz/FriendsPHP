<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Belt Exam" />
	<title><?= $profile['alias'] ?></title>
	<link rel="stylesheet" href="<?=base_url();?>/user_guide/_static/css/homestyle.css" />
</head>
<body>
	<div id="container">
		<p class="logout"><a href="/Users/logout">Logout</a></p>
		<p class="logout"><a href="/friends">Home</a></p>
		<div id="main_content">
			<h2><?= $profile['alias'] ?>'s Profile</h2>
			<p>Name: <?= $profile['name'] ?></p>
			<p>Email Address: <?= $profile['email'] ?></p>
			<p>Birthday: <?= $profile['birthday'] ?></p>
		</div>
	</div>
</body>
</html>