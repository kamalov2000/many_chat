<?php
/**
 *
 */
class Reports extends Controller
{

  public function __construct()
  {
    //обращение к классу родителя
    parent::__construct();

  }

  public function index()
  {
    if ( $sections = $this->model->getReportsList() ) {
      $this->view->report_list = $sections;
    }

    parent::index();
  }
}
 ?>
