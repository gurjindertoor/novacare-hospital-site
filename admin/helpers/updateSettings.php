<?php
    include("../../includes/loginCheck.php");
    include("../../includes/conn.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

        if($password != $confirmPassword) {
            die("Password and confirm password do not match");
        }

        // hash the password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE admin SET email = '$email', password = '$passwordHash' WHERE admin_id = ".$_SESSION['admin_id'];

        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
            header("Location: ../settings.php"); // redirect to settings.php after updating
            exit;
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>
