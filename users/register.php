<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link href="assets/css/register.css" rel='stylesheet' type='text/css' />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="application/x-javascript">
  addEventListener("load", function() {
    setTimeout(hideURLbar, 0);
  }, false);

  function hideURLbar() {
    window.scrollTo(0, 1);
  }
  </script>
  <!--webfonts-->
  <link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
  <!--//webfonts-->
</head>

<body>
  <div class="main">
<!--     <div class="social-icons">
      <div class="col_1_of_f span_1_of_f">
        <a href="#">
          <ul class='facebook'>
            <i class="fb"> </i>
            <li>Connect with Facebook</li>
            <div class='clear'> </div>
          </ul>
        </a>
      </div>
      <div class="col_1_of_f span_1_of_f">
        <a href="#">
          <ul class='twitter'>
            <i class="tw"> </i>
            <li>Connect with Twitter</li>
            <div class='clear'> </div>
          </ul>
        </a>
      </div>
      <div class="clear"> </div>
    </div> -->
    <h2>Signup with Ivertise Africa</h2>
<?php
require_once 'core/init.php';

//var_dump(Token::check(Input::get('token')));

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        //echo "I have been run <br>";
        //echo Input::get('username');
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            //NB:Fiels matches field names in DB
            'username' => array(
                'required' => true,
                'min' => 2,
                'max' => 20,
                //table name to check if value already exists
                'unique' => 'users'
                ),
            'email' => array(
                'required' => true,
                'unique' => 'users'
                ),
            'password' => array(
                'required' => true,
                'min' => 6
                ),
            'password_again' => array(
                'required' => true,
                'matches' => 'password'
                ),
            'name' => array(
                'required' => true,
                'min' => 2,
                'max' => 50
                )
            ));
        if ($validation->passed()) {
            $user = new User();
            $salt = Hash::salt(32);// Db is 32 length
            // die();
            try{
                //DB names
                $user->create(array(
                        'username' => Input::get('username'),
                        'email' => Input::get('email'),
                        'password' => Hash::make(Input::get('password'), $salt),
                        'salt' => $salt,
                        'name' => Input::get('name'),
                        'joined' => date('Y-m-d H:i:s'),
                        'group' => 1
                    ));
                Session::flash('home', 'You have been registered and can now log in');
               Redirect::to('index.php');
            }catch(Exception $e){
                die($e->getMessage());
                //Alternative is rediect user to a failure page
            }
            //echo "Passed!";
            // Session::flash('success', 'You  have registered succefully!');

        }else{
            //State Errors
            foreach($validation->errors() as $error){
                echo $error, '<br>';
                //echo Input::get('username');
            };
        }
    }
}
?>
    <form method="post" action="">
      <div class="lable">
        <div class="col_1_of_2 span_1_of_2">
          <input type="text" class="text" name="name" placeholder="Your fullname" value="<?php echo escape(Input::get('name'));?>" id="active">
        </div>
        <div class="col_1_of_2 span_1_of_2">
          <input type="text" class="text" name="username" placeholder="pick username" value="<?php echo escape(Input::get('username'));?>">
        </div>
        <div class="clear"> </div>
      </div>
      <div class="lable-2">
        <input type="text" class="text" name="email" placeholder="Email Address" value="<?php echo escape(Input::get('email'));?>" >
        <input type="password" name="password" class="text" placeholder="New Password " value="<?php echo escape(Input::get('password'));?>" >
        <input type="password" name="password_again" class="text" placeholder="Password Again" value="<?php echo escape(Input::get('password_again'));?>" >
        <input type="hidden" name="token" value="<?php echo Token::generate();?>">
      </div>
      <h3>By creating an account, you agree to our <span class="term"><a href="#">Terms & Conditions</a></span></h3>
      <div class="submit">
        <input type="submit" onclick="myFunction()" value="Create account">
      </div>
      <div class="clear"> </div>
    </form>
    <!-----//end-main---->
  </div>
  <!-----start-copyright---->
  <div class="copy-right">
    <p>Design by <a href="http://ccoretechnologies.com">CloudCore Technologies</a></p>
  </div>
  <!-----//end-copyright---->
</body>

</html>
