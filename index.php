<?php
    include("includes/header.php");

    // session_start();

    if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
        // Clear the session data
        session_unset();
        session_destroy();

        // Redirect the user to the login page
        header("Location: admin/login.php");
        exit();
    }

    if (isset($_SESSION['success'])) {
        echo "<script type='text/javascript'>
            alert('" . $_SESSION['success'] . "');
        </script>";
        unset($_SESSION['success']); // clear the message for next requests
    }

?>

<!-- Hero Start -->
<div class="container-fluid bg-primary py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row justify-content-start">
            <div class="col-lg-8 text-center text-lg-start">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5" style="border-color: rgba(256, 256, 256, .3) !important;">Welcome To NovaCare</h5>
                <h1 class="display-1 text-white mb-md-4">Healthcare Professionals You Can Trust</h1>
                <div class="pt-2">
                    <a href="team.php" class="btn btn-light rounded-pill py-md-3 px-md-5 mx-2">Find Doctor</a>
                    <a href="appointment.php" class="btn btn-outline-light rounded-pill py-md-3 px-md-5 mx-2">Appointment</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<?php
    include("includes/about_info.php");
    include("includes/services_info.php");
    include("includes/appointment_info.php");
    include("includes/program_info.php");
    include("includes/team_info.php");
    include("includes/testimonial_info.php");
?>

</body>

</html>

<?php
    include("includes/footer.php");
?>
