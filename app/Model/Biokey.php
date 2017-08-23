<?php
/**
 * Biokey Model
 * 
 * app/Model/Biokey.php
 */

class Biokey extends AppModel {
  
  function get_by_user_id($id = null){
    if (!$id) {
      $id = $this->Auth->user();
    }
    return $this->find('all', array('conditions'=>array('user_id'=>$id)));
  }
  
  function parse_file($str) {
    return "parse file works";
  }

}