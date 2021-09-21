<?php

namespace app\models;

use config\Database;
use PDO;
use app\controllers\QueryController;

class QueryModel
{
    public function getFilters($from)
    {
        $sql = "SELECT * FROM {$from}";
        $db = new Database();
        $conn = $db->connect()->query($sql);
        $results = $conn->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }
}
