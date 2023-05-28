
<?php 

    function getDbConnection(){

        $host = "localhost";
        $username = "root";
        $pass = "123pass";
        $dbname = "drugdispensary";
    

        $conn = mysqli_connect($host, $username, $pass, $dbname);

        if($conn == true) {
            return $conn;
        }else {
            die("failed to connect");
        }
    }

/* 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 */

?>
