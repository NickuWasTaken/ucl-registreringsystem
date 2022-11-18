<?php 
include 'php/dbconn.php';

function getAllDepartments() {

  global $conn;
  
  $sql = "SELECT * FROM department";

  $result = $conn->query($sql);
  
  return $result;
}


function getEducationsForUser($userID) {

  global $conn;
  
  $sql = "SELECT education.educationID, education.name FROM education 
  INNER JOIN users_has_education ON education.educationID = users_has_education.educationID
  INNER JOIN users ON users_has_education.userID = users_has_education.userID 
  WHERE users_has_education.userID = '".$userID."' AND users_has_education.userID = users.userID";

  $result = $conn->query($sql);
  
  return $result;
}


function createUser($username, $password, $fname, $sname, $auth) {

  $initials = substr($fname, 1, 2) + substr($sname, 1, 2);

  global $conn;
  
  $sql = "INSERT INTO `users` (, `username`, `password`, `created`, `updated`, `fname`, `sname`, `initials`, `auth`)
  VALUES ('$username', `$password`, CURRENT_DATE(), NULL, '$fname', '$sname', '$initials', '$auth');";

  $result = $conn->query($sql);
  
  return $result;
}


function getRegistrationsForUser(){

  $initials = substr($fname, 1, 2) + substr($sname, 1, 2);

  global $conn;
  
  $sql = "SELECT * FROM registration
  INNER JOIN users ON registration.userID = users.userID
  INNER JOIN registration_conversation_topic ON registration.registrationID = registration_conversation_topic.registrationID
  INNER JOIN conversation_topic ON registration_conversation_topic.topicID = conversation_topic.topicID
  INNER JOIN registration_media ON registration.registrationID = registration_media.registrationID
  INNER JOIN media ON registration_media.mediaID = media.mediaID
  INNER JOIN registration_gender ON registration.registrationID = registration_gender.registrationID
  INNER JOIN gender ON registration_gender.genderID = gender.genderID";

  $result = $conn->query($sql);
  
  return $result;
}

function getTopicsOfCategory($category) {

  global $conn;
  
  $sql = "SELECT conversation_topic.name, topic_has_category.topicID FROM conversation_topic 
  INNER JOIN topic_has_category ON conversation_topic.topicID = topic_has_category.topicID
  INNER JOIN topic_categories ON topic_has_category.categoryID = topic_categories.categoryID
  WHERE topic_categories.categoryID = $category";

  $result = $conn->query($sql);
  
  return $result;
}

function getAllUsers() {

  global $conn;
  
  $sql = "SELECT users.fname, users_has_department.departmentID, department.name FROM users 
  INNER JOIN users_has_department ON users.userID = users_has_department.userID 
  INNER JOIN department ON users_has_department.departmentID = department.departmentID";

  $result = $conn->query($sql);
  
  return $result;
}

function getDepartmentForUser($userID) {

  global $conn;
  
  $sql = "SELECT department.departmentID, department.name FROM department 
  INNER JOIN users_has_department ON department.departmentID = users_has_department.departmentID 
  INNER JOIN users ON users_has_department.userID = users.userID
  WHERE users_has_department.userID = '".$userID."' AND users_has_department.userID = users.userID ";

  $result = $conn->query($sql);
  
  return $result;
}

function deleteUser() {

  global $conn;
  
  $sql = "UPDATE users
  SET username = NULL, password = NULL, fname = NULL, sname = NULL, initials = NULL, auth = 0
  WHERE userID = $userID";

  $result = $conn->query($sql);
  
  return $result;
}

function updateUser() {

  global $conn;
  
  $sql = "UPDATE users
  SET username = $username, password = $password, fname = $fname, sname = $sname, initials = $initials, auth = $auth
  WHERE userID = $userID;";

  $result = $conn->query($sql);
  
  return $result;
}

function createRegistration($userID, $departmentID, $educationID, $month, $resident, $is_student, $duration) {

  global $conn;
  $monthName = date('F', strtotime("$month month"));
  
  $sql = "INSERT INTO registration (userID, departmentID, educationID, conversation_time, registration_time, resident, is_student) VALUES ($userID, $departmentID, $educationID, '$monthName', CURRENT_DATE(), $resident, $is_student)";

  $result = $conn->query($sql);
  
  return $sql;
}


function getLastRegistration($userID) {
 global $conn;

 $sql = "SELECT registration.registrationID  FROM registration
 WHERE userID = $userID
 ORDER BY registrationID desc
 LIMIT 0, 1";

 $result = $conn->query($sql);

 return $result;
}


function getAllCategories() {

 global $conn;

 $sql = "SELECT name, categoryID FROM topic_categories";

 $result = $conn->query($sql);

 return $result;
}



function deleteRegistration() {

  global $conn;
  
  $sql = "DELETE FROM registration WHERE registrationID=$registrationID";

  $result = $conn->query($sql);
  
  return $result;
}

function getAllMedia() {

  global $conn;
  
  $sql = "SELECT mediaID, name FROM media";

  $result = $conn->query($sql);
  
  return $result;
}

function getAllGenders() {

  global $conn;
  
  $sql = "SELECT genderID, name, thumb FROM gender";

  $result = $conn->query($sql);
  
  return $result;
}


function createRegistrationTopic($registrationID, $topicID) {
  global $conn;
  
  $sql = "INSERT INTO `registration_conversation_topic` (`registrationID`, `topicID`) VALUES ($registrationID, $topicID)";

  $result = $conn->query($sql);
  
  return $result;

}

function createRegistrationGender($registrationID, $genderID) {
  global $conn;
  
  $sql = " INSERT INTO `registration_gender` (`registrationID`, `genderID`) VALUES ($registrationID, $genderID)";

  $result = $conn->query($sql);
  
  return $result;
}

function createRegistrationMedia($registrationID, $mediaID) {
  global $conn;
  
  $sql = "INSERT INTO `registration_media` (`registrationID`, `mediaID`) VALUES ($registrationID, $mediaID)";

  $result = $conn->query($sql);
  
  return $result;
  
}

?>