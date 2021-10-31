<?php
/**
 *
 */
class Projects extends Controller
{

  public function __construct()
  {
    //обращение к классу родителя
    parent::__construct();

  }

  public function addProject()
  {
    $name = htmlspecialchars($_REQUEST['name']);
    $employee_id = htmlspecialchars($_REQUEST['name_employeer']);

    if ($name != '') {
      $data = [
        ':name' => $name,
      ];

      if ( $id = $this->model->addProject($data) ) {
        echo json_encode(["error" => false, "success" => true, "new_id" => $id]);
      } else {
        echo json_encode(["error" => true]);
      }

      if ($employee_id != '') {
        $data = [
          ':employee_id' => $employee_id,
        ];

        $this->model->regEmpInProj($data);
      }
    }


  }

  public function index()
  {
    if ( $project_list = $this->model->getProjectsList() ) {
      $this->view->projects_list = $project_list;
    }

    if ( $employeer_list = $this->model->getEmployeeList() ) {
      $this->view->employeer_list = $employeer_list;
    }

    parent::index();


  }

  public function delProject($id)
  {
    if ($id > 0) {
      if ( $this->model->delProject($id) ) {
        echo json_encode(['success' => true]);
      } else {
        echo json_encode(['success' => false]);
      }
    }
    echo $id;


  }

  public function edit()
  {
    $error = [];
    $employee_id = htmlspecialchars($_REQUEST['employee_id']);
    $name_project = htmlspecialchars($_REQUEST['name']);
    $project_id = htmlspecialchars($_REQUEST['id']);

    if (count($error) > 0) {
      echo json_encode($error);
      die;
    }

    $data = [
      ':id' => $project_id,
      ':name' => $name_project,
    ];

    if ( $id = $this->model->edit($data) ) {
      echo json_encode(["error" => false, "success" => true, "new_id" => $id ]);
    } else {
      echo json_encode(["error" => true]);
    }

    $data = [
      ':id' => $project_id,
      ':employee_id' => $employee_id,
    ];

    $this->model->UpdateProject($data);


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
