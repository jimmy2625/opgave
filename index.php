<?php 

session_start();

	include("connection.php");
	include("functions.php");

    //first things first, check if the user is logged in
	$user_data = check_login($con);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Opgave</title>
	<link rel="stylesheet" href="style.css">
</head>		
	<body>
		<form method="post" class="form">
			<div class="container">
					<h2 style="color:white">You have successfully logged in to my luxurious website!</h1>

					<br>
					<h2 style="color:white">Welcome back, <?php echo $user_data['user_name']; ?> </h2>

					<button id="logout-button" class='button' onclick="window.location.href = 'logout.php';">Logout</button>
			</div>
		</form>
	</body>
</html>