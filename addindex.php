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
            <h1><span id="Jcakes">Jake's Cakes & Such</span></h1>
            <a class="navlink" href="./index.php">Home</a>
            <!-- button  -->
        </div>
    </header>
</section>

<section id="forms">

    <form action="processaddindex.php" method="post">
        <label for="name">Pudding:</label>
        <input type="text" id="name" name="name"><br><br>

        <label for="type">Type:</label>
        <select id="type" name="type">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
        </select><br><br>

        <label for="source">Source:</label>
        <input type="text" id="source" name="source"><br><br>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date"><br><br>

        <label for="rating">Rating:</label>
        <select id="rating" name="rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br><br>

        <label for="comment">Comment:</label>
        <textarea id="comment" name="comment" rows="4" cols="50"></textarea><br><br>

        <label for="image-url">Image URL:</label>
        <input type="text" id="image-url" name="image-url"><br><br>

        <input type="submit" value="Submit">
    </form>
</section>

</body>
</html>
