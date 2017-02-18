<?php
  if(@$_SESSION['login']===base64_encode(md5(@$_SESSION['username']).session_id())){
    header('Location: index.php');
    exit();
  }
  $error = false;
  $success = false;
  $username = @$_POST['username'];
  $password = @$_POST['password'];
  $remember = @$_POST['remember'];
  if($username&&$password){
    if(array_search(array($username,$password),$_ADMIN)){
      $_SESSION['username'] = $username;
      $_SESSION['login'] = base64_encode(md5($username).session_id());
      $success = true;
    } else {
      $error = true;
    }
    if($remember){
      setcookie('rememberUsername', $username, time() + (86400 * 30 * 30), "/");
    }
  }
?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <?php
              if($error){
            ?>
              <div class="alert alert-danger">
                <strong>Login Fail!</strong> Please check Username and Password.
              </div>
            <?php
              }
              if($success){
            ?>
            <div class="row" style="height:45vh;">
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="alert alert-success">
                  <strong>Login success!</strong> Please wait or <a href="javascript:void(0);" onclick="window.location.reload(1);">click here</a>.
                </div>
              </div>
            </div>
                <script>
                  self.setTimeout(function(){window.location.reload(1);},3000);
                </script>
            <?php
              } else {
             ?>
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="username" type="text"<?php echo @$_COOKIE['rememberUsername']?' value="'.$_COOKIE['rememberUsername'].'"':' autofocus';?>>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value=""<?php echo @$_COOKIE['rememberUsername']?' autofocus':'';?>>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me"<?php echo @$_COOKIE['rememberUsername']?' checked':'';?>>Remember Me
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" class="btn btn-lg btn-success btn-block" value="Login">
                        </fieldset>
                    </form>
                </div>
            </div>
            <?php
              }
            ?>
        </div>
    </div>
</div>
