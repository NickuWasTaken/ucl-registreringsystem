<?php 
session_start();
// checker om brugeren er adminstrator ved brugerslettelse.
if (isset($_GET['userID']) && $_SESSION['auth']==1) {

	if (!isset($_SESSION['userID'])) {
		session_destroy();
		header('location:../login.php');
		die;
	}

	include 'dbconn.php';
	include 'functions.php';

	$id = $_GET['userID'];

	//Sikre sig brugeren ike kan slette sig selv, ved at sammenligne sessions brugeren og brugeren der skal slettes. Validering I tilfælde af URL tilgang.
	if ($_SESSION['userID' != $id]) {
		if (deleteUser($id)) {
			deleteUser($id);
			header('location:../index.php');
			die;
		}
	}
}

// Checker om der er medsendt en ID, hvorefter der checkes om en bruger er logget ind i tilfælde af tilgang via URL
if (isset($_GET['registrationID'])) {
	if (!isset($_SESSION['userID'])) {
		session_destroy();
		header('location:../login.php');
		die;
	}

	include 'dbconn.php';
	include 'functions.php';

// henter den medsendte ID, bruger ID'en til at checke om registreringen existere i databasen og checker om den er oprettet af brugeren der er logget ind.
	$id = $_GET['registrationID'];
	$registration = getRegistrationForUser($id, $_SESSION['userID']);
	if ($result = mysqli_fetch_assoc($registration)) {
		if (deleteRegistration($id)) {
			deleteRegistration($id);
			header('location:../index.php');
			die;
		}
	}
}
?>