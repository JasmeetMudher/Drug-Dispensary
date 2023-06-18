<?php
  session_start();
  include('connection.php');
  include('functions.php');

  $msg = " ";

  if($_SERVER['REQUEST_METHOD'] == "POST"){

    $pass = $_POST["password"];
    $ssn = $_POST["ssn"];

    /* 
      Check on the multiple ways of doing this
        1. where username and pass = ;
          here we have a tenart operator which will return only one thing
    */


    $patients_query = "select * from patients where ssn = '$ssn' and password = '$pass' limit 1";
    $doctors_query = "select * from patients where ssn = '$ssn' and password = '$pass' limit 1";

    //$result = mysqli_query($con,$query);

    //only one can be returned since simillar ssns can't share passwords
    //for now we move both to a one dashboard but in future the dashboards will be different 
    if(mysqli_query($con,$patients_query)){
      //the case that a patient matches
      $result = mysqli_query($con,$patients_query);
      $_SESSION['usertype'] = "Patients";
    }else if(mysqli_query($con, $doctors_query)){
      //the case that a doctor matches
      $result = mysqli_query($con,$doctors_queryquery);
      $_SESSION['usertype'] = "Doctors";
    }else {
      $result = NIL;
    }

    if($result){
      if($result && mysqli_num_rows($result) > 0){
        $user_data = mysqli_fetch_assoc($result);

    
        if($user_data['password'] === $pass ){
          $_SESSION['ID'] = $user_data['ID'];
          $_SESSION['Name'] = $user_data['Fname'].' '.$user_data['Lname'];
          $msg =  $_SESSION['Name'];
          header("Location: dashboard.php");
        }else{
          echo($user_data['password']);
        }
      }else{
        echo("no such user");
      }
    }else { 
      echo 'user not found';
    }

  }


?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>LOGIN PAGE</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: NiceAdmin - v2.2.0
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
  </head>

  <body>

    <main>
      <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                <div class="card mb-3">

                  <div class="card-body">
                    <div><?php echo $msg; ?> </div>
                    <div class="pt-4 pb-2">
                      <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                      <p class="text-center small">Enter your SSN & password to login</p>
                    </div>

                    <form class="row g-3 needs-validation" novalidate method="post">

                      <div class="col-12">
                        <label for="yourUsername" class="form-label">SSN</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend"><i class="bi-key-fill"></i></span>
                          <input type="text" name="ssn" class="form-control" id="yourUsername" placeholder="enter username" required>
                          <div class="invalid-feedback">Please enter your SSN.</div>
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Password</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend"><i class="bi-lock-fill"></i></span>
                          <input type="password" name="password" class="form-control" id="yourPassword" placeholder="enter password" required>
                          <div class="invalid-feedback">Please enter your password!<< /div>
                          </div>



                        </div>

                        <div class="col-12">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                          </div>
                        </div>
                        <div class="col-12">
                          <button class="btn btn-primary w-100" type="submit" name="btnlogin">Login</button>
                        </div>
                        <div class="col-12">
                          <p class="small mb-0">Don't have account? <a href="register.php">Create an account</a></p>
                        </div>
                    </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="#">Hazzlewood</a>
              </div>

            </div>
          </div>
        </div>

        </section>

      </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  </body>

  </html>