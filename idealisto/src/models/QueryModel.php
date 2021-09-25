<?php

namespace app\models;

use config\Database;
use PDO;
use app\controllers\QueryController;

class QueryModel
{
    public function getFilters($all)
    {
        $sql = "SELECT * FROM $all";
        $db = new Database();
        $conn = $db->connect()->query($sql);
        $results = $conn->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    public function getProperties(
        $operation,
        $type,
        $province,
        $limit,
        $price
    ) {
        if ($type) {
            $type = "'" . implode('\', \'', $type) . "'";
        } else {
            $type = "'" . 'piso' . "'";
        }

        if ($province) {
            $province = "'" . implode('\', \'', $province) . "'";
        } else {
            $province = "'" . 'lleida' . "'";
        }

        $sql =
            "SELECT * FROM operaciones, pisos, provincias, tipos
             WHERE op_operacion LIKE '$operation'
             AND tipo_nombre IN ({$type})
             AND prov_nombre IN ({$province})
             AND piso_precio_venta < $price
             ORDER BY piso_precio_venta ASC
             LIMIT {$limit}
            ";

        $db = new Database();
        $query = $db->connect()->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }
}
