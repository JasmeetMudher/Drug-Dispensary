<?php

require_once '/app/models/patient-model.php';

class UserController {
    private $patientModel;

    public function __construct($conn)
    {
        $this->patientModel = new PatientModel($conn);
    }

    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Retrieve form data
            $ssn = $_POST["ssn"];
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $phone = $_POST["phone"];
            $dob = $_POST["dob"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $address = $_POST["address"];

            // Validate and sanitize input (add more validation as needed)

            // Register patient
            $success = $this->patientModel->registerPatient($ssn, $fname, $lname, $phone, $dob, $email, $password, $address);

            if ($success) {
                // Registration successful, redirect to login page or display success message
                echo "Registration successful! You can now <a href='login.html'>login</a>.";
            } else {
                // Registration failed, handle error or display appropriate message
                echo "Registration failed. Please check your input and try again.";
            }
        }
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Retrieve form data
            $email = $_POST["email"];
            $password = $_POST["password"];

            // Authenticate patient
            $authenticated = $this->patientModel->login($email, $password);

            if ($authenticated) {
                // Authentication successful, redirect to a logged-in page or perform necessary actions
                echo "Login successful!";
            } else {
                // Authentication failed, handle error or display appropriate message
                echo "Invalid email or password. Please try again.";
            }
        }
    }
}
