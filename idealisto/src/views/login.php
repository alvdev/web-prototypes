<?php include_once 'templates/header.php' ?>

<h1><?= $lang['LOGIN_TITLE'] ?></h1>

<?= $variables['title'] ?>

<form id="login" action="" method="post">
    <div class="wrapper">
        <div>
            <label for="username"><?= $lang['USERNAME'] ?></label>
            <input id="username" type="text" name="username">
        </div>

        <div>
            <label for="password"><?= $lang['PASSWORD'] ?></label>
            <input id="password" type="password" name="password">
        </div>
    </div>

    <button class="btn submit"><?= $lang['LOGIN'] ?></button>
</form>

<?php include_once 'templates/footer.php' ?>
