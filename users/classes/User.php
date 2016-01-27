<?php
/**
*
*/
class User {
    private $_db,
            $_data,
            $_isLoggedIn,
            $_cookieName,
            $_sessionName;


    function __construct($user = null) {
        $this->_db = DB::getInstance();
        $this->_sessionName = Config::get('session/session_name');
        $this->_cookieName = Config::get('remember/cookie_name');
        if (!$user) {
            if (Session::exists($this->_sessionName)) {
                $user = Session::get($this->_sessionName);
                if ($this->find($user)) {
                    $this->_isLoggedIn = true;
                } else {
                    //Process Logout
                }
            }
        } else{
            $this->find($user);
        }
    }
    public function update($fields = array(), $id = null){
        if (!$id && $this->isLoggedIn()) {
            $id = $this->data()->id;
        }
        if(!$this->_db->update('users', $id, $fields)){
            throw new Exception("<p class='alert alert-danger'>There was a problem updating</p>");

        }
    }
    public function create($fields = array()){
        if (!$this->_db->insert('users', $fields)) {
            throw new Exception("<p class='alert alert-danger'>There was a problem creating this user account</p>");
        }
    }
    public function find($user = null){
        if ($user) {
            //Change can be done on Validate::stdClass
            $field = (is_numeric($user)) ? 'id' : 'username';
            $data = $this->_db->get('users', array($field, '=', $user));
            if ($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }
    public function login($username = null, $password = null, $remember = false){
        //print_r($this->_data);
        if (!$username && !$password && $this->exists()) {
            //Log User In by setting a session
            Session::put($this->_sessionName, $this->data()->id);

        }else{
            $user = $this->find($username);
            if ($user) {
                if ($this->data()->password === Hash::make($password, $this->data()->salt)) {
                    Session::put($this->_sessionName, $this->data()->id);
                    //If  user has clicked 'remember', this code below iis going to be run
                    if ($remember) {
                        $hash = Hash::unique();
                        $hashCheck = $this->_db->get('users_session', array('user_id', '=', $this->data()->id));
                        if (!$hashCheck->count()) {
                            $this->_db->insert('users_session',array(
                                'user_id' => $this->data()->id,
                                'hash' => $hash
                                ));
                        } else {
                            $hash = $hashCheck->first()->hash;
                        }
                        Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
                    }
                    return true;
                }
            }
        }
        return false;
    }
    public function hasPermission($key){
        $group = $this->_db->get('groups', array('id', '=', $this->data()->group));
       //print_r($group->first());
        if ($group->count()) {
            $permissions = json_decode($group->first()->permissions, true);
            //print_r($permissions);
            if ($permissions[$key] == true) {
                return true;
            }
        }
        return false;
    }
    //Checks if username andn password has't been defined then sets true
    public function exists(){
        return (!empty($this->_data)) ? true : false;
    }
    public function logout(){
        $this->_db->delete('users_session', array('user_id', '=', $this->data()->id));
        Session::delete($this->_sessionName);
        Cookie::delete($this->_cookieName);
    }
    //To refer the private $_data property
    public function data(){
        return $this->_data;
    }

    public function isLoggedIn(){
        return $this->_isLoggedIn;
    }
}