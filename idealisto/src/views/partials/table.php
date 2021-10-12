<?php

use app\controllers\QueryController;

$list = new QueryController();
$properties = $list->showProperties();

$columnsTitle = [
    $lang['ID'],
    $lang['OPERATION'],
    $lang['PROPERTY_TYPE'],
    $lang['PROVINCE'],
    $lang['AREA'],
    $lang['PRICE'],
];
$columnTitleCount = count($columnsTitle);

?>

<table id="table-results">
    <thead>
        <tr>
            <?php foreach ($columnsTitle as $columnTitle) : ?>
                <th><?= $columnTitle; ?></th>
            <?php endforeach ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($properties as $property) : ?>
            <tr>
                <td class="id"><?= $property['piso_referencia']; ?></td>
                <td class="op"><?= $property['op_operacion']; ?></td>
                <td><?= $property['tipo_nombre']; ?></td>
                <td><?= $property['prov_nombre']; ?></td>
                <td><?= $property['piso_superficie'] . 'm<sup>2</sup>'; ?></td>
                <td><?= number_format($property['piso_precio_venta'], 0, ',', '.'); ?>€</td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>

<script>
    const dataTable = new simpleDatatables.DataTable("table")
</script>
