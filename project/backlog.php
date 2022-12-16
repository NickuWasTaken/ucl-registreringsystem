<?php 
session_start(); 
if ($_SESSION['userID'] != null) {
    include 'php/functions.php';

    if (isset($_GET['deleteWarning'])) {
        if ($_GET['deleteWarning'] == 1){
            $id = $_GET['registrationID'];
            include 'php/incl/popup-warning.php';
        }
    }
    
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 0;
    }

    $userRegistrations = getRegistrationsForUser($_SESSION['userID'],$page);
    ?>

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Backlog</title>
        <link rel="icon" type="image/x-icon" href="images/favicon-32x32.webp">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/_backlog.css">
        <link rel="stylesheet" href="css/_navigationsbar.css">
        <link rel="stylesheet" href="https://use.typekit.net/lyk2kly.css">
        <script src="js/functions.js" defer async></script>
    </head>
    <body>

        <?php     include 'navigationsbar.php'; ?>

        <section id="backlog">
            <div class="heading">
                <h1>Seneste redigering</h1>
            </div>


            <?php while ($result = mysqli_fetch_assoc($userRegistrations)) { ?>
                <div class="row">
                    <div class="column">
                        <div class="tekst">
                            <p id="registration"><?php echo $result['registration_time']; ?></p>
                            <p>Varighed: <?php echo substr($result['conversation_time'], 0); ?></p>
                            <p class="topics">
                                <?php $registrationTopics = getTopicOfRegistration($result['registrationID']);
                                while ($topics = mysqli_fetch_assoc($registrationTopics)) { 
                                    echo utf8_encode($topics['name']). "  ";
                                } 
                                ?>
                            </p>
                        </div>
                    </div>

                    <div class="column flex">

                        <div class="type">
                            <img src="images/<?php echo $result['thumb']; ?>" alt="">
                        </div>

                        <div class="rewrite">
                            <img src="images/rewrite.png" alt="">  
                        </div>  

                        <div class="delete">
                            <a href="?deleteWarning=1&registrationID=<?php echo $result['registrationID']; ?>"><img src="images/delete.png" alt=""> </a>
                        </div>  
                    </div>  
                </div>
            <?php } ?>
        </section>
    </body>
    </html>

    <?php
}

else {
    header('location:login.php');
}
?>