<?php
/**
 *
 */
class Employees extends Controller
{
  public function __construct()
  {
    //обращение к классу родителя
    parent::__construct();

  }

  public function createEmployee()
  {
    $error = [];
    $name = htmlspecialchars($_REQUEST['name']);
    $first_name = htmlspecialchars($_REQUEST['first_name']);
    $second_name = htmlspecialchars($_REQUEST['second_name']);
    $male = htmlspecialchars($_REQUEST['male']);
    $date_birth = htmlspecialchars($_REQUEST['date_birth']);
    $salary = htmlspecialchars($_REQUEST['salary']);
    $id_department  = htmlspecialchars($_REQUEST['id_department']);

    if ($name == '') {
      $error['name'] = false;
    }

    if (count($error) > 0) {
      echo json_encode($error);
      die;
    }

    $data = [
      ':name' => $name,
      ':first_name' => $first_name,
      ':second_name' => $second_name,
      ':male' => $male,
      ':date_birth' => $date_birth,
      ':salary' => $salary,
      ':id_department' => $id_department,
    ];

    if ( $id = $this->model->registerEmployee($data) ) {
      echo json_encode(["error" => false, "success" => true, "new_id" => $id]);
    } else {
      echo json_encode(["error" => true]);
    }

    $id_project = htmlspecialchars($_REQUEST['project_id']);

    if ($id_project != 0) {
      $data = [
        ':project_id' => $id_project,
      ];

      $this->model->registerProject($data);
    }


  }

  public function edit()
  {
    $error = [];
    $id = htmlspecialchars($_REQUEST['id']);
    $name = htmlspecialchars($_REQUEST['name']);
    $first_name = htmlspecialchars($_REQUEST['first_name']);
    $second_name = htmlspecialchars($_REQUEST['second_name']);
    $male = htmlspecialchars($_REQUEST['male']);
    $date_birth = htmlspecialchars($_REQUEST['date_birth']);
    $salary = htmlspecialchars($_REQUEST['salary']);
    $id_department  = htmlspecialchars($_REQUEST['id_department']);
    $project_id = htmlspecialchars($_REQUEST['project_id']);
    $employee_id = htmlspecialchars($_REQUEST['employee_id']);

    if (count($error) > 0) {
      echo json_encode($error);
      die;
    }

    $data = [
      ':name' => $name,
      ':first_name' => $first_name,
      ':second_name' => $second_name,
      ':male' => $male,
      ':date_birth' => $date_birth,
      ':salary' => $salary,
      ':id_department' => $id_department,
      ':employee_id' => $employee_id,
      // ':project_id' => $project_id,
    ];

    if ( $this->model->edit($data) ) {
      echo json_encode(["error" => false, "success" => true, "new_id" => $employee_id ]);
    } else {
      echo json_encode(["error" => true]);
    }

    $data = [
      ':project_id' => $project_id,
    ];

    $this->model->registerProject($data);

    $data = [
      ':employee_id' => $employee_id,
      ':project_id' => $project_id,
    ];

    $this->model->UpdateProject($data);


  }

  public function index()
  {
    if ( $get_user_list = $this->model->getUserList() ) {
      $this->view->user_list = $get_user_list;
    }

    if ( $get_department_list = $this->model->getDepartmentList() ) {
      $this->view->dep_list = $get_department_list;
    }

    if ( $get_project_list = $this->model->getProjectList() ) {
      $this->view->pr_list = $get_project_list;
    }

    parent::index();


  }

  public function delUser($id)
  {
    if ($id > 0) {
      if ( $this->model->delUser($id) ) {
        echo json_encode(['success' => true]);
      } else {
        echo json_encode(['success' => false]);
      }
    }
    echo $id;


  }

  public function get_by_id($id) {
      if ($section = $this->model->get_by_id($id)) {
        echo json_encode(['success' => true, "section" => $section]);
      } else {
        echo json_encode(['success' => false]);
      }


  }


}
?>
