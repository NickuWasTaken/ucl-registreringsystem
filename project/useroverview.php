<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start(); 
if ($_SESSION['userID'] != null && $_SESSION['auth'] == 1) {
    include 'php/functions.php';

    // for at lave popup der advar ved sletning    
    if (isset($_GET['deleteWarning'])) {
        if ($_GET['deleteWarning'] == 1){
            $id = $_GET['userID'];
            include 'php/incl/popup-warning.php';
        }
    }
    
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 0;
    }
    
    include 'navigationsbar.php';

    $getUsers = getAllUsers();
    ?>

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Backlog</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/_backlog.css">
        <link rel="stylesheet" href="css/_navigationsbar.css">
        <link rel="stylesheet" href="https://use.typekit.net/lyk2kly.css">
        <script src="js/functions.js" defer async></script>
    </head>
    <body>

        <section id="users">
            <div class="heading flex jcsb aic">
                <h1>Brugere</h1>
                <a id="addUser" href="new_user.php"><p>Opret ny bruger</p> <img src="images/addition.png" alt=""></a>
            </div>

            <?php 
            while ($result = mysqli_fetch_assoc($getUsers)) { 
                if ($result['fname'] != null || $result['fname'] != "") {
                    ?>

                    <div class="row">
                        <div class="column">
                            <div class="tekst">
                                <p id="registration"><?php echo utf8_encode($result['fname']) ." ". utf8_encode($result['sname']); ?></p>
                                <p><?php echo substr($result['name'], 0); ?></p>
                                <p class="topics"> </p>
                            </div>
                        </div>

                        <div class="column flex">

                            <div class="rewrite">
                                <img src="images/rewrite.png" alt="">  
                            </div>  

                            <div class="delete">
                                <?php  if ($result['userID'] != $_SESSION['userID']){ ?>
                                    <a href="?deleteWarning=1&userID=<?php echo $result['userID']; ?>"><img src="images/delete.png" alt=""></a>
                                <?php } ?>
                            </div>  
                        </div>  
                    </div>
                <?php }} ?>
            </section>
        </body>
        </html>

        <?php
    }

    else {
        header('location:login.php');
    }
?>