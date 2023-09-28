<?php
require_once "DatabaseConnection.php";
$dbConnection = new DatabaseConnection('collectorapp');
$pdo = $dbConnection->getPDO();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $type = $_POST["type"];
    $source = $_POST["source"];
    $date = $_POST["date"];
    $rating = $_POST["rating"];
    $comment = $_POST["comment"];
    $img_src = $_POST["img_src"];
} else {
    throw new Exception('Incorrect HTTP request method');
}

$sql = "INSERT INTO `cake_data` (`name`, `type`, `source`, `date`, `rating`, `comment`, `img_src`) VALUES (?, ?, ?, ?, ?, ?, ?)";
$statement = $pdo->prepare($sql);

$statement->bindParam(1, $name, PDO::PARAM_STR);
$statement->bindParam(2, $type, PDO::PARAM_INT);
$statement->bindParam(3, $source, PDO::PARAM_STR);
$statement->bindParam(4, $date, PDO::PARAM_STR);
$statement->bindParam(5, $rating, PDO::PARAM_INT);
$statement->bindParam(6, $comment, PDO::PARAM_STR);
$statement->bindParam(7, $img_src, PDO::PARAM_STR);

if (empty($date)) {
    echo "Please enter a date.";
    echo '<p><a href="./addindex.php">Try again</a></p>';
    echo '<p><a href="./index.php">Back to Home</a></p>';
} elseif (!filter_var($img_src, FILTER_VALIDATE_URL) and !empty($img_src)) {
    echo '<p>Invalid URL</p>';
    echo '<p><a href="./addindex.php">Try again</a></p>';
    echo '<p><a href="./index.php">Back to Home</a></p>';
} elseif ($statement->execute()) {
        echo "Form data submitted successfully!";
        echo '<p><a href="./index.php">Back to Home</a></p>';
        echo '<p><a href="./addindex.php">Add Another Pudding</a></p>';
    } else {
        echo "Error: " . $statement->errorInfo()[2];
    }


