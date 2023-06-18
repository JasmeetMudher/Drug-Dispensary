<?php
include 'connection.php';
include 'crud.php';
$msg = '';
$suc = '';



if(isset($_POST["btnsubmit"])){

    $patient_data = array(

        'ssn' => $_POST["SSN"],
        'Fname' => $_POST["fname"],
        'Lname' => $_POST["lname"],
        'phone' => $_POST["phone"],
        'dob' => date('y-m-d',strtotime($_POST["dob"])),
        'email' => $_POST["email"],
        'password' => $_POST["password"],
        'address' => $_POST["address"]

    );

    $crud = new CRUD("localhost","root","123pass","drugdispensary");

    if($crud->create("patients", $patient_data)){
        $msg = "<div class='btn btn-success'>records inserted successfully</div>";
        header("location: dashboard.php");
    }else{
        die("Error in creating patient");
    }


}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

  <link href="assets/css/style.css" rel="stylesheet">

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
                  <div><?php echo $msg; ?></div>
                  
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate method="post">
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your SSN</label>
                      <input type="text" name="SSN" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>

                    <div class="col-12">
                      <label class="form-label">First Name</label>
                      <input type="text" name="fname" class="form-control"  id= "yourName" required>
                    </div>

                    <div class="col-12">
                      <label class="form-label">Last Name</label>
                      <input type="text" name="lname" class="form-control"  required>
                    </div>

                    <div class="col-12">
                      <label class="form-label">DOB</label>
                      <input type="date" name="dob" class="form-control"  required>
                    </div>

                    <div class="col-12">
                      <label class="form-label">Phone</label>
                      <input type="text" name="phone" class="form-control" required>
                    </div>

                    <div class="col-12">
                      <label class="form-label">Email </label>
                      <input type="text" name="email" class="form-control" id="yourEmail" required>
                    </div>

                    <div class="col-12">
                      <label class="form-label">Address </label>
                      <input type="text" name="address" class="form-control" id="yourEmail" required>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="btnsubmit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="login.php">Log in</a></p>
                    </div>
                  </form>

                </div>
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