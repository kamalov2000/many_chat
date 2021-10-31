<?php
/**
 *
 */
class Departments extends Controller
{

  public function __construct()
  {
    //обращение к классу родителя
    parent::__construct();

    $this->view->title = "Отделы";

  }

  public function addDepartment()
  {
    $name = htmlspecialchars($_REQUEST['name']);

    if ($name != '') {
      $data = [
        ':name' => $name,
      ];

      if ($id = $this->model->addDepartment($data)) {
        echo json_encode(["error" => false, "success" => true, "new_id" => $id]);
      } else {
        echo json_encode(["error" => true]);
      }
    }


  }

  public function index()
  {
    if ( $sections = $this->model->getDepartmentsList() ) {
      $this->view->sections_list = $sections;
    }

    parent::index();


  }


    public function delDepartment($id)
    {
      if ($id > 0) {
        if ( $this->model->delDepartment($id) ) {
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
      $name_project = htmlspecialchars($_REQUEST['name']);
      $department_id = htmlspecialchars($_REQUEST['id']);

      if (count($error) > 0) {
        echo json_encode($error);
        die;
      }

      $data = [
        ':name' => $name_project,
        ':id' => $department_id,
      ];
  var_dump($data);
      if ( $id = $this->model->edit($data) ) {
        echo json_encode(["error" => false, "success" => true, "new_id" => $id ]);
      } else {
        echo json_encode(["error" => true]);
      }


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
