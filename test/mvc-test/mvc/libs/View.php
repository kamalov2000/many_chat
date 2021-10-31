<?php
/**
 *
 */
class View
{
  public $arResult = [];
  public function __construct()
  {
    // echo 'View<br>';
  }

  public function render( $path, $file_name = 'index' )
  {
    if ( file_exists($_SERVER['DOCUMENT_ROOT'].'/test/mvc-test/mvc/views/'.$path.'/'.$file_name.'.php') ) {
      require $_SERVER['DOCUMENT_ROOT'].'/test/mvc-test/mvc/views/'.$path.'/'.$file_name.'.php';
    }
  }
}

 ?>
