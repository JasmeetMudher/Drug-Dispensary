<?php
    function check_login($con) {
        if(isset($_SESSION['ID'])){
            $id = $_SESSION['ID'];
            $usertype = $_SESSION['usertype'];

            if($_SESSION['user-level']){
                $table_name = $usertype;
            }else {
                $table_name = $usertype."s";
            } 


            $users_query = "SELECT * FROM ".$table_name;
          
            $result = $con->query($users_query);
            $query = "SELECT * FROM ".$table_name." where ID = '$id' limit 1";

            $result = mysqli_query($con,$query);
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        } else {
            header("Location: business-login.php");
            die;
        }

    }

?>