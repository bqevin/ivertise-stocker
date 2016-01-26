<?php

require_once 'core/init.php';
//Error display set to 1 for debugging. NB: Remember to disable
error_reporting(E_ALL);
ini_set('display_errors', 1);

$user = new User();

if (!$user->isLoggedIn()) {
    Redirect::to('index.php');
}
if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'password_current' => array(
                'required' => true,
                'min' => 6
                ),
            'password_new' => array(
                'required' => true,
                'min' => 6
                ),
            'password_new_again' =>array(
                'required' => true,
                'min' => 6,
                'matches' => 'password_new'
                )
            ));
        if ($validation->passed()) {
            //Change of password
            if (Hash::make(Input::get('password_current'), $user->data()->salt) !== $user->data()->password) {
                echo "Your current password is wrong";
            } else {
                $salt = Hash::salt(32);
                $user->update(array(
                    'password' => Hash::make(Input::get('password_new')),
                    'salt' => $salt
                    ));
                Session::flash('home', 'Password was change sucessfully');
                Redirect::to('index.php');
            }
        } else {
            foreach ($validation->errors() as $error) {
                echo $error, '<br>';
            }
        }
    }
}
?>

<form action="" method="post" >
<div class="field">
    <label for="password_current"> Current Password</label>
    <input type="password" name="password_current" placeholder="" autocomplete="off">
</div>
<div class="field">
    <label for="password_new"> New Password</label>
    <input type="password" name="password_new" placeholder="" autocomplete="off">
</div>
<div class="field">
    <label for="password_new_again"> New Password Again</label>
    <input type="password" name="password_new_again" placeholder="" autocomplete="off">
</div>
<br>
<input type="hidden" name="token" value="<?php echo Token::generate();?>">
<input type="submit" name="" value="Change">
</form>