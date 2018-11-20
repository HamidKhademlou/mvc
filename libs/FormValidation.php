<?php

class FormValidation
{
    //Security validation for inputs:
    public static function securityTest_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = strip_tags($data);
        $data = filter_var($data, FILTER_SANITIZE_STRING);
        $data = htmlspecialchars($data);
        $data = preg_replace('/\s+/', '', $data);
        return $data;
    }

    //Security validation for ckeditor input:
    public static function securityTest_editor($data)
    {
        $data = stripslashes($data);
        $data = strip_tags($data, "<p><strong><em><s><ol><li><ul><blockquote><h1><h2><h3><h4><h5><h6><div><span><big><small><tt><code><samp><var><del><ins><cite><q><pre><a><table><caption><thead><tr><th><tbody><td><hr><img>");
        return $data;
    }
    public static function avoid_tags($input)
    {
        $Err = null;
        if (preg_match('/<\w/', $input)) {
            $Err = "DO NOT USE HTML TAGS! ";  // and some error too
        }
        return $Err;
    }

    public static function input_required($textName, $fildName, $required = true)
    {
        $Err = null;
        if (empty($textName) && $required == true) {
            $Err = $fildName . " is required. ";
        }
        return $Err;
    }

    public static function max_length($input, $maxLength)
    {
        $Err = null;
        if (strlen($input) > $maxLength) {
            $Err = "/Enter less than " . $maxLength . " characters. ";
        }
        return $Err;
    }

    public static function input_name($name, $required = true)
    {
        $nameErr = null;
        if (empty($name) && $required == true) {
            $nameErr = "Name is required. ";
        } else {
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed. ";
            }
        }
        return $nameErr;
    }

    public static function input_userName($userName, $required = true)
    {
        $userNameErr = null;
        if (empty($userName) && $required == true) {
            $userNameErr = "User Name is required. ";
        } else {
            // check if User Name only contains letters and Numbers
            if (!preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
                $userNameErr = "Only letters and Numbers allowed. ";
            }
        }
        return $userNameErr;
    }

    public static function input_password($password, $required = true)
    {
        $passwordErr = null;
        if (empty($password) && $required == true) {
            $passwordErr = "Password is required. ";
        } else {
            // check if password only contains letters, Numbers and some special characters (!@#$%)
            if (!preg_match("/^[a-zA-Z0-9!@#$%]*$/", $password)) {
                $passwordErr = "Only letters, Numbers and ! @ # $ % allowed. ";
            }
        }
        return $passwordErr;
    }

    public static function input_email($email, $required = true)
    {
        $emailErr = null;
        if (empty($email) && $required == true) {
            $emailErr = "Email is required. ";
        } else {
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format! ";
            }
        }
        return $emailErr;
    }

    public static function input_website($website, $required = true)
    {
        $websiteErr = null;
        if (empty($website) && $required == true) {
            $website = "Website is required. ";
        } else {
            // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
                $websiteErr = "Invalid URL! ";
            }
        }
        return $websiteErr;
    }

    public static function input_gender($gender, $required = true, $valueArray = array("male", "female", "other"))
    {
        $genderErr = null;
        if (empty($gender) && $required == true) {
            $genderErr = "Gender is required. ";
        } else {
            if (!in_array($gender, $valueArray, true)) {
                $genderErr = "Invalid Gender! ";
            }
        }
        return $genderErr;
    }

    public static function input_birthdate($birthdate, $required = true)
    {
        $birthdateErr = null;
        if (empty($birthdate) && $required == true) {
            $birthdateErr = "Date of Birthday is required. ";
        } else {
            if (self::validateDate($birthdate) == false) {
                $birthdateErr = "invalid date format! ";
            }
        }
        return $birthdateErr;
    }

    public static function input_image($image, $imageFolder, $inputName, $maxlengh, $uploadOk = 'yes', $required = true)
    {
        $imageErr = null;
        if (empty($image) && $required == true) {
            $imageErr = "Image is required. ";
        } else {
            $imageErr = self::uploadImage($imageFolder, $inputName, $maxlengh, $uploadOk);
        }
        return $imageErr;
    }

    public static function input_price($price, $required = true)
    {
        $priceErr = null;
        if (empty($price) && $required == true) {
            $priceErr = "Price is required. ";
        } else {
            $string = explode('.', $price);
            if (!ctype_digit($string[0])) {
                $priceErr = "invalid price! ";
            }
            if (isset($string[1])) {
                if (!ctype_digit($string[1])) {
                    $priceErr = "invalid price! ";
                }
            }
        }
        return $priceErr;
    }

    public static function fix_price($price)
    {
        $string = explode('.', $price);
        $string[0] = ltrim($string[0], '0');
        if (isset($string[1])) {
            $string[1] = rtrim($string[1], '0');
            $out = $string[0] . "." . $string[1];
        } else {
            $out = $string[0];
        }
        return $out;
    }

    public static function input_intNumber($intNumber, $fildName, $required = true)
    {
        $intNumberErr = null;
        if (empty($intNumber) && $required == true) {
            $intNumberErr = $fildName . " is required. ";
        } else {
            if (!ctype_digit($intNumber)) {
                $intNumberErr = "invalid integer number! ";
            }
        }
        return $intNumberErr;
    }

    public static function fix_intNumber($intNumber)
    {
        $intNumber = ltrim($intNumber, '0');
        return $intNumber;
    }

    public static function input_file($fileName, $required = true)
    {
        $fileErr = null;
        if (empty($fileName) && $required == true) {
            $fileErr = "Your Image is required. ";
        }
        return $fileErr;
    }

    //validate date:
    public static function validateDate($date, $format = 'YYYY-MM-DD')
    {
        switch ($format) {
            // case 'YYYY/MM/DD':
            case 'YYYY-MM-DD':
                list($y, $m, $d) = preg_split('/[-\.\/ ]/', $date);
                break;

            default:
                return false;
        }
        return @checkdate($m, $d, $y);
    }

    //Security validation function for uploading an image:
    public static function uploadImage($target_dir, $inputName, $maxlengh, $newname)
    {
        // var_dump($inputName);die;
        $target_file = $target_dir . basename($_FILES["$inputName"]["name"]);
        $uploadOk = 1;
        $imageErr = null;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["$inputName"]["tmp_name"]);
            if ($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $imageErr = "File is not an image." . "<br>";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $imageErr .= "Sorry, file already exists." . "<br>";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["$inputName"]["size"] > $maxlengh) {
            $imageErr .= "Sorry, your file is too large." . "<br>";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            $imageErr .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed." . "<br>";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $imageErr .= "Sorry, your file was not uploaded." . "<br>";
            // if everything is ok, try to upload file
        } else  {
            if (move_uploaded_file($_FILES["$inputName"]["tmp_name"], $target_file)) {
                //echo "The file ". basename( $_FILES["$inputName"]["name"]). " has been uploaded.";
                $oldname = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                rename($oldname, $newname);
            } else {
                $imageErr .= "Sorry, there was an error uploading your file. ";
            }
        }
        return $imageErr;
    }

    //Checking to not register again with file or database:
    //Check with file:
    public static function notRepeFile($fileName, $fildName, $fildTitle, $separator1, $separator2, $arrayLocation)
    {
        $myfile = fopen($fileName, "a+") or die("Unable to open file!");
        $content = file_get_contents($fileName);
        $array1 = explode($separator1, $content);
        $len = count($array1);
        if ($array1[0] != "") {
            foreach ($array1 as $value) {
                $array2 = explode($separator2, $value);
                if (array_key_exists("2", $array2)) {
                    if ($array2[$arrayLocation] == $_POST[$fildName]) {
                        $errorName = "This " . $fildTitle . " already exists. ";
                        break;
                    } else {
                        $errorName = "";
                    }
                }
                $errorName = "";
            }
        } else {
            $errorName = "";
        }
        fclose($myfile);
        return $errorName;
    }//END Check with file.

    //Check with database:
    public static function notRepeDatabase($tbName, $fildName, $condition, $modelObject)
    {
        $userinfo = $modelObject->search("*", $tbName, $condition, true);
        if (!empty($userinfo)) {
            $errorName = "This " . $fildName . " already exists. ";
        } else {
            $errorName = null;
        }
        return $errorName;
    }//END heck with database.
}