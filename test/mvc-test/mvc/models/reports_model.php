<?php
/**
 *
 */
class Reports_Model extends Model
{

  public function __construct()
  {
    parent::__construct();
    // echo 'catalog - model';
  }

  public function getReportsList()
  {
    $sth = $this->db->prepare("SELECT
    	SUM(salary), tep.project_id, project.name
    FROM
    	project, employeer as e
    LEFT JOIN table_emp_proj as tep ON tep.employee_id = e.id
    WHERE
    	tep.employee_id = e.id
    	AND project.id = tep.project_id
    GROUP BY tep.project_id
    ORDER BY SUM(salary)  DESC");

    $sth->execute([]);

    if ($sth->rowcount() > 0) {
      return $sth->fetchAll(PDO::FETCH_ASSOC);
    } else {
      return false;
    }
  }


}

 ?>
