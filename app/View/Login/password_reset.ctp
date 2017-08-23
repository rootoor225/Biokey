<div class="row">
  <div class="col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
    <h5 class="semibold text-muted mt-5" style="font-size:large; text-align:center;">Password <?=($user['password']==null)?"set":"reset"?></h5>
    <hr><!-- horizontal line -->

    <form method="post" action="/login/password_reset/<?=$user['id']?>/<?=$token?>" class="panel">
      <div class="panel-body">
        <div class="form-group">
              
          <!--<span style="color:gray">Password must contain an uppercase letter, a number, and a symbol</span><br/><br/></br/>-->
          <div class="form-group">
            <input name="pass1" type="password" id="pass1" class="form-control input-lg" placeholder="Password" data-parsley-errors-container="#error-container" data-parsley-error-message="Please fill in all fields" data-parsley-required="true" required>
            <i class="ico-lock2 form-control-icon"></i>
          </div>

<?php if ($user['password'] != null){ ?>
          <div class="form-group">
            <input name="pass2" type="password" id="pass2" class="form-control input-lg" placeholder="Retype Password" data-parsley-errors-container="#error-container" data-parsley-error-message="Please fill in all fields" data-parsley-required="true" required>
            <i class="ico-lock2 form-control-icon"></i>
          </div>
<?php } ?>
        
        </div>
        <div class="form-group nm">
          <input type="submit" name="Button1" value="Submit" id="Button1" class="btn btn-block btn-success bold">
        </div>
      </div>
    </form>

  </div>
</div>