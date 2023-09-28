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
    throw new InvalidArgumentException();
}

$sql = "INSERT INTO `cake_data` (`name`, `type`, `source`, `date`, `rating`, `comment`, `img_src`) VALUES (?, ?, ?, ?, ?, ?, ?)";
$statement = $pdo->prepare($sql);

// Bind parameters using bindParam method
$statement->bindParam(1, $name, PDO::PARAM_STR);
$statement->bindParam(2, $type, PDO::PARAM_INT);
$statement->bindParam(3, $source, PDO::PARAM_STR);
$statement->bindParam(4, $date, PDO::PARAM_STR);
$statement->bindParam(5, $rating, PDO::PARAM_INT);
$statement->bindParam(6, $comment, PDO::PARAM_STR);
$statement->bindParam(7, $img_src, PDO::PARAM_STR);

// Execute the prepared statement
if ($statement->execute()) {
    echo "Form data submitted successfully!";
    echo '<p><a href="./index.php">Home</a></p>';
    echo '<p><a href="./addindex.php">Add Another Pudding</a></p>';
} else {
    echo "Error: " . $statement->errorInfo()[2]; // Display the error message
}


//header("Location: index.php");
//exit();
