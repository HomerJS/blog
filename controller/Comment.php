<?php

namespace blog;

/**
 * Description of Blog
 *
 * @author DN220491TIA
 */
class Comment extends abstractText {

    private $blog_id;

    public function __construct($array, $conn,$id) {
        $author = $this->isEmpty($array['author']) ? 'Guest' : $array['author'];
        $text = $array['blog'];
        $blog_id = $id;

        //очистим и экранируем входящие данные
        $author = $this->allClear($author);
        $text = $this->allClear($text);
        $blog_id=$this->allClear($id);

        $this->ref = date('Ymd') . 'CM' . date('His') . rand(10, 99);
        $this->author = $author;
        $this->date = date('Y:m:d H:i:s');
        $this->text = $text;
        $this->conn = $conn;
        $this->blog_id=$blog_id;
        ;
    }

    public static function getAll($conn,$id) {
        $stmt = $conn->prepare("select * from comments where ref_blog=? order by date asc");
        $stmt->execute(array($id));
        $data=$stmt->fetchAll();
        return $data;
    }

      public function addOne() {
         try {
            $sql = "INSERT INTO comments (ref_com,ref_blog, date,author,text) VALUES (?,?,?,?,?);";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute(array($ref_com = $this->ref,$ref_blog=$this->blog_id,  $date = $this->date, $author = $this->author,$text = $this->text));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

   

}
