<?php
  session_start();
  include('connection.php');
  include('functions.php');

  $msg = " ";

  if(isset($_POST["btnlogin"])) {
    $password = $_POST["password"];
    $business_id = $_POST["business-id"];

    $login_query = "SELECT * FROM pharmacy where business_id = '$business_id' and password = '$password' limit 1;
                    SELECT * from pharmaceutical_company where business_id = '$business_id' and password = '$password' limit 1;";

    $con->multi_query($login_query);  

    $results = array(); // Array to store the results

    do {
      if ($result = $con->store_result()) {
        $results[] = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
      }
    } while ($con->next_result());
  
    if($results[0]){
      $user_data = $results[0][0];
      $_SESSION['ID'] = $results[0][0]['ID'];
      $_SESSION['Name'] = $results[0][0]["name"];
      $_SESSION['usertype'] = "pharmacy";
      $_SESSION["user-level"] = "business";
      header("Location: business-dashboard.php");

      echo "doctor logic works";

    }else if($results[1]){
      $user_data = $results[1][0];  
      $_SESSION['ID'] = $results[1][0]['ID'];
      $_SESSION['Name'] = $results[1][0]["name"];
      $_SESSION['usertype'] = "pharmaceutical_company";
      $_SESSION["user-level"] = "business";
      header("Location: business-dashboard.php");


      echo "patient logic works";
    }else {
      echo "No such user";
    }

    // Output the results
    /*foreach ($results as $index => $array) {
      echo "Array $index:<br>";
      foreach ($array as $row) {
        foreach ($row as $key => $value) {
          echo "$key: $value<br>";
        }
        echo "<br>";
      }
    }*/

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
                      <?php echo $msg; ?>
                      <h5 class="card-title text-center pb-0 fs-4">Login to Business Your Account</h5>
                      <p class="text-center small">Enter your Business ID  & password to login</p>
                    </div>

                    <form class="row g-3 needs-validation" novalidate method="post">

                      <div class="col-12">
                        <label for="yourUsername" class="form-label">Business ID</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend"><i class="bi-key-fill"></i></span>
                          <input type="text" name="business-id" class="form-control" id="yourUsername" placeholder="enter username" required>
                          <div class="invalid-feedback">Please enter your Business ID.</div>
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Password</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend"><i class="bi-lock-fill"></i></span>
                          <input type="password" name="password" class="form-control" id="yourPassword" placeholder="enter password" required>
                          <div class="invalid-feedback">Please enter your password! </div>
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
                          <p class="small mb-0">Don't Business account? <a href="business-register.php">Create one here</a></p>
                        </div>
                        <div class="col-12">
                          <p class="small mb-0">Are you a doctor or patient ? <a href="login.php">Login from here </a></p>
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