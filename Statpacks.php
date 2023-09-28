<?php

require_once "DatabaseConnection.php";
require_once "Cake.php";

class Statpacks
{
    private DatabaseConnection $dbConnection;
    private PDO $pdo;
    private PDOStatement $query;

    public function __construct()
    {
        $this->dbConnection = new DatabaseConnection('collectorapp');
        $this->pdo = $this->dbConnection->getPDO();
    }

    public function fetchStats(): array
    {
        $this->query = $this->pdo->prepare
        (
            'SELECT `cake_data`.`img_src`,
`cake_data`.`name` AS "Pudding",
`types`.`type` AS "Type",
`cake_data`.`source` AS "Source",
`cake_data`.`date` AS "Date",
`ratings`.`rating` AS "Rating",
`cake_data`.`comment` AS "Comment"
FROM `cake_data`
LEFT JOIN `types`
ON `cake_data`.`type` = `types`.`id`
LEFT JOIN `ratings`
ON `cake_data`.`rating` = `ratings`.`id`
ORDER BY `cake_data`.`date` DESC;
'
        );

        $this->query->execute();
        $statpacks = $this->query->fetchAll();
        $cakes = [];
        foreach ($statpacks as $statpack) {
            $cake = new Cake($statpack["img_src"], $statpack["Pudding"], $statpack["Type"], $statpack["Source"], $statpack["Date"], $statpack["Rating"], $statpack["Comment"]);
            $cakes[] = $cake;
        }
        return $cakes;
    }

    public function fetchTypes(): array
    {
        $this->query = $this->pdo->prepare
        (
            'SELECT `id`, `type`
FROM `types`
ORDER BY `type`;
'
        );

        $this->query->execute();
        $types = $this->query->fetchAll();
        return $types;
    }

    public function fetchRatings(): array
    {
        $this->query = $this->pdo->prepare
        (
            'SELECT `id`, `rating`
FROM `ratings`
ORDER BY `id`;
'
        );

        $this->query->execute();
        $ratings = $this->query->fetchAll();
        return $ratings;
    }
}
