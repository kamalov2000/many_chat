<?php
/**
 *
 */
class Employees_Model extends Model
{

  public function __construct()
  {
    parent::__construct();

  }

  public function registerEmployee($data)
  {
      $sth = $this->db->prepare("INSERT employeer (name, first_name, second_name, male, date_birth, salary, id_department) VALUES (:name, :first_name, :second_name, :male, :date_birth, :salary, :id_department)");

      $sth->execute($data);

      if ($sth->rowCount() > 0) {
        return true;
      } else {
        return false;
      }


  }

  public function registerProject($data)
  {
    if ( $data[":employee_id"] == '') {
      $pr = $this->db->prepare("INSERT INTO table_emp_proj (`employee_id`, `project_id`) VALUES ((SELECT MAX(ID) FROM employeer), :project_id)");
      $pr->execute($data);
    } else {
      $pr = $this->db->prepare("INSERT INTO table_emp_proj (`employee_id`, `project_id`) VALUES (:employee_id, :project_id)");
      $pr->execute($data);
    }

    if ($pr->rowCount() > 0) {
      return true;
    } else {
      return false;
    }


  }

  public function getUserList()
  {
    $user = $this->db->prepare("SELECT * FROM employeer");

    $user->execute([]);

    if ($user->rowcount() > 0) {
      return $user->fetchAll(PDO::FETCH_ASSOC);
    } else {
      return false;
    }


  }

  public function getDepartmentList()
  {
    $dep = $this->db->prepare("SELECT * FROM department");

    $dep->execute([]);

    if ($dep->rowcount() > 0) {
      return $dep->fetchAll(PDO::FETCH_ASSOC);
    } else {
      return false;
    }


  }

  public function getProjectList()
  {
    $pr = $this->db->prepare("SELECT id, name FROM project");

    $pr->execute([]);

    if ($pr->rowcount() > 0) {
      return $pr->fetchAll(PDO::FETCH_ASSOC);
    } else {
      return false;
    }


  }


  public function edit($data)
  {
    $sth = $this->db->prepare("UPDATE employeer SET name = :name, first_name = :first_name, second_name = :second_name, male = :male, date_birth = :date_birth, salary = :salary, id_department = :id_department WHERE id = :employee_id");

    $sth->execute($data);

    if ($sth->rowCount() > 0) {
      return true;
    } else {
      return false;
    }


  }

  public function UpdateProject($data)
  {
    $pr = $this->db->prepare("UPDATE table_emp_proj SET employee_id = :employee_id, project_id = :project_id WHERE  employee_id = :employee_id");

    $pr->execute($data);

    if ($pr->rowCount() > 0) {
      return true;
    } else {
      return false;
    }


  }

  public function delUser($id)
  {
    $us = $this->db->prepare("DELETE FROM table_emp_proj WHERE employee_id  = :id; DELETE FROM employeer WHERE id = :id");

    $us->execute([':id' => $id]);

    if ($us->rowcount() > 0) {
      return true;
    } else {
      return false;
    }


  }

  public function get_by_id($id)
  {
    $sth = $this->db->prepare("SELECT * FROM employeer emp LEFT JOIN table_emp_proj  on emp.id = table_emp_proj.employee_id WHERE emp.id = :id");

    $sth->execute([':id' => $id]);

    if ($sth->rowcount() > 0) {
      return $sth->fetchAll(PDO::FETCH_ASSOC);
    } else {
      return false;
    }


  }


}

 ?>
