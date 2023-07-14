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
        $patient_id = mysqli_real_escape_string($conn, $_POST['patient_id']);
        $first_name = ucfirst(mysqli_real_escape_string($conn, $_POST["first_name"]));
        $last_name = ucfirst(mysqli_real_escape_string($conn, $_POST["last_name"]));
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = formatPhoneNumber(mysqli_real_escape_string($conn, $_POST["phone"]));
        $date_of_birth = mysqli_real_escape_string($conn, $_POST['date_of_birth']);

        $sql = "UPDATE patients SET first_name='$first_name', last_name='$last_name', email='$email', phone='$phone', date_of_birth='$date_of_birth' WHERE patient_id=$patient_id";

        if (mysqli_query($conn, $sql)) {
            echo "Patient information updated successfully";
        } else {
            echo "Error updating appointment: " . mysqli_error($conn);
        }

        mysqli_close($conn);

        header("Location: ../patients.php");
    }
?>
