<?php

require_once 'view/layouts/main.php';



require_once 'controller/absractText.php';
require_once 'controller/Blog.php';
require_once 'controller/Comment.php';

if (isset($_GET['id'])) {

    $blog_id = $_GET['id'];
    $data = blog\Blog::getOne($blog_id, $conn);

    if (!$data) {
        require_once 'view/NotFound.php';
        die;
    }


    require_once 'view/record.php';

    if (@$_POST['send']) {
        $new_comment = new \blog\Comment($_POST, $conn, $blog_id);
        $new_comment->addOne();
    }


    $data = blog\Comment::getAll($conn, $blog_id);


    require_once 'view/layouts/outAll.php';



    require_once 'view/layouts/addText.php';
} else {
    require_once 'view/NotFound.php';
    die;
}