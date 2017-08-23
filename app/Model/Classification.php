<?php
/**
 * Classification Model
 * 
 * app/Model/Classification.php
 */

class Classification extends AppModel {
  
  function traceback($id = null) {
    if (!$id) {return null;}
    $arr = [];
    array_push($arr,$id);
    while ($x = $this->get_parent_c($id)) {
      array_push($arr,$x['id']);
      $id = $x['id'];
    }
    $result = [];
    $c = [];
    while (count($arr)) {
      $c = $this->find('first', array('conditions'=>array('id'=>array_pop($arr))));
      array_push($result,'<a href="/guide/lookup/"'.$c['Classification']['id'].'">'.ucfirst(strtolower($c['Classification']['name'])).'</a>');
    }
    array_pop($result);
    array_push($result, '<b>'.ucfirst(strtolower($c['Classification']['name'])).'</b>');
    return implode(' -> ',$result);
  }
  
  function get_parent_c($id = null) {
    if ($id == null) { return null; }
    if (!($c = $this->find('first',array('conditions'=>array('id'=>$id))))) {
      return null;
    }
    if (!($d = $this->find('first', array('conditions'=>array('id'=>$c['Classification']['parent_id']))))) {
      return null;
    }
    return $d['Classification'];
  }

  function get_by_id($id = null, $recursive = -1) {
    if (!($c = parent::get_by_id($id, $recursive))) {
      return null;
    }
    $c['Rank'] = $this->Rank->get_by_id($c['rank_id']);
    return $c;
  }
}