<?php

/**
 *
 */
class Controller
{

  public function __construct()
  {
    // echo 'main controller<br>';
    //зададим общий объект для всех контроллеров

    $this->view = new View;
    //Так мы подключили модель
    $this->name_model = get_class($this).'_Model';

    if (file_exists($_SERVER['DOCUMENT_ROOT'].'/test/mvc-test/mvc/models/'.strtolower($this->name_model).'.php')) {
      // в strlower положили название класса.
      require_once $_SERVER['DOCUMENT_ROOT'].'/test/mvc-test/mvc/models/'.strtolower($this->name_model).'.php';
      $this->model = new $this->name_model;
    }
  }

  public function index()
  {
    //обращаемся к своему объекту
    //get_class Возвращает имя класса, к которому принадлежит объект
    $this->view->render(strtolower(get_class($this)));
  }
}
