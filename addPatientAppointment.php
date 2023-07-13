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
        $date_of_birth = mysqli_real_escape_string($conn, $_POST["date_of_birth"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $phone = formatPhoneNumber(mysqli_real_escape_string($conn, $_POST["phone"]));
        $date = mysqli_real_escape_string($conn, $_POST["appointment_date"]);
        $time = mysqli_real_escape_string($conn, $_POST["time"]);
        $department = mysqli_real_escape_string($conn, $_POST["department"]);
        $doctor = mysqli_real_escape_string($conn, $_POST["doctor"]);

        // check for existing appointment
        $checkSql = "SELECT * FROM appointments WHERE date = '$date' AND time = '$time'";
        $checkResult = mysqli_query($conn, $checkSql);

        if(mysqli_num_rows($checkResult) > 0){
            // appointment already exists
            echo json_encode(array("statusCode"=>201));
        } else {
            $sql = "INSERT INTO appointments (first_name, last_name, date_of_birth, email, phone, date, time, department, doctor) VALUES ('$first_name', '$last_name', '$date_of_birth', '$email', '$phone', '$date', '$time', '$department', '$doctor')";

            if (mysqli_query($conn, $sql)) {
                echo json_encode(array("statusCode"=>200));
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            mysqli_close($conn);
        }
    }
?>
