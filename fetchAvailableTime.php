<?php
    include("includes/conn.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize user input to protect against SQL injection
        $date = mysqli_real_escape_string($conn, $_POST["date"]);
        $doctor = mysqli_real_escape_string($conn, $_POST["doctor"]);

        // Fetch all appointments on the selected date with the selected doctor
        $sql = "SELECT time FROM appointments WHERE date = '$date' AND doctor = '$doctor'";
        $result = mysqli_query($conn, $sql);

        // All the timeslots you want to offer
        $allTimeslots = array("09:00", "09:30", "10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30", "17:00", "17:30");

        // Array to hold the booked timeslots
        $bookedTimeslots = array();

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $bookedTimeslots[] = $row["time"];
            }
        }

        // Calculate the available timeslots
        $availableTimeslots = array_diff($allTimeslots, $bookedTimeslots);

        // Return the available timeslots
        echo json_encode($availableTimeslots);
    }
?>
