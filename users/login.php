<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html>

<head>
  <title>Ivertise Africa | Connecting brands with artists</title>
  <!-- for-mobile-apps -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Photography, Stock Images" />
  <script type="application/x-javascript">
  addEventListener("load", function() {
    setTimeout(hideURLbar, 0);
  }, false);

  function hideURLbar() {
    window.scrollTo(0, 1);
  }
  </script>
  <!-- //for-mobile-apps -->
  <link href="../assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
  <link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
</head>

<body>
  <!-- main -->
  <div class="main">
    <h1>Ivertise Africa | Connecting brands with artists</h1>
    <div class="input_form">
      <?php
require_once 'core/init.php';

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array('required' => true),
            'password' => array('required' => true)
            ));
        if ($validation->passed()) {
            //login User
            $user = new User();
            $remember = (Input::get('remember') === 'on') ? true : false;
            $login = $user->login(Input::get('username'), Input::get('password'), $remember);
            if ($login) {
               //echo "Success";
                Redirect::to('index.php');
            } else {
                echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Sorry!</strong> Wrong login details.</div>';
            }
        } else {
            foreach ($validation->errors() as $error) {
                echo $error, '<br>';
            }
        }
    }
}

?>
        <form method="post" action="">
          <input type="text" name="username" value="User Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User Name';}" required="">
          <input type="password" name="password" placeholder="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
    </div>
    <div class="ckeck-bg">
      <div class="checkbox-form">
        <div class="check-left">
          <div class="check">
            <label class="checkbox">
              <input type="checkbox" name="remember" checked=""><i> </i>Remember my Password</label>
          </div>
        </div>
        <div class="check-right">
          <input type="hidden" name="token" value="<?php echo Token::generate();?>">
          <input type="submit" name="" value="Login">
          </form>
        </div>
        <div class="clearfix"> </div>
      </div>
    </div>
    <p>Don't have an account? <a href="register.php">Register here</a></p>
  </div>
  <div class="footer">
    <p>&copy 2016 Ivertise Africa. All rights reserved | Design by <a target="_blank" href="http://ccoretechnologies.com">CloudCore Technologies</a></p>
  </div>
  <!-- //main -->
  <script src="../assets/js/jquery.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>
