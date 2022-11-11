<?php 
session_start(); 
echo $_SESSION['userID'];
// if ($_SESSION['userID'] != null) {
include 'php/functions.php';
$userEducations = getEducationsForUser(2);
$userDepartments = getDepartmentForUser(2);
$media = getAllMedia();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>registrering</title>
</head>

<body>
    <div id="site-main">
        <h1>Registrering</h1>
        <form action="" method="post">
            <div id="site-main-month">
                <h2 id="month">Måned</h2>
                <div class="month-wrap">
                    <?php 
                    for ($i=-2; $i <= 0; $i++){ 
                        $monthnumber = date('m')+$i;
                        ?>
                        <input type="radio" id="month<?php echo $monthnumber; ?>" name="month" value="<?php echo $monthnumber; ?>" <?php if($i == 0){echo "checked";} ?> >
                        <label for="month<?php echo $monthnumber; ?>"><?php echo date('M', strtotime("$i month"));?></label>
                    <?php } ?>
                </div>

            </div>
            <div id="site-main-education">
                <div class="flex-wrap">
                    <h2>Studieretning</h2>
                    <input type="search" name="search" id="search-education">
                    <h2 style="margin-left: 80px;">Varighed</h2>
                </div>
                <div class="wrap">
                    <div id="site-education-btn">
                        <div class="education-wrap">
                            <?php 
                            while ($result = mysqli_fetch_assoc($userEducations)) { ?>
                                <input type="radio" id="education<?php echo $result['educationID'];?>" name="education" value="<?php echo $result['educationID'];?>">
                                <label for="education<?php echo $result['educationID'];?>"><?php echo $result['name'];?></label>
                            <?php }
                            ?>
                        </div>
                    </div>

                    <div id="site-main-dropdown">
                        <select class="dropdown">
                            <option value="00:15:00">1-15 min</option>
                            <option value="00:30:00">16-30 min</option>
                            <option value="00:45:00">31-45 min</option>
                            <option value="01:00:00">46-60 min</option>
                            <option value="01:01:00">Mere end 60 min</option>
                        </select>
                        
                        <h2>Campus</h2>
                        <select class="dropdown">
                           <?php 
                           while ($result = mysqli_fetch_assoc($userDepartments)) { ?>
                            <option value="<?php echo $result['departmentID']; ?>"><?php echo $result['name'];?></option>
                        <?php }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div id="site-main-media">
            <h2>Type henvendelse</h2>
            <div class="media-wrap">
             <?php 
             while ($result = mysqli_fetch_assoc($media)) { ?>
                <input type="radio" id="media<?php echo $result['mediaID'];?>" name="media" value="<?php echo $result['mediaID'];?>">
                <label for="media<?php echo $result['mediaID'];?>"><?php echo $result['name'];?></label>
            <?php }
            ?>
        </div>
    </div>
</form>
<div id="site-main-next-page">
    <div class="flex-wrapper">
        <div id="back" class="flex-wrapper">
            <div id="arrow-left"></div>
            <a href="#">Forrige side</a>

        </div>
        <p id="page">Side 1 af 2</p>
        <div id="next" class="flex-wrapper">
            <a href="./information_om_studerende.html">Næste side</a>

            <div id="arrow-right"></div>
        </div>
    </div>
</div>

</div>
</body>

</html>

    <?php /*
}

else {
    header('location:login.php');
}*/
?>