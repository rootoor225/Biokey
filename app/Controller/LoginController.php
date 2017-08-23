<?php
/**
 * Login Controller
 *
 * app/Controller/LoginController.php
 */

class LoginController extends AppController {

  public $uses = false; // autoloader
  
  function beforeFilter(){
    parent::beforeFilter();
    $this->Auth->allow(); // Allow access to all pages in this controller
  }
  
  function index(){
    $enable_maintenance_mode = false;

    if($this->logged_in()) {
      $this->redirect("/guide");
    } else if($this->request->is('post')){
      // Try to log user in
      if($this->Auth->login()){
        
        // TODO: Check to see if the account has been disabled (or a problem with their email address)
        $this->User->after_login();
        $this->login_successful();
      }else{
        // Login failed
        $email = $this->request->data('User.email');
        if(strlen($email) && !count($this->User->get_by_email($email))){
          $this->alert("Email address not found. Did you sign-up with a different one?", 'error');
        }else{
          $this->alert('Your email address or password is incorrect', 'error');
        }
        $this->redirect('/login');
      }
    }
  }
  
  function forgot_password(){}
  
  function register(){
    if($this->logged_in()){
      $this->alert('You are already logged in', 'err');
      $this->redirect('/guide');
    }
    if ($this->request->is('post')){
      $errstr = "";
      if (!(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
        $errstr = "Invalid email address";
      }
      if ($this->User->find('first',array('conditions'=>array('email'=>$_POST['email'])))) {
        $errstr = "Email address is already in use.";
      }
      if ($_POST['email'] == "" || $_POST['first_name'] == "" || $_POST['last_name'] == "") {
        $errstr = "All fields must be filled in.";
      }
      if ($errstr != ""){
        $this->alert($errstr,'err');
      }else{
        $new_id = $this->User->add_user($_POST);
        if ($new_id != null){
          $user = $this->User->get_by_id($new_id);
          $this->Auth->login($new_id);
          $this->alert('Registration complete!');
          $this->redirect("/guide");
        }
      }
    }
  }
  
  private function login_successful(){
    $this->redirect("/guide");
  }
  
  function logout(){
    $this->Auth->logout();
    $this->alert('You have been logged out');
    $this->redirect("/login");
  }

}