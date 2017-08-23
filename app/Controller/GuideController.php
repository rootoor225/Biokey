<?php
/**
 * Guide Controller
 *
 * app/Controller/GuideController.php
 */

class GuideController extends AppController {

  public $uses = false; // autoloader
  
  function lookup($id = 0){
    $this->set('classification', $this->Classification->get_by_id($id));
    $this->set('breadcrumb_header', $this->Classification->traceback($id));
  }
  
  function help(){
    $this->set('contribution_info','Contributed by Spenser Galloway on 22 August, 2017 - 9:09pm<br/>Last updated on 22 August, 2017 - 9:14pm');
  }
  
  function index(){
    $this->redirect('/guide/lookup/');
  }
  
  function view($id){
    if (!($id)) {
      $this->set('info','Invalid ID!');
    } else {
      $f = fopen('files/biokey_' . $id . ".txt", "w");
      $this->set('info',$this->Biokey->parse_file($f));
      fclose($f);
    }
  }
  
}
?>