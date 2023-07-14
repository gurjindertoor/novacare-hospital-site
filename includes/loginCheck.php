<?php
    session_start();
    if (!isset($_SESSION['admin_id']) || !isset($_SESSION['logged_in'])) {
        // User is not logged in. Redirect them back to the login.php page.
        header('Location: login.php');
        exit;
    } else {
        // The user is logged in, you can access the session data
        $admin_id = $_SESSION['admin_id'];
        $first_name = $_SESSION['first_name'];
        $last_name = $_SESSION['last_name'];
        $email = $_SESSION['email'];
    }
?>
