<?php
require_once "DatabaseConnection.php";
require_once "Statpacks.php";

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
            <div id="pflink">
                <h1>Welcome to Jake's Cakes&Such</h1>
            </div>
        </header>
    </section>

    <section id="all-cakes">
        <?php
        $cakebox = '';
        foreach ($cakes as $cake) {
            $cakebox .= '<div class="cakebox">'
                . '<img src="' . $cake->getImg_src() . '" alt="' . $cake->getPudding() . '">'
                . '<h3>' . $cake->getPudding() . '</h3>'
                . '<p>Cake type: ' . $cake->getType() . '</p>'
                . '<p>Source: ' . $cake->getSource() . '</p>'
                . '<p>Date: ' . $cake->getDate() . '</p>'
                . '<p id="ratingp">Rating: ' . $cake->getRating() . '</p>'
                . '<p>Comment: ' . $cake->getComment() . '</p>'
                . '</div>';
        }
        echo $cakebox;
        ?>
    </section>

    </body>
    </html>

<?php
