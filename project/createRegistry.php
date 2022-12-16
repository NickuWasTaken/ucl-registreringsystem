<?php 
session_start();

//checker om brugeren er logget ind.
if (!isset($_SESSION['userID'])) {
	session_destroy();
	header('location:../login.php');
	die;
}

include 'php/functions.php';
// henter information til registrering og registres i variabler for nemmer brug.
$departmentID = $_POST['campus'];
$educationID = $_POST['education'];
$resident = $_POST['nationality'];
$is_student = $_POST['status'];
$gender = $_POST['gender'];
$media = $_POST['media'];
$duration = $_POST['duration'];
$month = $_POST['month'];
$allTopics = $_POST['topic'];

if (isset($_POST['registrer'])){
	//laver en ny registration i Databasen.
	createRegistration($_SESSION['userID'], $departmentID, $educationID, $month, $resident, $is_student, $duration);

	//Henter nyeste brugers ID 
	$fetchID = getLastRegistration($_SESSION['userID']);
	$lastEntryID = mysqli_fetch_assoc($fetchID);
	
	//Tilføjer samtale emner til registreringen.
	foreach($allTopics as $topic){
		createRegistrationTopic($lastEntryID['registrationID'], $topic);
	}

	//Tilføjer den studerendes køn til registreringen.
	createRegistrationGender($lastEntryID['registrationID'], $gender);

	//Tilføjer mødeform til registreringen.
	createRegistrationMedia($lastEntryID['registrationID'], $media);

	header('location:index.php?confirmed=1');

} else {
	header('location:index.php?warning=1');
	die();
}







?>