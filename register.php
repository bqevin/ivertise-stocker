<?php require_once 'templates/header.php'; ?>

</head>
<body>
	<div class="header">
      <div class="container">
  	     <div class="logo">
			<h1><a href="./index.php"><img src="assets/img/logo.png" alt=""></a></h1>
		 </div>
		 <div class="top_right">
         <ul>
			<li><a href="#">Register</a></li>|
			<li class="login" >
				 <div id="loginContainer"><a href="#" id="loginButton"><span>Login</span></a>
					  <div id="loginBox">
						  <form id="loginForm">
			                <fieldset id="body">
			                	<fieldset>
			                          <label for="email">Email Address</label>
			                          <input type="text" name="email" id="email">
			                    </fieldset>
			                    <fieldset>
			                            <label for="password">Password</label>
			                            <input type="password" name="password" id="password">
			                     </fieldset>
			                    <input type="submit" id="login" value="Sign in">
			                	<label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>
			            	</fieldset>
			                 <span><a href="#">Forgot your password?</a></span>
						   </form>
				        </div>
			      </div>
			  </li>
		   </ul>
	     </div>
		 <div class="clearfix"></div>
		</div>
	</div>
	<div class="register">
		<div class="container">
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
                Session::flash('home', '<strong> Success! </strong> You have been registered and can now log in.');
               Redirect::to('register.php');
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
// Echo Success
if (Session::exists('home')) {
    echo "<p style='color: #009000; font-size: inherit; padding: 0 0 40px;'>";
    echo Session::flash('home');
    echo "</p>";
}

?>
		   <form action="" method="post">
				 <div class="register-top-grid">
					<h1>PERSONAL INFORMATION</h1>
					 <div>
						<span>First Name<label>*</label></span>
						<input name="name" value="<?php echo escape(Input::get('name'));?>" type="text">
					 </div>
					 <div>
						<span>Username<label>*</label></span>
						<input type="text"  name="username" value="<?php echo escape(Input::get('username'));?>">
					 </div>
					 <div>
						 <span>Email Address<label>*</label></span>
						 <input value="<?php echo escape(Input::get('email'));?>" type="email" name="email">
					 </div>
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
					   </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h4>LOGIN INFORMATION</h4>
							 <div>
								<span>Password<label>*</label></span>
								<input type="password" name="password" value="<?php echo escape(Input::get('password'));?>">
							 </div>
							 <div>
								<span>Confirm Password<label>*</label></span>
								<input type="password" name="password_again" value="<?php echo escape(Input::get('password'));?>">
                                <input type="hidden" name="token" value="<?php echo Token::generate();?>">
							 </div>
							 <div class="clearfix"> </div>
					 </div>

				<div class="clearfix"> </div>
				<div class="register-but">

					   <input type="submit" value="submit">
					   <div class="clearfix"> </div>
				   </form>
				</div>
		   </div>
	</div>
<?php require_once 'templates/footer.php'; ?>
</body>
</html>