<?php 
session_start(); 
include 'php/functions.php';
$userDepartments = getAllDepartments();

if (isset($_POST['nyBruger'])) {
    $departmentID = $_POST['department'];
    $allEducations = $_POST['education'];
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $username = $_POST['email'];

    createUser($fname, $sname, $username);
    $latestUser = mysqli_fetch_assoc(getLatestUser());
    createUserDepartment($latestUser['userID'], $departmentID);

   // !!!!!Ved ikke helt hvordan dette skal løses kig på til evolution!!!!! JS med checkboxe?
   //
   // foreach($allEducations as $education){
   //     createUserEducations($latestUser['userID'], $educationID);
   // }

    header('location:useroverview.php');
    die;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/_navigationsbar.css"> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/_new-user.css">
    <title>Opret Bruger</title>
</head>

<?php include 'navigationsbar.php'; ?>

<body>
    <div id="site-main">
            <div id="app">
        <div id="chart">
            <svg></svg>
        </div>
        <div id="data">
            <ul></ul>
        </div>
    </div>

</div>

    <script src="js/script2.js"></script>
    
</body>

</html>