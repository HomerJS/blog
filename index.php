<?php
//основной файл для работы с основной страницей

//Подключаем хедер
require_once 'view/layouts/main.php';
require_once 'view/slide/slide.php'; //подключаем слайдер


use blog\Blog;

//Подключаем классы для работы 
require_once 'controller/absractText.php';
require_once 'controller/Blog.php';


//Обработка пост запроса на сохранения блоговой записи
if (@$_POST['send']) {
    $new_blog = new Blog($_POST, $conn);
    $new_blog->addOne();
}


//получаем данные по всем блогам
$data=Blog::getAll($conn);

//генерим вьюху для отображения всех записей
require_once 'view/layouts/outAll.php';

//генерим вьюху для добавления новой записи
require_once 'view/layouts/addText.php';
