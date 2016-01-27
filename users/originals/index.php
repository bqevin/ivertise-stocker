<?php

/*
*Author: Kevin Barasa
*Phone : +254724778017
*Email : kevin.barasa001@gmail.com
*/

//Error display set to 1 for debugging. NB: Remember to disable
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'core/init.php';
//$user = DB::getInstance()->query("SELECT username FROM users WHERE username =?", array("Kevin"));
//$user = DB::getInstance()->get('users', array('username','=','Kevin'));
$user = DB::getInstance()->query("SELECT * FROM users");
if (!$user->count()) {
    echo "No User(s)!";
}else{
    //echo $user->first()->username;
    foreach ($user->results() as $user) {
        echo $user->username, '<br>', $user->email,'<br>',  $user->name,'<br><br>';
    }
}

// if (Session::exists('success')) {
//     echo "<p>";
//     echo Session::flash('success');
//     echo "</p>";
// }
if (Session::exists('home')) {
    echo "<p>";
    echo Session::flash('home');
    echo "</p>";
}
$user = new User;
if ($user->isLoggedIn()) {
    //echo "Logged In";
?>
    <p>Hello
        <a href="display.php?user=<?php echo $user->data()->username;?>"><?php echo $user->data()->username;?></a>
    </p>
    <ul>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="update.php">Update Info</a></li>
         <li><a href="changepassword.php">Change Password</a></li>
    </ul>
<?php
if ($user->hasPermission('admin')) {
    echo "<p> You are an admin</p>";
}
} else{
    echo "<p> You need to <a href='ingia.php'>log in</a> or <a href='register.php'>Register</p>";
}
// $user->insert('users',array(
//     'username' => 'John',
//     'password' => 'password',
//     'salt' => 'salt'
//     ));

// $userUpdate = DB::getInstance()->update('users',4,array(
//     'password' => 'newPassword',
//     'name' => 'John Paul Karijo'
//     ));