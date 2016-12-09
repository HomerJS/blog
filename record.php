<?php

//основной файл для работы с конкретной блоговой записью
//Подключаем хед
require_once 'view/layouts/main.php';


//Подключаем все класса
require_once 'controller/absractText.php';
require_once 'controller/Blog.php';
require_once 'controller/Comment.php';

//проверка на наличие переменной id в урле
if (isset($_GET['id'])) {

    $blog_id = $_GET['id']; //Если есть, то присваиваем ее значение переменной
    $data = blog\Blog::getOne($blog_id, $conn); //вытаскиваем все данные по этому номеру блога
    //проверка на неверное значение референса блога
    if (!$data) {
        require_once 'view/NotFound.php';
        die;
    }

//вьюха для отображения развернутой информации по блогу
    require_once 'view/record.php';

    //пост запрос, который сохраняет данные по новому комменту
    if (@$_POST['send']) {
        $new_comment = new \blog\Comment($_POST, $conn, $blog_id);
        $new_comment->addOne();
    }

//получим все комментарии по этому блогу
    $data = blog\Comment::getAll($conn, $blog_id);

    //генерим вьюху на вывод все комментов
    require_once 'view/layouts/outAll.php';


    //генерим вьюху на добавление нового коммента
    require_once 'view/layouts/addText.php';
} else {
    require_once 'view/NotFound.php';
    die;
}