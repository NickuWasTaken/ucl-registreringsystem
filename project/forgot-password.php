<?php 
session_start(); 
include 'php/functions.php';
?>

<?php if (!isset($_POST['SendMail'])){ ?>
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
			<form action="" method="post">
				<h2>Glemt dit kodeord?</h2>
				<h3>Venligt indtast din email neden under, så sender vi et nyt!</h3>
				<input type="email" placeholder="Email" name="email" required> <br>
				<input type="submit" value="Nulstil kodeord" name="SendMail">
			</form>
		</div>
	</body>
	</html>


<?php } 
if ($_POST['email'] != null && $_POST['email'] != ''){
	if (isset($_POST['SendMail'])){ ?>
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
				<form action="" method="post">
					<h2>Glemt dit kodeord?</h2>
					<h3>Vi har sendt en mail til oprettelse af ny kodeord til den angivne email!</h3>
					<p>Der kan gå op til 5 minutter før emailen kan ses i din inbox. <br> Husk at checke din spam folder</p> <br>
					<a href="login.php">Gå tilbage til Login</a>
					<br><br>
				</form>
			</div>
		</body>
		</html>
		<?php 


		$userByUsername = getUserByUsername($_POST['email']);
		deleteUserPassword($_POST['email']);

		if ($userData = mysqli_fetch_assoc($userByUsername)) {

			$to      = $userData['username'];
			$subject = 'Forespørgsel om kode skift!';
			$message = 'Hej, '.$userData['fname'].' det ser ud til at du har forespurgt et nyt kodeord fra UCLs registreringssystem?, klik på linket neden for for at oprette en ny kode! 
			http://nicku.dk/ucl-registreringsystem/project/create-password.php?userID='.$userData['userID'].'
			Hvis du ikke har forespurgt en ny kode kan du ignorere denne email, modtager du denne mail gentagende gange bedes du anmelde det [administratormail@mail.dk]';
	// [administratormail@mail.dk] placeholder mail

			$headers = 'From: mail@nicku.dk' . "\r\n" .
			'Reply-To: mail@nicku.dk' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

			mail($to, $subject, $message, $headers);
		}
	}
}  ?>

