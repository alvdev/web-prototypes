<?php

namespace app\controllers;

use app\models\QueryModel;

class QueryController
{
    protected $operation;
    protected $type;
    protected $province;
    protected $limit;
    protected $price;

    public function __construct()
    {
        $this->operation = $_GET['operation'] ?? $_POST['operation'] ?? 'sale';
        $this->type = $_GET['type'] ?? $_POST['type'] ?? null;
        $this->province = $_GET['province'] ?? $_POST['province'] ?? null;
        $this->limit = $_GET['limit'] ?? $_POST['limit'] ?? 10;
        $this->price = $_GET['price'] ?? $_POST['price'] ?? 200000;
    }

    public function showFilters($all)
    {
        $conn = new QueryModel();
        $results = $conn->getFilters($all);

        return $results;
    }

    public function showProperties()
    {
        $properties = new QueryModel();
        $results = $properties->getProperties(
            $this->operation,
            $this->type,
            $this->province,
            $this->limit,
            $this->price
        );

        return $results;
    }
}
