<?php
//Основная страница для просмотра уже готовых данных по вебинарам
include_once 'db_conf.php';
$db = new db_conf();
$conn = $db->con;
?>



<!DOCTYPE html>
<html lang="en">

    <?php
    require_once 'view/head/head.php'
    ?>

    <body>

        <?php
        require_once 'view/navbar/navbar.php'; //Подключаем навбар
             
        ?>


    </body>
</html>