<?php
class Login_model extends Model
{
    private $flagconnection = null;
    public function __construct($servername = db_Servername, $usernamee = db_username, $passwordd = db_password, $dbname = db_Databasename)
    {
        $this->flagconnection = parent::__construct();
        // $this->searchuser('hamid');
    }
    public function search($read)
    {
        // $rows = $this->login('user', '*', "username = '$read->username' and password = '$read->password'", 1);
        // return $rows;
    }
}