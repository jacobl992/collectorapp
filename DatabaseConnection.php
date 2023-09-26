<?php

class DatabaseConnection {
    private string $host;
    private string $db;
    private string $username;
    private string $password;
    private string $dsn;
    private array $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

    public function __construct(
        $db,
        $host  = 'db',
        $username = 'root',
        $password = 'password',
        $options = null
    ) {
        $this->db = $db;
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        if ($options) {
            $this->options = $options;
        }

        $this->dsn = "mysql:host=$host;dbname=$db;";

        try {
            $pdo = new PDO($this->dsn, $this->username, $this->password, $this->options);
//object-orientated statement
        } catch (PDOException $exception) {
            echo '<p> There was an error connecting to the database</p>';
            exit();
            //try-catch statement. try a statement or sequence of statements, if it fails,
            //jump to the catch, and in this case, exit
        }

//        try {
//            $this->conn = new PDO($dsn, $this->username, $this->password);
//            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        } catch (PDOException $e) {
//            echo "Connection failed: " . $e->getMessage();
//        }
    }


}