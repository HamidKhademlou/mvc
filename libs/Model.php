<?php
class Model
{
    public function __construct($servername = db_Servername, $usernamee = db_username, $passwordd = db_password, $dbname = db_Databasename)
    {
        try {
            $this->con = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $usernamee, $passwordd);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "connected successfully";
        } catch (PDOException $e) {
            echo "connection failed<br>" . $e->getMessage();
        }
    }
    public function insert($tablename, $read, $condition = null)
    {
        $con = $this->con;
        $keys = "";
        $values = "";
        foreach ($read as $key => $value) {
            $keys .= $key . " , ";
            $values .= "'" . $value . "'" . " , ";
        }
        $keys = rtrim($keys, ', ');
        $values = rtrim($values, ', ');
        if ($tablename == "kala") {
            $sql = "INSERT INTO $tablename ( id,$keys) VALUES ('',$values)";
        } else {
            $sql = "INSERT INTO $tablename ( id,$keys,typeuser) VALUES ('',$values,'notactive')";
        }

        if ($condition) {
            $sql = "INSERT INTO $tablename ( id,$keys,typeuser) VALUES ('',$values,'notactive') WHERE $condition";
        }
        $con->exec($sql);
        // $last_id = $con->lastInsertId();
    }
    public function update($tablename, $read, $condition)
    {
        $sql = "UPDATE $tablename SET ";
        $con = $this->con;
        foreach ($read as $key => $value) {
            $sql .= $key . "=" . "'" . $value . "'" . ", ";
        }
        $sql = rtrim($sql, ', ');
        $sql .= " WHERE " . $condition;
        // var_dump($sql);die;
        $con->exec($sql);
    }

    public function delete($tablename, $id)
    {
        $con = $this->con;
        $sql = "DELETE FROM $tablename WHERE id=$id";
        $con->exec($sql);
    }

    public function select($tablename, $fields = "*", $condition, $flag = 0)
    {
        $con = $this->con;
        $sql = "SELECT $fields FROM $tablename WHERE $condition";
        if ($condition == "") {
            $sql = "SELECT $fields FROM $tablename";
        }
        // var_dump($sql);
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        if ($flag == 0) {
            return ($stmt->fetchAll(PDO::FETCH_ASSOC));
        } elseif ($flag == 1) {
            return ($stmt->fetch(PDO::FETCH_ASSOC));
        }
    }

    public function notrep($field, $x, $tablename = "user")
    {
        $con = $this->con;
        $sql = "SELECT $field FROM $tablename WHERE $field='$x'";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!empty($result)) {
            $duperr = $x . " already exists!!!";
            return $duperr;
        }
    }
}
