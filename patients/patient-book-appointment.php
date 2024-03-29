<?php

  include("connection.php");
  include("functions.php");
  include("crud.php");

  session_start();

  $username = $_SESSION['Name'];
  $usertype = $_SESSION['usertype'];
  if($_SESSION['usertype'] === 'pharmaceutical_company'){
    $usertype = "Pharmaceutical";
  }
 
  $user_data = check_login($con);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Get Contract</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/table-styling.css">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block"><?php echo $usertype ?></span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<div class="search-bar">
    <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
    </form>
</div><!-- End Search Bar -->

<nav class="header-nav ms-auto">
<ul class="d-flex align-items-center">

<li class="nav-item d-block d-lg-none">
  <a class="nav-link nav-icon search-bar-toggle " href="#">
    <i class="bi bi-search"></i>
  </a>
</li><!-- End Search Icon-->

<li class="nav-item dropdown pe-3">

  <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

    <img src="assets/img/profile-img.png" alt="Profile" class="rounded-circle">
    <?php echo $username; ?>
    <span class="d-none d-md-block dropdown-toggle ps-2"></span>
  </a><!-- End Profile Iamge Icon -->

  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
    <li class="dropdown-header">
      <h6><?php echo $username; ?></h6>
      <span><?php echo $usertype; ?></span>
    </li>
    <li>
      <hr class="dropdown-divider">
    </li>

    <li>
      <a class="dropdown-item d-flex align-items-center" href="/hospital-functions/userprofile.php">
        <i class="bi bi-person"></i>
        <span>My Profile</span>
      </a>
    </li>
    <li>
      <hr class="dropdown-divider">
    </li>

    <li>
      <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
        <i class="bi bi-gear"></i>
        <span>Account Settings</span>
      </a>
    </li>
    <li>
      <hr class="dropdown-divider">
    </li>

    <li>
      <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
        <i class="bi bi-question-circle"></i>
        <span>Need Help?</span>
      </a>
    </li>
    <li>
      <hr class="dropdown-divider">
    </li>

    <li>
      <a class="dropdown-item d-flex align-items-center" href="#">
        <i class="bi bi-box-arrow-right"></i>
        <span><a href="logout.php">Sign Out</a></span>
      </a>
    </li>

  </ul><!-- End Profile Dropdown Items -->            
</li><!-- End Profile Nav -->

</ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link " href="./patient-dashboard.php">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Doctor</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="/patient-get-doctor.php">
                    <i class="bi bi-circle"></i><span>Get Doctor</span>
                </a>
            </li>
            <li>
                <a href="components-accordion.html">
                    <i class="bi bi-circle"></i><span>Book Appointment</span>
                </a>
            </li>
        </ul>
    </li><!-- End Components Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Prescriptions</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="forms-elements.html">
                    <i class="bi bi-circle"></i><span>View Prescriptions</span>
                </a>
            </li>
            <li>
                <a href="forms-layouts.html">
                    <i class="bi bi-circle"></i><span>Get Drugs</span>
                </a>
            </li>

        </ul>
    </li><!-- End Forms Nav -->

   <!-- End Icons Nav -->

    <li class="nav-heading">Pages</li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="userprofile.php">
            <i class="bi bi-person"></i>
            <span>Profile</span>
        </a>
    </li><!-- End Profile Page Nav -->


</ul>

</aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Get Contract</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Get Contract</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">


        <div class="card-body">
            <form class = "row g-3 needs-validation" method="post">

                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="drug-id" placeholder="Drug ID" aria-label="Username">
                      <span class="input-group-text">:</span>
                      <input type="text" class="form-control" name="company-id" placeholder="Company ID" aria-label="Server">
                      <span class="input-group-text">:</span>
                      <input type="number" class="form-control" name="quantity" placeholder="Company ID" aria-label="Server">
                    </div>

                    <div class="col-12">
                        <input type="submit" value="REQUEST" name="buy-drug" class="btn btn-primary">
                    </div>
              </form>
        </div>

        <?php
        
            if(isset($_POST["search-drug"])){
      
            $drug_name_search = $_POST["drug-name-search"];

            $business_id = $user_data["business_id"];
             
            if($drug_name_search != ""){
              $query = "SELECT * FROM contracts JOIN company_drugs ON contracts.company_id = company_drugs.businesss_id WHERE pharmacy_id = '$business_id' AND drug_name = '$drug_name_search' ";

            }else {
              $query = "SELECT * FROM contracts JOIN company_drugs ON contracts.company_id = company_drugs.businesss_id WHERE pharmacy_id = '$business_id'";

            }

            //echo $business_id;

            $result = $con->query($query);

            if ($result->num_rows > 0) {
                $sn=1;
                while($data = $result->fetch_assoc()) {
        ?>

         <div class="card">
            <div class="card-body">
              <h5 class="card-title"> Drug Name : <?php echo $data["drug_name"]?></h5>
              <h5 class="card-title"> Drug ID : <?php echo $data["drug_id"]?></h5>
              <h5 class="card-title"> Drug Formula : <?php echo $data["drug_formula"]?></h5>
              <h5 class="card-title"> Quantity Remaining : <?php echo $data["quantity"]?></h5>
              <h5 class="card-title"> Price Per Unit : <?php echo $data["price_per_unit"]?></h5>
              <h6 class="card-subtitle mb-2 text-muted"> Company ID : <?php echo $data["company_id"] ?> </h6>

            </div>
          </div>

        <?php
        $sn++;}} else { ?>
            <p> No Such Drug </p>
      <?php } }?>

      <?php
        //print_r($data);

        $crud = new CRUD("localhost","root","123pass","drugdispensary");

        if(isset($_POST["buy-drug"])) {
            $drug_id = $_POST["drug-id"];
            $company_id = $_POST["company-id"];
            $quantity = $_POST["quantity"];

            $quantity_query = "SELECT * FROM company_drugs WHERE drug_id = '$drug_id' AND businesss_id = '$company_id' LIMIT 1";
            
            $quantity_data = $con->query($quantity_query)->fetch_assoc();

            if($quantity > $quantity_data["quantity"]){
                echo "Reduce The Quantity Wanted ";
            }else {

                $company_quantity = (int)$quantity_data["quantity"]-(int)$quantity;

                $update_query = "UPDATE company_drugs SET quantity = '$company_quantity' WHERE drug_id = '$drug_id' ";

                $updated_drug_data = array(
                  'drug_id' => $drug_id,
                  'businesss_id' => $user_data['business_id'],
                  'drug_formula' => $quantity_data["drug_formula"],
                  'drug_name' => $quantity_data["drug_name"],
                  'quantity' => $quantity,
                  'price_per_unit' =>  $quantity_data["price_per_unit"] 
                );

                if($con->query($update_query)){
                    if ($crud->create('pharmacy_drugs',$updated_drug_data)) {
                        header("Location: /pharmacy-view-drugs.php ");   
                    }else {
                        $msg = "couldn't add drug";
                    }
                }else{
                    $msg = "failed";
                }
            }

        }
        echo $msg;
       ?>




    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer"><
  
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>