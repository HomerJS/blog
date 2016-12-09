<?php

require_once 'view/layouts/main.php';
require_once 'view/slide/slide.php'; //подключаем слайдер


use blog\Blog;

require_once 'controller/absractText.php';
require_once 'controller/Blog.php';

if (@$_POST['send']) {
    $new_blog = new Blog($_POST, $conn);
    $new_blog->addOne();
}



$data=Blog::getAll($conn);


require_once 'view/layouts/outAll.php';
require_once 'view/layouts/addText.php';
