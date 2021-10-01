<?php

class Router
{
    public $id;
    public $module;
    public $action;
    public $entity_id;
    public $pretty_url;

    private $dbc;

    public function __construct($dbc)
    {
        $this->dbc = $dbc;
    }

    public function findBy($prettyUrl)
    {
        $sql = "SELECT * FROM router WHERE pretty_url = :pretty_url";
        $stmt = $this->dbc->prepare($sql);
        $stmt->bindValue(':pretty_url', $prettyUrl);
        $stmt->execute();
        $query = $stmt->fetch();
    }

    public function setValues($values)
    {
        foreach ($this->fields as $fieldName) {
            $this->$fieldName = $value[$fieldName];
        }
    }
}
