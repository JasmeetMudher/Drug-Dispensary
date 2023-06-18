<?php
  session_start();
  //include 'connect.php';
  include 'crud.php';
  $msg = '';

  $crud = new CRUD("localhost","root","123pass","drugdispensary");

  if(isset($_POST["btnsubmit"])){
    $ssn = $_POST["ssn"];
    $password = $_POST["password"];

    print_r($crud->getUserBySSN(""));

  }

?>