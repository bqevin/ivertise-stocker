<?php
require_once 'core/init.php';
//Error display set to 1 for debugging. NB:  Remember to disable
error_reporting(E_ALL);
ini_set('display_errors', 1);

$user = new User();
if (!$user->isLoggedIn()) {
    Redirect::to('index.php');
}

//CSRF proofig
if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation =  $validate->check($_POST, array(
            'name' => array(
                'required' => true,
                'min' => 2,
                'max' => 50
                )
            ));

        if ($validation->passed()) {
            //Update
            try{
                $user->update(array(
                    'name' => Input::get('name')));
                Session::flash('home', 'Your details have been updated');
                Redirect::to('index.php');n
            } catch(Exception $e){
                die($e->getMessage());
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
    <label for="name"> Name</label>
    <input type="text" value="<?php echo escape($user->data()->name);?>" name="name" placeholder="" autocomplete="off">
</div>
<br>
<input type="submit" name="" value="Update">
<input type="hidden" name="token" value="<?php echo Token::generate();?>">
</form>