<?php 
if ($_SESSION['userID'] != null) {
    $categories = getAllCategories();
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="icon" type="image/svg+xml" href="/vite.svg" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>

    <body>
        <div id="form-window-3">
            <h1 class="topic">Samtaleemner</h1>
            <h3>Vælg et eller flere samtaleemner</h3>
            <div id="topics">
                <?php while ($result = mysqli_fetch_assoc($categories)) { 
                    $category = $result['categoryID'];
                    $categoryTopics = getTopicsOfCategory($category);
                    ?>
                    <h2><?php echo utf8_encode($result['name']); ?></h2>
                    <div class="topic-wrap">
                        <?php while ($result2 = mysqli_fetch_assoc($categoryTopics)) { ?>
                            <input type="checkbox" id="topic<?php echo $result2['topicID']; ?>" name="topic[]" value="<?php echo $result2['topicID']; ?>">
                            <label for="topic<?php echo $result2['topicID']; ?>"><?php echo utf8_encode($result2['name']); ?></label>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <div id="site-main-next-page">
                <div class="flex-wrapper flex">
                    <a onclick="swapFormLast(3)">
                        <div id="back" class="flex-wrapper">
                            <div id="arrow-left"></div>
                            <p>Forrige side</p>
                        </div>
                    </a>

                    <p id="page">Side 3 af 3</p>
                    <a href="#">
                        <div id="next" class="flex-wrapper">
                            <input type="submit" class="contrast-button" name="registrer" value="Registrer">
                        </div>
                    </a>
                </div>
            </div>
        </form>
    </body>

    </html>

    <?php } ?>