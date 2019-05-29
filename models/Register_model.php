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

    /**
     * check for repetitive data
     */
    public function notrep_handler(string $field, $data)
    {
        $data = $this->notrep($field, $data);
        return $data;
    }
}
