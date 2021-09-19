<?php

use app\controllers\QueryController;

$obj = new QueryController();
$types = $obj->showFilters('tipos');
$provinces = $obj->showFilters('provincias');

?>

<form action="" id="filter" method="post">
    <div class="btn-group">
        <div>
            <input type="radio" name="operation" id="operation" value="sale">
            <label for="sale" class="btn"><?= $lang['SALE'] ?></label>
        </div>
        <div>
            <input type="radio" name="operation" id="rent" value="rent">
            <label for="rent" class="btn"><?= $lang['RENT'] ?></label>
        </div>
    </div>

    <div class="type">
        <h2><?= $lang['PROPERTY_TYPE'] ?></h2>
        <div class="wrap">
            <?php foreach ($types as $type) : ?>
                <div>
                    <input type="checkbox" name="type[]" id="type" value="<?= $type['tipo_nombre'] ?>">
                    <label for="type"><?= $type['tipo_nombre'] ?></label>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <div class="location">
        <h2><?= $lang['PROVINCE'] ?></h2>
        <div class="wrap">
            <?php foreach ($provinces as $province) : ?>
                <div>
                    <input type="checkbox" name="province[]" id="province" value="<?= $province['prov_nombre'] ?>">
                    <label for="sale"><?= $province['prov_nombre'] ?></label>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <div class="wrap">
        <label for="limit"><?= $lang['RESULTS_NUM'] ?></label>
        <select name="limit" id="limit">
            <option value="10">10</option>
            <option value="25" selected>25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    </div>

    <div class="price">
        <h2><?= $lang['MAX_PRICE'] ?></h2>
        <div class="wrap">
            <label for="price"></label>
            <input name="price" type="range" id="price" value="200000" min="0" max="1000000">
            <output>200,000€</output>
        </div>
    </div>

    <button class="btn submit"><?= $lang['FILTER_RESULTS'] ?></button>
</form>
