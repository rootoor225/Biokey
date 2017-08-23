<?php
/**
 * Account Controller
 *
 * app/Controller/AccountController.php
 */

class AccountController extends AppController {
    
    function index(){
      $user = $this->User->get_by_id($this->Auth->user());
      $keys = $this->Biokey->get_by_user_id($user['id']);
      
      debug($keys);
      
    }
    
    function keys() {
      $this->set('keys',$this->Biokey->get_by_user_id($this->Auth->user()));
    }
    
    public function beforeRender(){
      parent::beforeRender();
      if (!($this->Auth->loggedIn())) {
        $this->redirect('/login');
      }
    }

}