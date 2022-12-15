<?php 
if (isset($_GET['registrationID'])) {
	
	$id = $_GET['registrationID'];
	$registration = getRegistration($id);
	$result = mysqli_fetch_assoc($registration);
	$registrationTopics = getTopicOfRegistration($id);
	?>
	<head><meta charset="UTF-8"></head>
	<section id="popup-warning">
		<div class="content-window">
			<h2 class="popup-title">Er du sikker på du vil slette:</h2>
			<p><?php echo $result['registration_time']; ?> </p>
			<p>Varighed: <?php echo $result['conversation_time']; ?> </p>
			<p>
				Emne: <?php while ($topics = mysqli_fetch_assoc($registrationTopics)) { 
					echo utf8_encode($topics['name']). " ";
				}  ?>
			</p>
			<div class="button-wrap">
				<a id="confirm" href="php/delete-action.php?registrationID=<?php echo $id; ?>">Jeg er sikker!</a>
				<a id="decline" onclick="disablePopUp()">Nej, Annuler sletning</a>
			</div>
		</div>
	</section>

<?php }

if (isset($_GET['userID'])) { 

	$id = $_GET['userID'];
	$user = getUser($id);
	$user = mysqli_fetch_assoc($user);
	
	if ($user['auth'] == 1) {
		$authentication = "admin";
	} else {
		$authentication = "Vejleder";
	}
	?>
	<head><meta charset="UTF-8"></head>
	<section id="popup-warning">
		<div class="content-window">
			<h2 class="popup-title">Er du sikker på du vil slette:</h2>
			<p><?php echo utf8_encode($user['fname'])." ". utf8_encode($user['sname']). ", " . $authentication; ?> </p>
			<p><?php echo $user['name']; ?> </p>
			<p class="warning">
				<b>OBS:</b> ved at slette brugeren registreres de som inaktive
				men dataen skabt af brugeren vedligeholdes.
			</p>
			<div class="button-wrap">
				<a id="confirm" href="php/delete-action.php?userID=<?php echo $id; ?>">Jeg er sikker!</a>
				<a id="decline" onclick="disablePopUp()">Nej, Annuler sletning</a>
			</div>
		</div>
	</section>

<?php } ?>

