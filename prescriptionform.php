<?php
  session_start();
  include('connection.php');
  include('functions.php');
?>



<!DOCTYPE html>
<html>
<head>
    <title>Prescription Form</title>

</head>
<body>
    <h1>Prescription Form</h1>
    <form action="" method="post">

        <label for="patient_ssn">Patient SSN:</label>
        <input type="text" id="patient_ssn" name="patient_ssn" required>

        <label for="patient_name">Patient Name:</label>
        <input type="text" id="patient_name" name="patient_name" required>

        <label for="doctor_id">Doctor SSN:</label>
        <input type="text" id="doctor_ssn" name="doctor_id" required>
        
        <label for="drug_name">Drug Name:</label>
        <input type="text" id="drug_name" name="drug_name" required>
        
        <label for="drug_id">Drug ID:</label>
        <input type="text" id="drug_id" name="drug_id" required>

        <label for="dosage">Dosage:</label>
        <textarea id="dosage" name="dosage" required></textarea>
        
        <input type="submit" value="Issue Prescription">
    </form>
</body>
</html>
