<?php
/*
*Author: Kevin Barasa
*Phone : +254724778017
*Email : kevin.barasa001@gmail.com
*/

//PDO with Singularity Pattern
class DB{
    private static $_instance = null;
    private $_pdo,
            $_query,
            $_error =false,
            $_results,
            $_count =0;
    //Constructor Method to initiate PDO connection to the DB
    private function __construct(){
        try{
            $this->_pdo = new PDO('mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/db'),Config::get('mysql/username'),Config::get('mysql/password'));
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }
    //Method Checks if our DB is instantiated to run new instance else keeps the existing copy. DRY practice
    public static function getInstance(){
        if (!isset(self::$_instance)) {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }
    //First Query Method i.e query(ELECT username FROM users WHERE username =?", array("Kevin"))
    public function query($sql, $params = array()){
        //Reset Error to False first so as to catch realtime errors for the function
        $this->_error = false;
        //Check if Query is valid
        if ($this->_query = $this->_pdo->prepare($sql)) {
            $x = 1;
            //Check Available Parameters + Position i.e $x
            if (count($params)) {
                foreach ($params as $param) {
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }
            //Execute the query anyway whether there is Parameters or no
            if ($this->_query->execute()){
                //echo "Success!";
                //Data is fetched as Objects which can be pointed out by query()
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            } else{
                $this->_error = true;
            }
        }
        return $this;
    }
//To make get() & delete() easy to implement
    public function action($action, $table, $where = array()){
        //Strict on input parameters to be 3
        if (count($where)===3) {
            //Define allowed operators
            $operators = array('=','>','<','>=','<=');
            //SQL Query
            $field = $where[0];
            //Operator Type
            $operator = $where[1];
            //Value compared to
            $value = $where[2];
            if (in_array($operator, $operators)) {
                //$sql = "SELECT * FROM users WHERE username = 'Kevin'";
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator}?";
                if (!($this->query($sql,array($value))->error())) {
                    return $this;
                }
            }
        }
        return false;
    }

    //Second Query function. More efficient i.e get('username','=','Kevin')
    public function get($table,$where){
        return $this->action('SELECT *' , $table, $where);
    }

    public function delete($table,$where){
        return $this->action('DELETE', $table, $where);
    }
    //Insert Values to DB
    public function insert($table, $fields=array()){
        //Count logics unnecessary unless you are strict with developers
        if (count($fields)) {
            $keys = array_keys($fields);
            $values = '';
            $x = 1;
            foreach ($fields as $field ) {
                $values .= "?";
                if ($x < count($fields)) {
                    $values .= ', ';
                }
                $x++;
            }
            //die($values);
            $sql = "INSERT INTO {$table}(`".implode('`,`', $keys)."` ) VALUES ({$values})";
            if (!$this->query($sql, $fields)->error()) {
                return true;
            }
            //echo $sql;
        }
        return false;
    }
    //Updating values on DB
    public function update($table, $id,$fields){
        $set = '';
        $x = 1;
        // $sql = "UPDATE users SET password = 'newPassword' WHERE id = 4";
        foreach ($fields as $name => $value) {
            $set .= "{$name} = ?";
            if ($x < count($fields)) {
                $set .= ', ';
            }
            $x++;
        }
        //die($set);
        $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";
        if (!$this->query($sql, $fields)->error()) {
            return true;
        }
        //echo $sql;
        return false;
    }
    //Displaying DB results
    public function results(){
        return $this->_results;
    }
    //Fetch just the first result
    public function first(){
        return $this->results()[0];
    }
    //Error Function
    public function error(){
        return $this->_error;
    }
    //count method
    public function count(){
        return $this->_count;
    }

}

/*DB::stdClass Complete as at 23/01/2015 03:54:05 AM
*Signed : Kevin Barasa(Author)
*/
