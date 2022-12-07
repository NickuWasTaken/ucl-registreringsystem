<?php 
session_start(); 
if ($_SESSION['userID'] != null) {
	include 'php/functions.php';
	
	
	?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/_navigationsbar.css"> 
		<link rel="stylesheet" href="css/style.css">
		<script src="js/functions.js" defer async></script>
		<title>Registrering</title>
	</head>


	<body>
		<?php 
		include 'navigationsbar.php';
		include 'registrering.php';
		include 'information_om_studerende.php';
		include 'samtale_emne.php';
		?>
	</body>

	</html>

	<?php
}

else {
	header('location:login.php');
}
?>