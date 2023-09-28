<?php

require_once "DatabaseConnection.php";
require_once "Statpacks.php";
require_once "functions.php";

$dbConnection = new DatabaseConnection('collectorapp');
$statpacks = new Statpacks();
$cakes = $statpacks->fetchStats();
$types = $statpacks->fetchTypes();
$ratings = $statpacks->fetchRatings();
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jake&#39s Cakes</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <meta name="description" content="Collection of cakes website">
    <meta name="author" content="Jacob Lewis">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Croissant+One&family=Martian+Mono&family=Mooli&display=swap" rel="stylesheet">

    <link rel="icon" href="images/tabicon.png" sizes="192x192">
    <link rel="shortcut icon" href="images/tabicon.png">
    <link rel="apple-touch-icon" href="images/tabicon.png">

    <!-- <script defer src="js/index.js"></script> -->
</head>

<body id="addindexbody>


<section id="headerbox">
    <nav>
        <div id="navbox">
            <div id="Jcakes" class="welcome">Did you eat pudding? Add pudding below!</div>
            <a class="navlink" href="./index.php">Home</a>
        </div>
    </nav>
</section>

<section id="forms">

    <form action="processaddindex.php" method="post">
        <label for="name">Pudding:</label>
        <input type="text" id="name" name="name" class="inputs"><br>

        <label for="type">Type:</label>
        <select id="type" name="type" class="inputs">
            <?php
            $optionshtml = '';
            foreach ($types as $type) {
                $optionshtml .= '<option value = "' . $type['id'] . '" >' . $type['type'] . '</option >';
            }
            echo $optionshtml;
            ?>
        </select><br>

        <label for="source">Source:</label>
        <input type="text" id="source" name="source" class="inputs"><br>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" class="inputs"><br>

        <label for="rating">Rating:</label>
        <select id="rating" name="rating" class="inputs">
            <?php
            $optionsHtmlRatings = '';
            foreach ($ratings as $rating) {
                $optionsHtmlRatings .= '<option value = "' . $rating['id'] . '" >' . $rating['rating'] . '</option >';
            }
            echo $optionsHtmlRatings;
            ?>
        </select><br>

        <label for="comment">Comment:</label>
        <textarea id="comment" name="comment" rows="4" cols="50" maxlength="100" class="inputs"></textarea><br>

        <label for="img_src">Image URL:</label>
        <input type="text" id="img_src" name="img_src" class="inputs"><br>

        <input type="submit" value="Submit">
    </form>
</section>

</body>
</html>

<?php

