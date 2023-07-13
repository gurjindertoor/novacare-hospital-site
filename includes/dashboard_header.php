<?php
    session_start();
    if (!isset($_SESSION['admin_id']) && !isset($_SESSION['logged_in'])) {
        // User is not logged in. Redirect them back to the login.php page.
        header('Location: login.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>NovaCare</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head> 
 
<body>         
    <!-- Start Navbar Bar-->
    <div class="container-fluid sticky-top bg-white shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
                <div class="navbar-brand">
                    <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-clinic-medical me-2"></i>NovaCare</h1>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="appointments.php">Appointments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="patients.php">Patients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="doctors.php">Doctors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="messages.php">Messages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="settings.php">Settings</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center">
                        <a href="#" class="px-2" data-bs-toggle="modal" data-bs-target="#addAdminModal">Add Admin</a>
                        <a href="../index.php" class="px-2">Patient Portal</a>
                        <a href="../index.php" class="px-2">Logout</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- End Navbar Bar-->

    <!-- Add Admin Modal -->
    <div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="adminModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminModalLabel">Add Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="adminForm" action="addAdmin.php" method="POST">
                        <div class="mb-3">
                            <label for="adminFirstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="adminFirstName" name="first_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="adminLastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="adminLastName" name="last_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="adminEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="adminEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="adminPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="adminPassword" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="adminConfirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="adminConfirmPassword" name="confirm_password" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="adminForm">Add Admin</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add Admin Modal -->
