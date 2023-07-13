<?php
    include("../includes/conn.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize user input to protect against SQL injection
        $first_name = ucfirst(mysqli_real_escape_string($conn, $_POST["first_name"]));
        $last_name = ucfirst(mysqli_real_escape_string($conn, $_POST["last_name"]));
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        // Hash password before storing it in the database
        $password = password_hash(mysqli_real_escape_string($conn, $_POST["password"]), PASSWORD_DEFAULT);

        $sql = "INSERT INTO admin (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";

        if (mysqli_query($conn, $sql)) {
            echo "New admin successfully added";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);

        // Redirect to the current page
        header("Location: appointments.php");
    }
?>
