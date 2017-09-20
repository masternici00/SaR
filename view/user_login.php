  <form class="form-horizontal" action="/user/doLogin" method="post">
    <div class="rahmen">
    <div class="form-group">
      <label for="username" class="col-sm-2 control-label">Username</label>
      <div class="col-sm-10">
        <input type="username" name="username" class="form-control" id="inpuUsername" placeholder="Username" pattern="[A-Za-z0-9!?%*#@$]{1,}">
      </div>
    </div>

    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
      <div class="col-sm-10">
        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Sign in</button>
      </div>
    </div>
</div>
  </form>
