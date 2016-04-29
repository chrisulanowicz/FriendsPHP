<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Belt Exam" />
	<title>Friends</title>
	<link rel="stylesheet" href="<?=base_url();?>/user_guide/_static/css/homestyle.css" />
</head>
<body>
	<div id="container">
		<p class="logout"><a href="/Users/logout">Logout</a></p>
		<div id="top">
			<h2>Hello, <?= $this->session->userdata('alias') ?>!</h2>
			<?php
				if(!$friends)
				{
					echo "<p class='none'>You don't have friends yet.</p>";
				}
				else
				{
					echo "<p>Here is the list of your friends:</p>";
				}
			?>
			<table>
				<thead>
					<tr>
						<th>Alias</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($friends as $friend):
					?>
								<tr>
									<td><?= $friend['alias'] ?></td>
									<td><a href="/Friends/view/<?= $friend['friend_id'] ?>">View Profile</a><a href="/Friends/remove/<?= $friend['friend_id'] ?>">Remove as Friend</a></td>
								</tr>
					<?php
						endforeach;
					?>
				</tbody>
			</table>
		</div>
		<div id="bottom">
			<p>Other Users not on your friend's list:</p>
			<table>
				<thead>
					<tr>
						<th>Alias</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($other_users as $other):
					?>
								<tr>
									<td><a href="/Friends/view/<?= $other['non_id'] ?>"><?= $other['alias'] ?></a></td>
									<form action="/Friends/add/<?= $other['non_id'] ?>" method="post">
									<td><input type="submit" value="Add as Friend"></td>
									</form>
								</tr>
					<?php
						endforeach;
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>