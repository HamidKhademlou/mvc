<?php
class math extends Controller
{
    public $mymodel = null;
    public function __construct($model)
    {
        parent::__construct();
        $this->mymodel = $model;
    }
    public function sum($x)
    {
        $ans = array("result" => null);
        foreach ($x as $key => $value) {
            $ans["result"] += $value;
        }
        $this->ViewObject->render(__class__, 'index', $ans,0);
    }
    public function mul($x)
    {
        $ans = array("result" => 1);
        foreach ($x as $key => $value) {
            $ans["result"] *= $value;
        }
        $this->ViewObject->render(__class__, 'index', $ans,0);
    }
}