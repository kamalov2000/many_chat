<?php
/**
 *
 */
// наследуем от объекта с работой для базы данных
class Database extends PDO
{
//теперь есть класс Database, который использует конструктор родители и создает нам объект класса PDO
  function __construct()
  {
    parent::__construct('mysql:host=localhost;dbname='.DBNAME, DBUSER, DBPASS);
  }
}

 ?>
