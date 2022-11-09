<?php 
include 'php/dbconn.php';

function getAllDepartments() {

  global $conn;
  
  $sql = "SELECT * FROM department";

  $result = $conn->query($sql);
  
  return $result;
}


function getEducationsForUser($user) {

  global $conn;
  
  $sql = "SELECT education.educationID, education.name
  FROM education 
  INNER JOIN users_has_education ON education.educationID = users_has_education.educationID
  INNER JOIN users ON users_has_education.userID = users_has_education.userID 
  WHERE users_has_education.userID = '".$user."' AND users_has_education.userID = users.userID";

  $result = $conn->query($sql);
  
  return $result;
}



?>