<?php 
if ($_SESSION['userID'] != null) {
    $userEducations = getEducationsForUser($_SESSION['userID']);
    $userDepartments = getDepartmentForUser($_SESSION['userID']);
    $media = getAllMedia();

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Registrering</title>
    </head>


    <body>
        <form id="site-main" method="POST" action="createRegistry.php">
            <div id="form-window-1">
                <h1>Registrering</h1>
                <div id="site-main-month">
                    <h2 id="month">Måned</h2>
                    <div class="month-wrap flex">
                        <?php 
                        for ($i=-2; $i <= 0; $i++){ 
                            $monthnumber = date('m')+$i;
                            ?>
                            <input type="radio" id="month<?php echo $monthnumber; ?>" name="month" value="<?php echo $monthnumber; ?>" <?php if($i == 0){echo "checked";} ?> >
                            <label id="month-1" for="month<?php echo $monthnumber; ?>"><?php echo date('F', strtotime("$i month"));?></label>
                        <?php } ?>
                    </div>

                </div>
                <div id="site-main-education">
                    <div class="flex-wrap flex"> <!-- rettet -->
                        <div class="flex-wrap">
                            <h2>Studieretning</h2>
                            <input type="search" name="search" id="search-education">
                        </div>
                        <h2 id="duration">Varighed</h2>
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
                            <select name="duration" class="dropdown">
                                <option value="00:15:00">1-15 min</option>
                                <option value="00:30:00">16-30 min</option>
                                <option value="00:45:00">31-45 min</option>
                                <option value="01:00:00">46-60 min</option>
                                <option value="01:01:00">Mere end 60 min</option>
                            </select>

                            <h2>Campus</h2>
                            <select name="campus" class="dropdown">
                                <?php 
                                while ($result = mysqli_fetch_assoc($userDepartments)) { ?>
                                    <option value="<?php echo $result['departmentID']; ?>"><?php echo $result['name'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="site-main-media">
                    <h2>Type henvendelse</h2>
                    <div class="media-wrap flex"> 
                        <?php 
                        while ($result = mysqli_fetch_assoc($media)) { ?>
                            <input type="radio" id="media<?php echo $result['mediaID'];?>" name="media" value="<?php echo $result['mediaID'];?>">
                            <label for="media<?php echo $result['mediaID'];?>" class="flex-wrap flex aic">
                                <img src="images/media<?php echo $result['mediaID'];?>.png" alt="">
                                <p><?php echo $result['name'];?></p>
                            </label>
                        <?php }?>
                    </div>
                </div>
                <a href="php/login-action.php">Log af</a>
                <div id="site-main-next-page"> <!-- Rettet -->
                    <div class="flex-wrapper flex">
                        <a style="opacity: 0.3; cursor: default;">
                            <div id="back" class="flex-wrapper">
                                <div id="arrow-left"></div>
                                <p>Forrige side</p>
                            </div>
                        </a>

                        <p id="page">Side 1 af 3</p>
                        <a onclick="swapFormNext(1)">
                            <div id="next" class="flex-wrapper">
                                <p>Næste side</p>
                                <div id="arrow-right"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </body>

        </html>

        <?php
    }

    else {
        header('location:login.php');
    }
?>