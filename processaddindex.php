<?php
require_once "DatabaseConnection.php";
require_once "functions.php";
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

    </html>

<?php
echo '<div class="formsBox submissionBox">';
if (!validDate($date)) {
    echo "Please enter a valid date.";
    echo '<p><a href="./addindex.php">Try again</a></p>';
    echo '<p><a href="./index.php">Back to Home</a></p>';
} elseif (!validURL($img_src)) {
    echo '<p>Invalid URL</p>';
    echo '<p><a href="./addindex.php">Try again</a></p>';
    echo '<p><a href="./index.php">Back to Home</a></p>';
} elseif ($statement->execute()) {
    echo '<p>Form data submitted successfully!</p>';
    echo '<p><a href="./index.php">Back to Home</a></p>';
    echo '<p><a href="./addindex.php">Add Another Pudding</a></p>';
} else {
    echo "Error: " . $statement->errorInfo()[2];
}
echo '</div>';


