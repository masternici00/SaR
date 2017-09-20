  <form class="form-horizontal" action="/user/doCreate" method="post">
<div class=rahmen>

<div class="form-group">
  <label for="name" class="col-sm-2 control-label">Firstname</label>
  <div class="col-sm-10">
    <input name="firstname" type="name" class="form-control" id="inputName3" placeholder="Name">
  </div>
</div>
<div class="form-group">
  <label for="name" class="col-sm-2 control-label">Surname</label>
  <div class="col-sm-10">
    <input name="surname" type="name" class="form-control" id="inputName3" placeholder="Surname">
  </div>
</div>

<div class="form-group">
  <label for="username" class="col-sm-2 control-label">Username</label>
  <div class="col-sm-10">
    <input name="username" type="username" class="form-control" id="inputUsername3" placeholder="Username">
  </div>
</div>

<div class="form-group">
  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
  <div class="col-sm-10">
    <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="Password">
  </div>
</div>

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit"  class="btn btn-default">Sign in</button>
  </div>
</div>
</div>
<h1><?php echo $ausgabe; ?></h1>
</form>
