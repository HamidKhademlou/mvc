<?php 
class Site_model extends Model
{
    private $flagConnection = null;
    public function __construct()
    {
        $this->flagConnection = parent::__construct();
    }
    public function SearchUser($username)
    {
        return $this->select('users', '*', "username = $username", 1);
    }
}