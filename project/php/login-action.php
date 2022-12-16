<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_POST['username'])) {
	session_destroy();
	header('location:../login.php');
	die;
}

include 'dbconn.php';

if ($_POST['password'] != null){
	$username = $_POST['username'];
	$passstring = $_POST['password'];

	$SALTHASH = "DEEPPINK#ff1493";
	$passstring .= $SALTHASH;
	$password = md5($passstring);

	$query= "SELECT userID, username, password, auth, fname, sname FROM users WHERE username='".$username."'";
	$result = $conn->query($query);
	$row = $result->fetch_object();


	if (isset($_POST['login'])){

		if ($username == $row->username && $password == $row->password){
			$_SESSION['userID'] = $row->userID;
			$_SESSION['fname'] = $row->fname;
			$_SESSION['sname'] = $row->sname;
			$_SESSION['auth'] = $row->auth;
			header('location:../index.php');
		} else {
			header('location:../login.php');
		}
	}
}
else {
	header('location:../login.php');
}
?>