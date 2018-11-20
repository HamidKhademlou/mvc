<?php
class Register_model extends Model
{
    private $flagconnection = null;
    public function __construct($servername = db_Servername, $usernamee = db_username, $passwordd = db_password, $dbname = db_Databasename)
    {
        $this->flagconnection = parent::__construct();
    }
    public function search($read)
    {
        $rows = $this->login('user', '*', "username = '$read->username' and password = '$read->password'", 1);
        return $rows;
    }
    // public function test_input_handler($data)
    // {
    //     $data = $this->test_input($data);
    //     return $data;
    // }
    public function notrep_handler($field, $data)
    {
        $data = $this->notrep($field, $data);
        return $data;
    }
}