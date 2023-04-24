<?php

    session_start();

    include('connection.php');

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $pass = $_POST["123pass"];
        $username = $_POST["root"];

        $query = "select * from users where username = '$username' limit 1";
        $result = mysqli_query($con, $query);

        if($result){
            if($result && mysqli_num_rows($result) > 0){
              $user_data = mysqli_fetch_assoc($result);
      
              if($user_data['password'] === $pass ){
                $_SESSION['password'] = $user_data['password'];
                header("Location: dashboard.php");
              }else{
                echo($user_data['password']);
              }
            }else{
              echo("no such user");
            }
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
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form action="action_page.php" method="post">
    <div class="imgcontainer">
        <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit">Login</button>
        <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
    </form>

</body>
</html>

