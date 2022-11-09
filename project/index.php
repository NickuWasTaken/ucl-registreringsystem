<?php 
session_start(); 
if ($_SESSION['userID'] != null) {
	include 'php/functions.php';
	$userEducations = getEducationsForUser($_SESSION['userID']);
	?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Regisreringsystem</title>
		<link rel="icon" type="image/x-icon" href="images/favicon-32x32.webp">
	</head>
	<body id="id">

		<?php 
		while ($result = mysqli_fetch_assoc($userEducations)) {
			echo $result['name'];
			echo "<br>";
		}
		?>

		<form action="php/login-action.php" method="post">
			<input type="submit" name="logud" value="Logud">
		</form>

	</body>
	</html>

	<?php 
}

else {
	header('location:login.php');
}
?>