<?php
class api extends Controller
{
    public $mymodel = null;
    public function __construct($model)
    {
        parent::__construct();
        $this->mymodel = $model;
    }

    public function customers($id)
    {
        if ($id == null) {
            $alldata = $this->mymodel->select('user', '*', "", 0);
            $data=json_encode($alldata);
            header('Content-type: text/xml');
            echo '<alldata>';
            foreach ($alldata as $index => $data) {
                if (is_array($data)) {
                    foreach ($data as $key => $value) {
                        echo '<', $key, '>';
                        echo $value . " ";
                        if (is_array($value)) {
                            foreach ($value as $tag => $val) {
                                echo '<', $tag, '>', htmlentities($val), '</', $tag, '>';
                            }
                        }
                        echo '</', $key, '>';
                    }
                }
            }
            echo '</alldata>';
        }
    }
}