<?php

require_once("connection.php");

$ssn = "41243371";
$Fname = "Winstone";
$Lname = "Were";
$age = 15;
$dob = "7/28/2003";
$email = "stoniedev@gmail.com";
$password = "123pass";


$query = "INSERT INTO patients (ssn, Fname, Lname, age, dob, email, password) VALUES ('$ssn', '$Fname' , '$Lname', '$age', STR_TO_DATE($dob,'%m-%d-%y'), '$email', '$password')";

if($con->query($query) == TRUE) {
    echo "Inseted Successfully";
}else{  
    echo($con->error);
}

?>