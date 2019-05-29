<?php
class Market_model extends Model
{
    private $flagconnection = null;
    public function __construct($servername = db_Servername, $usernamee = db_username, $passwordd = db_password, $dbname = db_Databasename)
    {
        $this->flagconnection = parent::__construct();
        // $this->searchuser('hamid');
    }

    public function notrep_handler($field, $data, $tablename)
    {
        $data = $this->notrep($field, $data, $tablename);
        return $data;
    }
}

