 <?php

class CRUD
{
    private $conn;

    public function __construct($hostname, $username, $password, $database)
    {
        $this->conn = new mysqli($hostname, $username, $password, $database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function create($table, $data)
    {
        $columns = implode(", ", array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";

        if ($this->conn->query($sql) === TRUE) {
            //return $this->conn->insert_id;
            return true;
        } else {
            return false;
        }
    }

    public function read($table, $condition = "")
    {
        $sql = "SELECT * FROM $table";
        if (!empty($condition)) {
            $sql .= " WHERE $condition";
        }

        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $rows = array();
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            return false;
        }
    }

    public function update($table, $data, $condition)
    {
        $setValues = "";
        foreach ($data as $key => $value) {
            $setValues .= "$key = '$value', ";
        }
        $setValues = rtrim($setValues, ", ");

        $sql = "UPDATE $table SET $setValues WHERE $condition";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($table, $condition)
    {
        $sql = "DELETE FROM $table WHERE $condition";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserBySSN($ssn)
    {
        $ssn = $this->conn->real_escape_string($ssn);
        $sql = "SELECT * FROM patients WHERE ssn = '$ssn' LIMIT 1";
        $result = $this->conn->query($sql);
    
        $rows = array();
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
    
        $sql = "SELECT * FROM doctors WHERE ssn = '$ssn' LIMIT 1";
        $result = $this->conn->query($sql);
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
    
        if (!empty($rows)) {
            return $rows;
        } else {
            return false;
        }
    }
    

    public function __destruct()
    {
        $this->conn->close();
    }
} 
