<?php
    include("includes/conn.php");

    function formatPhoneNumber($phoneNumber) {
        $areaCode = substr($phoneNumber, 0, 3);
        $middle = substr($phoneNumber, 3, 3);
        $end = substr($phoneNumber, 6);
        return $areaCode . '-' . $middle . '-' . $end;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize user input to protect against SQL injection
        $first_name = ucfirst(mysqli_real_escape_string($conn, $_POST["first_name"]));
        $last_name = ucfirst(mysqli_real_escape_string($conn, $_POST["last_name"]));
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $phone = formatPhoneNumber(mysqli_real_escape_string($conn, $_POST["phone"]));
        $subject = mysqli_real_escape_string($conn, $_POST["subject"]);
        $message = mysqli_real_escape_string($conn, $_POST["message"]);

        $sql = "INSERT INTO messages (first_name, last_name, email, phone, subject, message) VALUES ('$first_name', '$last_name', '$email', '$phone', '$subject', '$message')";

        if (mysqli_query($conn, $sql)) {
            // Redirect to the contact page
            header("Location: contact.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
?>
