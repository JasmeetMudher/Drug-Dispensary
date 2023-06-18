<?php

class PatientModel {
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function registerPatient($ssn, $fname, $lname, $phone, $dob, $email, $password, $address)
    {
        // Check if the patient already exists based on their SSN or email
        $stmt = $this->conn->prepare("SELECT * FROM patients WHERE SSN = ? OR email = ?");
        $stmt->bind_param("ss", $ssn, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Patient already exists, handle error or display message
            return false;
        } else {
            // Hash the password securely
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert the patient into the database
            $stmt = $this->conn->prepare("INSERT INTO patients (SSN, Fname, Lname, phone, dob, email, password, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $ssn, $fname, $lname, $phone, $dob, $email, $hashedPassword, $address);
            $stmt->execute();

            return true;
        }
    }

    public function login($email, $password)
    {
        // Retrieve the patient's record from the database based on the provided email
        $stmt = $this->conn->prepare("SELECT * FROM patients WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $storedPassword = $row['password'];

            // Verify the password
            if (password_verify($password, $storedPassword)) {
                // Password is correct
                return true;
            }
        }

        return false;
    }
}
