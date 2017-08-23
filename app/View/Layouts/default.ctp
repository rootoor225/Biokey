<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/main.css"> <!-- keep at bottom of stylesheets -->
  
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
</head>
<body>
  <div class="well" id="body-well">
    <span style="text-align:left;margin-left:15px;font-family:zantroke;font-size:35px;color:black">BioKey</span>&nbsp;
    <img src="/img/leaf-icon.svg" style="height:35px;margin-bottom:10px" />
<?php if ($is_logged_in) { ?>
        <h4 style="float:right;font-family:zantroke">Welcome, <?=$current_user['username']?>!</h4>
<?php } ?>
    
    <div class="btn-group btn-group-justified" role="group" aria-label="...">
      <div class="btn-group" role="group">
        <a href="/" class="btn btn-default btn-topnav">Home</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/guide/lookup/" class="btn btn-default btn-topnav">Find Key</a>
      </div>
      <div class="btn-group" role="group">
        <a href="/guide/help" class="btn btn-default btn-topnav">Help</a>
      </div>
      <div class="btn-group" role="group">
<?php if ($is_logged_in) { ?>
        <a href="/login/logout" class="btn btn-default btn-topnav">Logout</a>
<?php }else{ ?>
        <a href="/login" class="btn btn-default btn-topnav">Login / Register</a>
<?php } ?>
      </div>
    </div>
    <br/>
    <div class="row">
      <div class="hidden-xs col-sm-3 col-md-2">
        <div class="panel panel-default">
          <div class="panel-heading">Quick Links</div>
          <div class="panel-body" style="border-bottom:1px solid black">
            <a class="guidelink" href="/guide/lookup/1">Animal&nbsp;<span class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></a><br/>
            <a class="guidelink" href="/guide/lookup/2">Plant&nbsp;<span class="glyphicon glyphicon-leaf" aria-hidden="true"></span></a><br/>
            <a class="guidelink" href="/guide/lookup/3">Fungus&nbsp;<span class="glyphicon glyphicon-ice-lolly" aria-hidden="true"></span></a><br/>
            <a class="guidelink" href="/guide/lookup/">Other&nbsp;<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></a>
          </div>
          <div class="panel-heading">Locations</div>
          <div class="panel-body" style="border-bottom:1px solid black">
            <a class="guidelink" href="#">Africa</a><br/>
            <a class="guidelink" href="#">Asia</a><br/>
            <a class="guidelink" href="#">Europe</a><br/>
            <a class="guidelink" href="#">North America</a><br/>
            <a class="guidelink" href="#">Oceania</a><br/>
            <a class="guidelink" href="#">South America</a>
          </div>
<?php if ($is_logged_in) { ?>
          <div class="panel-heading"><?=$current_user['username']?></div>
          <div class="panel-body">
            <a class="guidelink" href="/account">My Account</a><br/>
            <a class="guidelink" href="/account/keys">My Keys</a><br/>
            <a class="guidelink" href="/account/settings">Settings</a><br/>
            <a class="guidelink" href="/login/logout">Logout</a>
          </div>
<?php } ?>
        </div>
      </div>
      <div class="col-xs-12 col-sm-9 col-md-10">
	      <div id="container">
		      <div id="content">
		        <div class="well" style="background-color:#e6ffe6">
              <?php echo ($breadcrumb_header == '')?'':($breadcrumb_header.'<br/><br/>'); ?>
			        <?php echo $this->Session->flash(); ?>
			        <?php echo $this->fetch('content'); ?>
			        <br/><br/>
			        <span class="page-comment"><?=$contribution_info?></span>
			      </div>
		      </div>
		    </div>
	    </div>
	  </div>
	
	</div>
</body>
</html>
