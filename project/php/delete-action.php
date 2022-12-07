<?php 
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['userID']) && $_SESSION['auth']==1) {

	if (!isset($_SESSION['userID'])) {
		session_destroy();
		header('location:../login.php');
		die;
	}

	include 'dbconn.php';
	include 'functions.php';

	$id = $_GET['userID'];

	if ($_SESSION['userID' != $id]) {
		if (deleteUser($id)) {
			deleteUser($id);
			header('location:../index.php');
			die;
		}
	}
}

if (isset($_GET['registrationID'])) {

	if (!isset($_SESSION['userID'])) {
		session_destroy();
		header('location:../login.php');
		die;
	}

	include 'dbconn.php';
	include 'functions.php';

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