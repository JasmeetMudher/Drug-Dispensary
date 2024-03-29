<?php

include("connection.php");
include("functions.php");

session_start();

$username = $_SESSION['Name'];

$usertype = $_SESSION['usertype'];

$user_data = check_login($con);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin Dashboard</title>
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
              <a class="dropdown-item d-flex align-items-center" href="/business-profile.php">
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
                <a class="nav-link " href="/admin-dashboard.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Doctors</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/admin-view-doctors.php">
                            <i class="bi bi-circle"></i><span>View Doctors</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Patients</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/admin-view-patients.php">
                            <i class="bi bi-circle"></i><span>View Patients</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Pharmacists</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/admin-view-pharmacy.php">
                            <i class="bi bi-circle"></i><span>View Pharmacists</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Company</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/admin-view-pharmacy.php">
                            <i class="bi bi-circle"></i><span>View Companies</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Components Nav -->

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
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">

            <h5> Patients </h5>

            <?php

            if ($_SESSION['user-level']) {
                $table_name = $_SESSION['usertype'];
            } else {
                $table_name = $usertype . "s";
            }

            $business_id = $user_data["SSN"];
            $users_query = "SELECT * FROM patients";

            $result = $con->query($users_query);
            ?>
            <table border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <th>SSN</th>
                    <th>Name </th>
                    <th>Phone</th>
                    <th>Email </th>
                    <th>Address </th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    $sn = 1;
                    while ($data = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $data["SSN"]; ?> </td>
                            <td><?php echo $data["Fname"]." ".$data["Lname"]; ?> </td>
                            <td><?php echo $data["dob"]; ?> </td>
                            <td><?php echo $data['email']; ?> </td>
                            <td><?php echo $data['address']; ?> </td>
                        <tr>
                        <?php
                        $sn++;
                    }
                } else { ?>
                        <tr>
                            <td colspan="8">No data found</td>
                        </tr>

                    <?php } ?>

                    <?php
                    print_r($data);
                    ?>
            </table>


            
            <h5> Doctors </h5>

            <?php

            if ($_SESSION['user-level']) {
                $table_name = $_SESSION['usertype'];
            } else {
                $table_name = $usertype . "s";
            }

            $business_id = $user_data["SSN"];
            $users_query = "SELECT * FROM doctors";

            $result = $con->query($users_query);
            ?>
            <table border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <th>SSN</th>
                    <th>Name </th>
                    <th>Phone</th>
                    <th>Email </th>
                    <th>Address </th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    $sn = 1;
                    while ($data = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $data["SSN"]; ?> </td>
                            <td><?php echo $data["Fname"]." ".$data["Lname"]; ?> </td>
                            <td><?php echo $data["dob"]; ?> </td>
                            <td><?php echo $data['email']; ?> </td>
                            <td><?php echo $data['address']; ?> </td>
                        <tr>
                        <?php
                        $sn++;
                    }
                } else { ?>
                        <tr>
                            <td colspan="8">No data found</td>
                        </tr>

                    <?php } ?>

                    <?php
                    print_r($data);
                    ?>
            </table>


            <h5> Pharmacies </h5>

            <?php

            if ($_SESSION['user-level']) {
                $table_name = $_SESSION['usertype'];
            } else {
                $table_name = $usertype . "s";
            }

            $business_id = $user_data["SSN"];
            $users_query = "SELECT * FROM pharmacy";

            $result = $con->query($users_query);
            ?>
            <table border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <th>Business ID</th>
                    <th>Name </th>
                    <th>Phone</th>
                    <th>Email </th>
                    <th>Address </th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    $sn = 1;
                    while ($data = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $data["business_id"]; ?> </td>
                            <td><?php echo $data["name"]; ?> </td>
                            <td><?php echo $data["phone"]; ?> </td>
                            <td><?php echo $data['email']; ?> </td>
                            <td><?php echo $data['address']; ?> </td>
                        <tr>
                        <?php
                        $sn++;
                    }
                } else { ?>
                        <tr>
                            <td colspan="8">No data found</td>
                        </tr>

                    <?php } ?>

                    <?php
                    print_r($data);
                    ?>
            </table>

            <h5> Pharmaceutical Companys </h5>

            <?php

            if ($_SESSION['user-level']) {
                $table_name = $_SESSION['usertype'];
            } else {
                $table_name = $usertype . "s";
            }

            $business_id = $user_data["SSN"];
            $users_query = "SELECT * FROM pharmaceutical_company";

            $result = $con->query($users_query);
            ?>
            <table border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <th>Business ID</th>
                    <th>Name </th>
                    <th>Phone</th>
                    <th>Email </th>
                    <th>Address </th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    $sn = 1;
                    while ($data = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $data["business_id"]; ?> </td>
                            <td><?php echo $data["name"]; ?> </td>
                            <td><?php echo $data["phone"]; ?> </td>
                            <td><?php echo $data['email']; ?> </td>
                            <td><?php echo $data['address']; ?> </td>
                        <tr>
                        <?php
                        $sn++;
                    }
                } else { ?>
                        <tr>
                            <td colspan="8">No data found</td>
                        </tr>

                    <?php } ?>

                    <?php
                    print_r($data);
                    ?>
            </table>

        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        < </footer><!-- End Footer -->

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