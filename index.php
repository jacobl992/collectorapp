<?php
require_once "DatabaseConnection.php";
require_once "Statpacks.php";
require_once "functions.php";

$dbConnection = new DatabaseConnection('collectorapp');
$statpacks = new Statpacks();
$cakes = $statpacks->fetchStats();

?>

    <!DOCTYPE html>

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Jake&#39s Cakes</title>

        <meta name="description" content="Collection of cakes website">
        <meta name="author" content="Jacob Lewis">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/styles.css">

        <link rel="icon" href="images/tabicon.png" sizes="192x192">
        <link rel="shortcut icon" href="images/tabicon.png">
        <link rel="apple-touch-icon" href="images/tabicon.png">

        <!-- <script defer src="js/index.js"></script> -->
    </head>

    <body>


    <section id="headerbox">
        <header>
            <div id="navbox">
                <h1><span id="welcometo">Welcome to...    </span><span id="Jcakes">Jake's Cakes & Such</span></h1>
            </div>
        </header>
    </section>

    <section id="all-cakes">
        <?php
        $cakebox = '';
        foreach ($cakes as $cake) {
            $cakebox .= '<div class="cakebox">'
                . '<h3>' . $cake->getPudding() . '</h3>'
                . '<img src="' . $cake->getImg_src() . '" alt="' . $cake->getPudding() . '" class="pudding-img">'
                . '<p class="stat-p"><span class="cakestat">Cake type: </span>' . $cake->getType() . '</p>'
                . '<p class="stat-p"><span class="cakestat">Source: </span>' . $cake->getSource() . '</p>'
                . '<p class="stat-p"><span class="cakestat">Date: </span>' . $cake->getDate() . '</p>'
                . '<p id="ratingp" class="stat-p"><span class="cakestat">Rating: </span>' . $cake->getRating() . '</p>'
                . '<p class="stat-p"><span class="cakestat">Comment: </span>' . $cake->getComment() . '</p>'
                . '</div>';
        }
        echo $cakebox;
        ?>
    </section>

    </body>
    </html>

<?php
