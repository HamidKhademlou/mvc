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

    /**
     * insert data to database
     *
     * @param string $tablename
     * @param array $data
     * @param int $condition
     * @return void
     */
    public function insert($tablename, $data, $condition = null)
    {
        $con = $this->con;
        $keys = "";
        $values = "";
        foreach ($data as $key => $value) {
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

        $con->prepare($sql)->execute();
        // $con->exec($sql);
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
        $con->exec($sql);
    }

    public function delete($tablename, $id)
    {
        $con = $this->con;
        $sql = "DELETE FROM $tablename WHERE id=$id";
        $con->exec($sql);
    }

    /**
     * select data from database
     *
     * @param string $tablename
     * @param string $fields
     * @param string $condition
     * @param integer $flag
     * @return array
     */
    public function select($tablename, $fields = "*", $condition, $flag = 0)
    {
        $con = $this->con;
        if ($condition) {
            $sql = "SELECT $fields FROM $tablename WHERE $condition";
        } else {
            $sql = "SELECT $fields FROM $tablename";
        }
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
