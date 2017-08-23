<div class="row <?=isset($disable_login)?'hidden':''?>">
  <div class="col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">

    <h2>Login to your account.</h2><br/>
    <form method="post" action="/login" id="frmLogin" class="panel" style="margin-bottom:10px; border:2px solid black">
      <div class="panel-body" style="border-style:2px solid black;">
        
        <div class="form-group">
          <input name="data[User][email]" type="email" id="txtUsername" class="form-control input-lg" placeholder="Email address" data-parsley-errors-container="#error-container" data-parsley-error-message="Please fill in your username / email" data-parsley-required="true" required>
          <i class="ico-user2 form-control-icon"></i>
        </div>
        
        <div class="form-group">
          <input name="data[User][password]" type="password" id="txtPassword" class="form-control input-lg" placeholder="Password" data-parsley-errors-container="#error-container" data-parsley-error-message="Please fill in your password" data-parsley-required="true" required>
          <i class="ico-lock2 form-control-icon"></i>
        </div>
        
        <a class="guidelink" href="/login/forgot_password">Lost password?</a><br/><br/><br/>
        
        <div class="form-group nm">
          <input type="submit" value="Sign In" class="btn btn-block btn-success bold" style="font-family:zantroke;">
        </div>
        
        <br/><p>Don't have an account yet? <a href="/login/register">Register here!</a><br/>All information is saved under this email.</p>
      </div>
    </form>
  </div>
</div> <!-- .row -->
