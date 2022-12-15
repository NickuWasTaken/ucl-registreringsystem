<?php 
session_start(); 
include 'php/functions.php';

if (isset($_POST['createPassword'])) {
	if ($_POST['password'] == $_POST['repassword']) {
		$userID = $_GET['userID'];
		
		//Henter password fra databasen
		$passCheck = checkUserPassword($userID);
		$isPassNull = mysqli_fetch_assoc($passCheck);

		//checker om brugeren har et kodeord
		if ($isPassNull['password'] != NULL) { 
			session_destroy();
			header('location:login.php');
			die;

		} else {
			$passstring = $_POST['password'];
			$SALTHASH = "DEEPPINK#ff1493";
			$passstring .= $SALTHASH;
			$password = md5($passstring);

			//opdater databasen med kodeord
			updateUserPassword($userID, $password); 
			header('location:login.php'); // Redirect virker ikke online? men fungere lokalt?
		}
	}
}

if (isset($_GET['userID'])) {
	$userID = $_GET['userID'];
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
			<form action="?userID=<?php echo $userID ?>" method="post">
				<h2>Opret dit nye kodeord:</h2>
				<input type="password" placeholder="Kodeord" name="password"> <br>
				<input type="password" placeholder="Gentag Kodeord" name="repassword"> <br>
				<?php if (isset($_POST['password']) && $_POST['password'] != $_POST['repassword']){
					echo "<p>Kodeorderne skal være ens!</p><br>";
				} ?>
				<input type="submit" value="Opret Kodeord" name="createPassword">
			</form>
		</div>
	</body>
	</html>

	<?php 
}

?>
