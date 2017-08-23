 <?php $this->set('page_title','Register New');?>
<div class="row">
  <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
    <h2>Create an account.</h2><br/>
    <form method="POST" action="/login/register" class="panel" style="margin-bottom:10px; border:2px solid black">
      <div class="panel-body" style="border-style:2px solid black;">
        <div class="form-group">
          <div class="col-sm-4"><label class="control-label">First Name:</label></div>
          <div class="col-sm-8"><input name="first_name" type="text" class="form-control" required /></div>
        </div><br/>
      
      <div class="form-group">
        <div class="col-sm-4"><label class="control-label">Last Name:</label></div>
        <div class="col-sm-8"><input name="last_name" type="text" class="form-control" required /></div>
      </div><br/>
      
      <div class="form-group">
        <div class="col-sm-4"><label class="control-label">Email:</label></div>
        <div class="col-sm-8"><input name="email" type="email" class="form-control" required /></div>
      </div><br/><br/>

      <div style="text-align:center; margin-top:10px">
        <button type="submit" class="btn btn-block btn-success bold" style="font-family:zantroke;">Register</button>
      </div><br/>
      <p>Already have an account? <a href="/login">Sign in!</a></p>
      </div>
    </form>
  </div>
</div>

