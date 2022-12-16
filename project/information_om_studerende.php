<?php 
if ($_SESSION['userID'] != null) {
    $gender = getAllGenders();

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <link rel="icon" type="image/x-icon" href="images/favicon-32x32.webp">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>

    <body>
        <div id="form-window-2">
            <h1>Information om studerende</h1>
            <h2>Type studerende</h2>
            <div id="site-gender">
                <div class="gender-wrap flex">
                    <?php while ($result = mysqli_fetch_assoc($gender)) { ?>
                        <input type="radio" id="<?php echo $result['name']; ?>" name="gender" value="<?php echo $result['genderID']; ?>">
                        <label for="<?php echo $result['name']; ?>">
                            <img src="images/<?php echo $result['thumb']; ?>" alt="">
                            <p><?php echo $result['name']; ?></p>
                        </label>
                    <?php  } ?>
                </div>

                <div class="flex">
                    <h2>Status</h2>
                    <h2 class="right">Nationalitet 
                        <a class="tooltip">
                            <img src="images/question_mark.png">
                            <div class="container">
                                <span class="tooltiptext">Definationen af dansk, er at den studerende har studeret i Danmark, i mere end et år.</span>
                            </div>
                        </a>
                    </h2>
                </div>
                <div class="wrap flex">
                    <div class="status-wrap">
                        <div class="status-wrap">
                            <input type="radio" id="state1" name="status" checked value="1">
                            <label for="state1">Nuværende Studerende</label>

                            <input type="radio" id="state2" name="status" value="0">
                            <label for="state2">Potentiel Studerende</label>
                        </div>
                    </div>

                    <div class="nationality-wrap">
                        <div class="nationality-wrap">
                            <input type="radio" id="nationality1" name="nationality" checked value="1">
                            <label for="nationality1">Dansk</label>

                            <input type="radio" id="nationality2" name="nationality" value="0">
                            <label for="nationality2">Ikke dansk</label>
                        </div>
                    </div>
                </div>


            </div>

            <div id="site-main-next-page">
                <div class="flex-wrapper flex">
                    <div id="back" class="flex-wrapper" onclick="swapFormLast(2)">
                        <div id="arrow-left"></div>
                        <p>Forrige side</p>

                    </div>
                    <p id="page">Side 2 af 3</p>
                    <div id="next" class="flex-wrapper" onclick="swapFormNext(2)">
                        <p>Næste side</p>

                        <div id="arrow-right"></div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>

    <?php } ?>