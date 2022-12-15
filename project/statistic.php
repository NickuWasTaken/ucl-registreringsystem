<?php 
session_start(); 
include 'php/functions.php';
$categoryOfTopic = categoryOfTopic();

?>
<script>
    let dataLabels = {
        <?php while($topicdata = mysqli_fetch_assoc($categoryOfTopic)){
            echo $topicdata['topicID'].": ".$topicdata['categoryID'];
            echo ", ";
        } ?>
    }
    console.log(dataLabels);
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/_navigationsbar.css"> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <title>Opret Bruger</title>
</head>

<?php include 'navigationsbar.php'; ?>

<body>
    <div id="site-main">
        <h1>Statistik</h1>
        <div id="app">
            <div id="chart">
                <svg></svg>
            </div>

            <div id="overview">
                <div class="flex">
                    <span id="admin" onclick="statisticShowAdmin()">
                        <p>Administration</p>
                    </span>

                    <span id="economy" onclick="statisticShowEconomy()">
                        <p>Økonomi</p>
                    </span>

                    <span id="personal" onclick="statisticShowPersonal()">
                        <p>Personlig</p>
                    </span>
                </div>

                <div id="checks">
                    <a onclick='uncheckAll()' value= "Unchecks All"/>Fravælg alle</a>
                    <a onclick='checkAll()' value= "Checks All"/>Tilvælg alle</a></div>
                </div>

                <div id="data">
                    <ul></ul>
                </div>

            </div>

        </div>
        <script src="https://d3js.org/d3.v4.min.js"></script>
        <?php include 'php/d3.php'; ?>
        <script src="js/functions.js"></script>
        <script>
            document.getElementById('admin').click();
        </script>


    </body>

    </html>