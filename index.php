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

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <meta name="description" content="Collection of cakes website">
        <meta name="author" content="Jacob Lewis">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/styles.css">
        <link href="https://fonts.googleapis.com/css2?family=Croissant+One&family=Martian+Mono&family=Mooli&display=swap"
              rel="stylesheet">

        <link rel="icon" href="images/tabicon.png" sizes="192x192">
        <link rel="shortcut icon" href="images/tabicon.png">
        <link rel="apple-touch-icon" href="images/tabicon.png">

        <!-- <script defer src="js/index.js"></script> -->
    </head>

    <body id="indexbody">


    <section id="headerbox">
        <nav>
            <div id="navbox">
                <div class="welcome"><span id="welcometo">Welcome to...    </span><span
                            id="Jcakes">Jake's Cakes & Such</span></div>
                <a class="navlink" href="./addindex.php">Add Pudding</a>
                <!-- button  -->
            </div>
        </nav>
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
