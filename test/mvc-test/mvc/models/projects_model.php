<?php

class Projects_Model extends Model
{

  public function __construct()
  {
    parent::__construct();

  }

  public function addProject($data)
  {
      $project = $this->db->prepare("INSERT project (name) VALUES (:name)");

      $project->execute($data);

      if ($project->rowCount() > 0) {
        return true;
      } else {
        return false;
      }


  }

  public function regEmpInProj($data)
  {
    $pr = $this->db->prepare("INSERT INTO table_emp_proj (`employee_id`, `project_id`) VALUES (:employee_id, (SELECT MAX(ID) FROM project))");

    $pr->execute($data);

    if ($pr->rowCount() > 0) {
      return true;
    } else {
      return false;
    }


  }

  public function getProjectsList()
  {
    $pr = $this->db->prepare("SELECT id, name FROM project");

    $pr->execute([]);

    if ($pr->rowcount() > 0) {
      return $pr->fetchAll(PDO::FETCH_ASSOC);
    } else {
      return false;
    }


  }

  public function getEmployeeList()
  {
    $emp = $this->db->prepare("SELECT id, name FROM employeer");

    $emp->execute([]);

    if ($emp->rowcount() > 0) {
      return $emp->fetchAll(PDO::FETCH_ASSOC);
    } else {
      return false;
    }


  }

  public function delProject($id)
  {
    $pr = $this->db->prepare("DELETE FROM table_emp_proj WHERE project_id  = :id; DELETE FROM project WHERE id = :id");

    $pr->execute([':id' => $id]);

    if ($pr->rowcount() > 0) {
      return true;
    } else {
      return false;
    }


  }

  public function edit($data)
  {
      $sth = $this->db->prepare("UPDATE project SET name = :name WHERE id = :id");

      $sth->execute($data);

      if ($sth->rowCount() > 0) {
        return true;
      } else {
        return false;
      }


  }

  public function UpdateProject($data)
  {
    $pr = $this->db->prepare("UPDATE table_emp_proj SET employee_id = :employee_id, project_id = :id WHERE  project_id = :id");

    $pr->execute($data);

    if ($pr->rowCount() > 0) {
      return true;
    } else {
      return false;
    }


  }

  public function get_by_id($id)
  {
    $sth = $this->db->prepare("SELECT * FROM project, table_emp_proj WHERE project.id = :id AND table_emp_proj.project_id = :id");

    $sth->execute([':id' => $id]);

    if ($sth->rowcount() > 0) {
      return $sth->fetchAll(PDO::FETCH_ASSOC);
    } else {
      return false;
    }


  }


}
