<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of db_conf
 *
 * @author DN220491TIA
 */
class db_conf {

    public $con;      //Сюда запишем дескриптор соединения

    private final function Con() { //функция подключения к бд, закрыта, и без возможности изменения
        //
        $dsn = 'mysql:dbname=test;host=localhost';
        $user = "test";       //Имя пользователя
        $password = 'test';



        $this->con = new PDO($dsn, $user, $password) or die("Не удалось подключится"); //Подключаемся
    }

    public function __construct() {    //Конструктор
        $this->Con();   //Подключаемся
       
    }

    public function __destruct() {      //Деструтор
        $this->con = NULL;
    }


}
