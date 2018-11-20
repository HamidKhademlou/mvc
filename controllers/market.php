<?php
class market extends Controller
{
    public $mymodel = null;
    // calling model
    public function __construct($model)
    {
        parent::__construct();
        $this->mymodel = $model;
        $this->ViewObject->myjs = array('search.js','time.js');
    }

    public function index()
    {
        $alldata = $this->mymodel->select('kala', '*', "", 0);
        $this->ViewObject->render(__class__, 'index', $alldata);
    }
    
    public function add()
    {
        if (isset($_POST["submit"])) {
            $name = $_POST["name"];
            $nameerr = $this->mymodel->notrep_handler("name", $name, "kala");
            $price = $_POST["price"];
            if (empty($_POST["name"]) or empty($_POST["price"])) {
                header("Location: " . URL . "/market/add/" . "?error=1&&name=$name&&price=$price");
            } else {
                if (!empty($nameerr)) {
                    header("Location: " . URL . "/market/add/" . "?error=2");
                } else {
                    $read = array();
                    $read["name"] = $name;
                    $read["price"] = $price;
                    $data = $this->mymodel->insert('kala', $read);
                    // *------------------------upload image-----------------------------
                    $newname = "C:/xampp/htdocs/hamid/mvc/views/market/pic/" . $read["name"] . ".jpg";
                    $uploding = FormValidation::uploadImage("C:/xampp/htdocs/hamid/mvc/views/market/pic/", "fileToUpload", "1000000",$newname);
                    if (!empty($uploding)){
                        header("Location: " . URL . "/market/add/" . "?uploaderror=$uploding");
                    }
                    // $target_file = "C:/xampp/htdocs/hamid/mvc/views/market/pic/" . basename($_FILES["fileToUpload"]["name"]);
                    // $uploadOk = 1;
                    // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    // // Check if image file is a actual image or fake image
                    // $check = getimagesize($_FILES['fileToUpload']['tmp_name']);
                    // if ($check !== false) {
                    //     // echo "File is an image - " . $check["mime"] . ".";
                    //     $uploadOk = 1;
                    // } else {
                    //     echo "File is not an image.";
                    //     $uploadOk = 0;
                    // }
                    // // Check if file already exists
                    // if (file_exists($target_file)) {
                    //     echo "Sorry, file already exists.";
                    //     $uploadOk = 0;
                    // }
                    // // Check file size
                    // if ($_FILES["fileToUpload"]["size"] > 1000000) {
                    //     echo "Sorry, your file is too large.";
                    //     $uploadOk = 0;
                    // }
                    // // Allow certain file formats
                    // if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    //     && $imageFileType != "gif") {
                    //     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    //     $uploadOk = 0;
                    // }
                    // // Check if $uploadOk is set to 0 by an error
                    // if ($uploadOk == 0) {
                    //     echo "Sorry, your file was not uploaded.";
                    // } else {
                    //     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    //         $oldname = "C:/xampp/htdocs/hamid/mvc/views/market/pic/" . basename($_FILES["fileToUpload"]["name"]);
                    //         rename($oldname, $newname);
                    //     } else {
                    //         echo "Sorry, there was an error uploading your file.";
                    //     }
                    // }
                }
            }
        }
        $alldata = $this->mymodel->select('kala', '*', "", 0);
        $this->ViewObject->render(__class__, 'add', $alldata);
    }
    public function delete()
    {
        $this->mymodel->delete('kala', $_GET['id']);
        unlink("C:/xampp/htdocs/hamid/mvc/views/market/pic/" . $_GET['name'] .".jpg");
        header("Location: " . URL . "/market/add/");
    }

    public function count()
    {
        if (!isset($_SESSION["count"])) {
            $_SESSION["count"] = 0;
            $_SESSION["items"] = null;
        }
        $items = rtrim($_SESSION["items"], "/");
        $items = explode("/", $items);
        if (count(array_keys($items, $_GET["id"])) > 0) {
        } else {
            $_SESSION["items"] = $_GET["id"] . "/" . $_SESSION["items"];
        }
        $items = rtrim($_SESSION["items"], "/");
        $items = explode("/", $items);
        $_SESSION["count"] = count($items);
        header("Location: " . URL . "/market/index/");
    }

    public function basket()
    {
        $condition = "";
        if (isset($_GET["id"])) {
            $_SESSION["items"] = str_replace($_GET['id'] . "/", null, $_SESSION["items"]);
        }
        $items = rtrim($_SESSION["items"], "/");
        $items = explode("/", $items);
        $_SESSION["count"] = count($items);
        if ($_SESSION["items"] == "") {
            $_SESSION["count"] = 0;
        }
        for ($i = 0; $i < $_SESSION["count"]; $i++) {
            $condition .= " id='$items[$i]' OR";
        }
        $condition = rtrim($condition, "OR");
        if ($_SESSION["count"] == 0) {
            header("Location: " . URL . "/market/index/");
        } else {
            $alldata = $this->mymodel->select('kala', '*', $condition, 0);
            $this->ViewObject->render(__class__, 'basket', $alldata);
        }
    }

    public function search()
    {
        $search = $_GET["search"];
        $alldata = $this->mymodel->select('kala', '*', "name like '%$search%' AND body like '%$search%'", 0);
        $this->ViewObject->render(__class__, 'index', $alldata);
    }
}