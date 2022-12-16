<?php 
session_start(); 
include 'php/functions.php';
$userDepartments = getAllDepartments();

// oprettelse af ny bruger
if (isset($_POST['nyBruger'])) {
    $departmentID = $_POST['department'];
    $allEducations = $_POST['education'];
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $username = $_POST['email'];

    createUser($fname, $sname, $username);
    $latestUser = mysqli_fetch_assoc(getLatestUser());
    createUserDepartment($latestUser['userID'], $departmentID);

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
        <div id="new-user">
            <h1 class="topic">Opret ny bruger</h1>
            <form action="" method="post">
                <input type="text" placeholder="E-mail" name="email"> <br>
                <input type="text" placeholder="Fornavn" name="fname"> <br>
                <input type="text" placeholder="Efternavn" name="sname"> <br>
                <select name="department" id="">
                    <?php 
                    while ($result = mysqli_fetch_assoc($userDepartments)) { ?>
                        <option value="<?php echo $result['departmentID']; ?>"><?php echo utf8_encode($result['name']);?></option>
                    <?php } ?>
                ?>
            </select>
            <input type="text" placeholder="Studieretning" name="education"> <!--  -->

            <div class="education">
                <button class="education-btn">text<img src="images/cross-white.png" class="cross"></img></button>
                <button class="education-btn">text<img src="images/cross-white.png" class="cross"></img></button>
            </div>

            <br> <br> <br>
            <input type="submit" value="Opret bruger" name="nyBruger" class="contrast-button">
        </form>

        <div class="infobox">
            <img class="img" src="images/question_mark.png"></img>
            <p>Den nye bruger vil modtage en e-mail <br> til at oprette deres nye kodeord </p>
        </div>
    </div>
</body>

</html>