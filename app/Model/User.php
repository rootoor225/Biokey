<?php
/**
 * User Model
 * 
 * app/Model/User.php
 */

class User extends AppModel {
  
  function add_user($params){
    //need: first_name, last_name, email
    //optional: password=NULL, is_admin=0, username=firstname.lastname
    //if email is already in system, current user account is returned
    if ($user = $this->get_by_email($params['email'])){
      if (strcasecmp($user['first_name'],$params['first_name']) == 0 ||
          strcasecmp($user['last_name'],$params['last_name']) == 0){
        return $user['id'];
      }else{
        return null;
      }
    }else{
    //if email not in system, a new user account is created
      $this->create();
      if (!isset($params['password']) || !$params['password']) {
        $params['password'] = "qq";
      }
      $this->save(array(
        'first_name'=>ucfirst($params['first_name']),
        'last_name'=>ucfirst($params['last_name']),
        'username'=>((isset($params['username']) && $params['username'] && strlen($params['username'])) ? $params['username']:$params['first_name'] . "." . $params['last_name']),
        'email'=>$params['email'],
        'password'=>null,//$this->Auth->password($params['password']),
        'is_admin'=>(isset($params['is_admin'])?$params['is_admin']:0)
      ));
      return $this->id;
    }
  }
  
  public function after_login(){

  }
  
  function get_by_email($email = null){
    if ($email == null) { return null; }
    $u = $this->find('first',array('conditions'=>array('email'=>$email)));
    if (!count($u))
      return null;
    return $u['User'];
  }

  function get_by_username($username = null){
    if ($username == null) { return null; }
    $u = $this->find('first',array('conditions'=>array('username'=>$username)));
    if (!count($u))
      return null;
    return $u['User'];
  }
  
  function is_admin($id){
    if ($u = $this->find('first',array('conditions'=>array('id'=>$id))))
      return $u['User']['is_admin'];
    return NULL;
  }
  
}