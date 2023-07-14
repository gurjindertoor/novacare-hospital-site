<?php
    include("../../includes/conn.php");

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
        $date_of_birth = mysqli_real_escape_string($conn, $_POST["date_of_birth"]);

        $sql = "INSERT INTO patients (first_name, last_name, email, phone, date_of_birth) VALUES ('$first_name', '$last_name', '$email', '$phone', '$date_of_birth')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);

        // Redirect to the patients page
        header("Location: ../patients.php");
    }
?>
