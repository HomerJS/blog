<?php

namespace blog;

//Абстрактный класс для работы с записями
//от него наследуются комментарии и блоги
abstract class abstractText {

    protected $ref; //референс записи
    protected $author; //автор записи
    protected $date;  //дата создания записи
    protected $text;  //текст записи
    protected $conn;  //дескриптор соединения

    abstract public function addOne();//функция для сохранения одной записи

    
    //проверка на пустое занчение
    protected function isEmpty($temp) {
        return (mb_strlen($temp)) ? 0 : 10;
    }

    //очистка данных
    protected function allClear($temp) {
        
        $temp = strip_tags($temp);
        $temp = htmlspecialchars($temp);

        return $temp;
    }

}
