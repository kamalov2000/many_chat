<?php

class Departments_Model extends Model
{

  public function __construct()
  {
    parent::__construct();

  }

  public function addDepartment($data)
  {
    $dep = $this->db->prepare("INSERT department (name) VALUES (:name)");

    $dep->execute($data);

    if ($dep->rowCount() > 0) {
      return true;
    } else {
      return false;
    }


  }

  public function getDepartmentsList()
  {
    $sth = $this->db->prepare("SELECT id, name FROM department");

    $sth->execute([]);

    if ($sth->rowcount() > 0) {
      return $sth->fetchAll(PDO::FETCH_ASSOC);
    } else {
      return false;
    }


  }

  public function delDepartment($id)
  {
    $sth = $this->db->prepare("DELETE FROM department WHERE id = :id");

    $sth->execute([':id' => $id]);

    if ($sth->rowcount() > 0) {
      return true;
    } else {
      return false;
    }


  }

  public function get_by_id($id)
  {
    $sth = $this->db->prepare("SELECT * FROM department WHERE id = :id");

    $sth->execute([':id' => $id]);

    if ($sth->rowcount() > 0) {
      return $sth->fetchAll(PDO::FETCH_ASSOC);
    } else {
      return false;
    }


  }

  public function edit($data)
  {
      $sth = $this->db->prepare("UPDATE department SET name = :name WHERE id = :id");

      $sth->execute($data);

      if ($sth->rowCount() > 0) {
        return true;
      } else {
        return false;
      }

  }

}
