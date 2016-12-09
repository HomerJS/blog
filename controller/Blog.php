<?php

namespace blog;

//класс для работы с блоговыми записями
class Blog extends abstractText {

    public function __construct($array, $conn) {

        $author = $this->isEmpty($array['author']) ? 'Guest' : $array['author']; //Проверка на налаичие автора, если нету, пишем что гость
        $text = $array['blog'];

        //очистим и экранируем входящие данные
        $author = $this->allClear($author);
        $text = $this->allClear($text);

        $this->ref = date('Ymd') . 'BL' . date('His') . rand(10, 99);
        $this->author = $author;
        $this->date = date('Y:m:d H:i:s');
        $this->text = $text;
        $this->conn = $conn;
    }

    //Выбор всех блоговых записей
    public static function getAll($conn) {
        $data = $conn->query("select t1.ref,t1.author,substr(t1.text,1,100)as 'text',t1.date,IFNULL(t2.kol,0)as 'kol' from blog as t1 left join (SELECT ref_blog,count(ref_com) as 'kol' FROM blog.comments group by ref_blog) as t2 on t1.ref=t2.ref_blog order by date desc")->fetchAll();
        return $data;
    }

    //выбор одной записи по id
    public static function getOne($id, $conn) {
        $stmt = $conn->prepare("select t1.ref,t1.author,t1.text,t1.date,IFNULL(t2.kol,0)as 'kol' from blog as t1 left join (SELECT ref_blog,count(ref_com) as 'kol' FROM blog.comments group by ref_blog) as t2 on t1.ref=t2.ref_blog where t1.ref=?");
        $stmt->execute(array($id));
        $ret=$stmt->fetch();
        
        return $ret;
    }

    //Сохранение нового блога
    public function addOne() {

        try {
            $sql = "INSERT INTO blog (ref, author,date,text) VALUES (?, ?,?,?);";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute(array($ref = $this->ref, $author = $this->author, $date = $this->date, $text = $this->text));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    //выбор топ-5 записей для слайдера
     public static function getTop($conn) {

        $data = $conn->query("select t1.ref,t1.author,substr(t1.text,1,100) as 'text' from blog as t1 left join (SELECT ref_blog,count(ref_com) as 'kol' FROM blog.comments group by ref_blog) as t2 on t1.ref=t2.ref_blog order by kol desc limit 5")->fetchAll();
        return $data;
    }

}
