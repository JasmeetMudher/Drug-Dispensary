<?php 
    function check_login($con) {
        if(isset($_SESSION['password'])) {
            $id = $_SESSION['password'];
            $query = "select * from users where password = '$id' limit 1";

            $result = mysqli_query($con,$query);
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }

        header("Location: index.php");
        die;
    }
?>