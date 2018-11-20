<?php 
class site extends Controller
{
  public $mymodel;
  public function __construct($model)
  {
    parent::__construct();
    $this->mymodel = $model;
    // $this->check_access();
    $this->ViewObject->mycss = array();
    $this->ViewObject->myjs = array('site.js','time.js');
  }

  public function index()
  {
    $myuser = $this->mymodel->select('students', '*', "", 0);
    $this->ViewObject->render(__class__, 'index', $myuser, 0);
  }

  public function getcsv()
  {
    $myuser = $this->mymodel->select('students', '*', "", 0);
    $myfile = fopen("student.csv", "a+") or die("Unable to open file!");
    fwrite($myfile, "id, firstname, lastname,");
    fwrite($myfile, "\r\n");
    fclose($myfile);
    foreach ($myuser as $key => $value) {
      $myfile = fopen("student.csv", "a+") or die("Unable to open file!");
      foreach ($value as $value2) {
                // $value = test_input($value);
        fwrite($myfile, $value2 . ", ");
      }
      fwrite($myfile, "\r\n");
      fclose($myfile);
    }

    $file = file_get_contents('student.csv');
    $size = strlen($file);

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=student.csv');
    header('Content-Transfer-Encoding: binary');
    header('Connection: Keep-Alive');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . $size);

    echo $file;
  }

  public function getusers()
  {
    $alldata = $this->mymodel->select('user', '*', "", 0);
    echo json_encode($alldata);
    // get
    // echo json_encode(array('name'=>'ali'));
    // post
    // echo json_encode($_POST);
  }

  public function search()
  {
    $search = $_GET["search"];
    $alldata = $this->mymodel->select('kala', '*', "name like '%$search%'", 0);
  }
}
