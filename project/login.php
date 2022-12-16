<?php 
session_start(); 
echo $_SESSION['userID'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Regisreringsystem</title>
	<link rel="icon" type="image/x-icon" href="images/favicon-32x32.webp">
	<link rel="stylesheet" href="css/login.css">
</head>

<body>
	<section class="wrapper">
		<img id="logo" src="images/UCL_horizontal.png" alt="UCL logo">
		<form action="php/login-action.php" method="post">
			<h2>Login</h2>
			<input type="text" placeholder="E-mail" name="username" alt="">
			<input type="password" placeholder="Kodeord" name="password">
			<div class="input-align"><a href="forgot-password.php">Glemt kodeord?</a></div>
			<input type="submit" value="Login" name="login">
		</form>
	</div>
</body>
</html>

<?php 
if ($_SESSION['userID'] != null) {
	header('location:index.php');
}
?>
