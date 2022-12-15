<?php 
include 'php/functions.php';
$userID = $_GET['userID'];

$getUser = getUser($userID);
$user = mysqli_fetch_assoc($getUser);

$to      = $user['username'];
$subject = 'Opret dit nye kodeord!';
$message = 'Hej '.$user['fname'].', det ser ud til at du er blevet oprettet som bruger til UCLs Registrerings system, click på linket neden for for at oprette en kode til din Nye bruger! 
http://nicku.dk/ucl-registreringsystem/project/create-password.php?userID='.$userID;
$headers = 'From: mail@nicku.dk' . "\r\n" .
'Reply-To: mail@nicku.dk' . "\r\n" .
'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

header('location:useroverview.php');
?>