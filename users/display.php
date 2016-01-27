<?php
require_once 'core/init.php';
if (!$username = Input::get('user')) {
    Redirect::to('index.php');
} else{
    //echo $username;
    $user = new User($username);
    //var_dump($user);
    if (!$user->exists()) {
        Redirect::to(404);
    } else {
        $data = $user->data();
    }
    ?>
    <h3>User Profile</h3>
    <p>Username: <?php echo escape($data->username);?></p>
    <p>Full name: <?php echo escape($data->name);?></p>
    <p>Joined: <?php echo escape($data->joined);?></p>
<?php
}