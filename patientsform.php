<?php
require 'connection.php';
if(isset($_POST["submit"])){
    $FirstName = $_POST["FirstName"];
    $LastName = $_POST["LastName"];
    $SSN = $_POST["SSN"];
    $DOB = date('d-m-Y',strtotime($_POST["DOB"]));
    $Address = $_POST["Address"];
    $Phone = $_POST["Phone"];
    $Email = $_POST["Email"];
    $Gender = $_POST["Gender"];

    $query = "INSERT INTO patients(FirstName,LastName,SSN,DOB,Address,Phone,Email,Gender) 
                VALUES('$FirstName','$LastName',$SSN,'$DOB','$Address','$Phone','$Email','$Gender')";
    if(mysqli_query($con,$sql)){
        echo "New Record added";
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="connection.php" method="post">
        <label>First Name:</label><input type="text" name="FirstName"><br>
        <label>Last Name:</label><input type="text" name="LastName"><br>
        <label>SSN:</label><input type="text" name="SSN"><br>
        <label>DOB:</label><input type="date" name="DOB"><br>
        <label>Address:</label><input type="text" name="Address"><br>
        <label>Phone:</label><input type="text" name="Phone"><br>
        <label>Email:</label><input type="text" name="Email"><br>
        <label>Gender:</label><input type="text" name="Gender"><br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>