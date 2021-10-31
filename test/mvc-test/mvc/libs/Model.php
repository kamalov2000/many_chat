<?php
// главный класс модели
/**
 *
 */
class Model
{

  public function __construct()
  {
    $this->db = new Database;
  }
}
