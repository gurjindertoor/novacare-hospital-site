<?php
    include("../../includes/conn.php");

    function formatPhoneNumber($phoneNumber) {
        $areaCode = substr($phoneNumber, 0, 3);
        $middle = substr($phoneNumber, 3, 3);
        $end = substr($phoneNumber, 6);
        return $areaCode . '-' . $middle . '-' . $end;
    };

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize user input to protect against SQL injection
        $appointment_id = mysqli_real_escape_string($conn, $_POST['appointment_id']);
        $first_name = ucfirst(mysqli_real_escape_string($conn, $_POST["first_name"]));
        $last_name = ucfirst(mysqli_real_escape_string($conn, $_POST["last_name"]));
        $date_of_birth = mysqli_real_escape_string($conn, $_POST['date_of_birth']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = formatPhoneNumber(mysqli_real_escape_string($conn, $_POST["phone"]));
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $time = mysqli_real_escape_string($conn, $_POST['time']);
        $department = mysqli_real_escape_string($conn, $_POST['department']);
        $doctor = mysqli_real_escape_string($conn, $_POST['doctor']);

        $sql = "UPDATE appointments SET first_name='$first_name', last_name='$last_name', date_of_birth='$date_of_birth', email='$email', phone='$phone', date='$date', time='$time', department='$department', doctor='$doctor' WHERE appointment_id=$appointment_id";

        if (mysqli_query($conn, $sql)) {
            echo "Appointment updated successfully";
        } else {
            echo "Error updating appointment: " . mysqli_error($conn);
        }

        mysqli_close($conn);

        header("Location: ../appointments.php");
    }
?>
