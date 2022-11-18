<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include 'php/functions.php';

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

	createRegistration($_SESSION['userID'], $departmentID, $educationID, $month, $resident, $is_student, $duration);

	$fetchID = getLastRegistration($_SESSION['userID']);
	$lastEntryID = mysqli_fetch_assoc($fetchID);
	
	foreach($allTopics as $topic){
		createRegistrationTopic($lastEntryID['registrationID'], $topic);
	}

	createRegistrationGender($lastEntryID['registrationID'], $gender);
	createRegistrationMedia($lastEntryID['registrationID'], $media);

} else {
	header('location:index.php?warning=1');
	die();
}







?>