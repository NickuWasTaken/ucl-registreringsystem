<?php
session_start();

if (!isset($_POST['username'])) {
	session_destroy();
	header('location:../login.php');
	die;
}


include 'DBconn.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query= "SELECT userID, username, password FROM users WHERE username='".$username."'";
$result = $conn->query($query);
$row = $result->fetch_object();


if (isset($_POST['login'])){
	if ($username == $row->username && $password == $row->password){
		$_SESSION['userID'] = $row->userID;
		header('location:../index.php');
	} else {
		header('location:../login.php');
	}
}

?>