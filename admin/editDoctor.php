<?php
    include("../includes/conn.php");

    function formatPhoneNumber($phoneNumber) {
        $areaCode = substr($phoneNumber, 0, 3);
        $middle = substr($phoneNumber, 3, 3);
        $end = substr($phoneNumber, 6);
        return $areaCode . '-' . $middle . '-' . $end;
    };

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize user input to protect against SQL injection
        $doctor_id = mysqli_real_escape_string($conn, $_POST['doctor_id']);
        $first_name = ucfirst(mysqli_real_escape_string($conn, $_POST["first_name"]));
        $last_name = ucfirst(mysqli_real_escape_string($conn, $_POST["last_name"]));
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = formatPhoneNumber(mysqli_real_escape_string($conn, $_POST["phone"]));
        $specialty = mysqli_real_escape_string($conn, $_POST['specialty']);

        $sql = "UPDATE doctors SET first_name='$first_name', last_name='$last_name', email='$email', phone='$phone', specialty='$specialty' WHERE doctor_id=$doctor_id";

        if (mysqli_query($conn, $sql)) {
            echo "Doctor updated successfully";
        } else {
            echo "Error updating appointment: " . mysqli_error($conn);
        }

        mysqli_close($conn);

        header("Location: doctors.php");
    }
?>
