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
            return $this->conn->insert_id;
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

    /*public function getUserBySSN($username,$password)
    {
        //$username = $this->conn->real_escape_string($username);
        $sql = "SELECT * FROM patients WHERE ssn= '$username' LIMIT 1";
        
        $result = $this->conn->query($sql);
        $userpas = $result->
        if($result->num_rows > 0){

        }

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
            echo $result->fetch_assoc();

        } else {
            return false;
        }
    }*/

    public function __destruct()
    {
        $this->conn->close();
    }
} 

// Example usage:
/*$crud = new CRUD('localhost', 'username', 'password', 'database');

// Create a record
$data = array(
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'phone' => '1234567890'
);
$insertId = $crud->create('users', $data);
if ($insertId) {
    echo "Record created successfully. Insert ID: " . $insertId;
} else {
    echo "Error creating record.";
}

// Read records
$users = $crud->read('users');
if ($users) {
    foreach ($users as $user) {
        echo "Name: " . $user['name'] . ", Email: " . $user['email'] . "<br>";
    }
} else {
    echo "No records found.";
}

// Update a record
$data = array(
    'email' => 'updated@example.com',
    'phone' => '9876543210'
);
$condition = "id = 1";
if ($crud->update('users', $data, $condition)) {
    echo "Record updated successfully.";
} else {
    echo "Error updating record.";
}

// Delete a record
$condition = "id = 1";
if ($crud->delete('users', $condition)) {
    echo "Record deleted successfully.";
} else {
    echo "Error deleting record.";
}*/
