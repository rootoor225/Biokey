<?php
/**
 * Main Controller
 *
 * app/Controller/MainController.php
 */

class MainController extends AppController {

  public $uses = false; // autoloader
  
  function index(){
    $this->set('page_title', 'Main Page'); 
  }
  
}
?>