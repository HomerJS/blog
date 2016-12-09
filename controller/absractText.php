<?php

namespace blog;

/**
 * Description of Text
 *
 * @author DN220491TIA
 */
abstract class abstractText {

    protected $ref; //референс записи
    protected $author; //автор записи
    protected $date;  //дата создания записи
    protected $text;  //текст записи
    protected $conn;  //дескриптор соединения

    abstract public function addOne();

    
    protected function isEmpty($temp) {
        return (mb_strlen($temp)) ? 0 : 10;
    }

    protected function allClear($temp) {
        $temp = strip_tags($temp);
        $temp = htmlspecialchars($temp);

        return $temp;
    }

}
