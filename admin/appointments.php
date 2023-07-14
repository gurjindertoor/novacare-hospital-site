<?php
    include("../includes/loginCheck.php");
    include("../includes/dashboardHeader.php");
    include("../includes/conn.php");
?>


<div class="container py-5">
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Appointments</h2>
                <!-- Add Appointment Button -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAppointmentModal">
                    Add Appointment
                </button>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Appt ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Department</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT appointment_id, first_name, last_name, date_of_birth, email, phone, date, time, department, doctor FROM appointments";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            $time_in_12_hour_format = date("g:i A", strtotime($row["time"]));
                            echo "<tr><td>" . $row["appointment_id"] . "</td><td>" . $row["first_name"] . "</td><td>" . $row["last_name"] . "</td><td>" . $row["date_of_birth"] . "</td><td>" . $row["email"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["date"] . "</td><td>" . $time_in_12_hour_format . "</td><td>" . $row["department"] . "</td><td>" . $row["doctor"] . "</td><td>";
                            echo "<form action='helpers/deleteAppointment.php' method='post'><input type='hidden' name='id_to_delete' value='" . $row["appointment_id"] . "'><button type='button' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editAppointmentModal" . $row["appointment_id"] . "'>Edit</button> <button type='submit' name='delete' class='btn btn-danger btn-sm'>Delete</button></form></td></tr>";
                            echo '
                            <!-- Edit Appointment Modal -->
                            <div class="modal fade" id="editAppointmentModal' . $row["appointment_id"] . '" tabindex="-1" aria-labelledby="editAppointmentModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editAppointmentModalLabel">Edit Appointment</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="editAppointmentForm" action="helpers/editAppointment.php" method="post">
                                                <input type="hidden" name="appointment_id" value="' . $row["appointment_id"] . '">

                                                <div class="mb-3">
                                                    <label for="appointmentFirstName" class="form-label">First Name</label>
                                                    <input type="text" class="form-control" id="appointmentFirstName" name="first_name" value="' . $row["first_name"] . '" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="appointmentLastName" class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" id="appointmentLastName" name="last_name" value="' . $row["last_name"] . '" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="appointmentDOB" class="form-label">Date of Birth</label>
                                                    <input type="date" class="form-control" id="appointmentDOB" name="date_of_birth" value="' . $row["date_of_birth"] . '" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="appointmentEmail" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="appointmentEmail" name="email" value="' . $row["email"] . '" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="appointmentPhone" class="form-label">Phone</label>
                                                    <input type="text" class="form-control" id="appointmentPhone" name="phone" value="' . $row["phone"] . '" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="appointmentDate" class="form-label">Date</label>
                                                    <input type="date" class="form-control" id="appointmentDate" name="date" value="' . $row["date"] . '" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="appointmentTime" class="form-label">Time</label>
                                                    <select name="time" id="appointmentTime" class="form-control" required>
                                                        <option value="" ' . ($row["time"] == "" ? "selected" : "") . '>Appointment Time</option>
                                                        <option value="09:00" ' . ($row["time"] == "09:00:00" ? "selected" : "") . '>09:00 AM</option>
                                                        <option value="09:30" ' . ($row["time"] == "09:30:00" ? "selected" : "") . '>09:30 AM</option>
                                                        <option value="10:00" ' . ($row["time"] == "10:00:00" ? "selected" : "") . '>10:00 AM</option>
                                                        <option value="10:30" ' . ($row["time"] == "10:30:00" ? "selected" : "") . '>10:30 AM</option>
                                                        <option value="11:00" ' . ($row["time"] == "11:00:00" ? "selected" : "") . '>11:00 AM</option>
                                                        <option value="11:30" ' . ($row["time"] == "11:30:00" ? "selected" : "") . '>11:30 AM</option>
                                                        <option value="12:00" ' . ($row["time"] == "12:00:00" ? "selected" : "") . '>12:00 PM</option>
                                                        <option value="12:30" ' . ($row["time"] == "12:30:00" ? "selected" : "") . '>12:30 PM</option>
                                                        <option value="13:00" ' . ($row["time"] == "13:00:00" ? "selected" : "") . '>01:00 PM</option>
                                                        <option value="13:30" ' . ($row["time"] == "13:30:00" ? "selected" : "") . '>01:30 PM</option>
                                                        <option value="14:00" ' . ($row["time"] == "14:00:00" ? "selected" : "") . '>02:00 PM</option>
                                                        <option value="14:30" ' . ($row["time"] == "14:30:00" ? "selected" : "") . '>02:30 PM</option>
                                                        <option value="15:00" ' . ($row["time"] == "15:00:00" ? "selected" : "") . '>03:00 PM</option>
                                                        <option value="15:30" ' . ($row["time"] == "15:30:00" ? "selected" : "") . '>03:30 PM</option>
                                                        <option value="16:00" ' . ($row["time"] == "16:00:00" ? "selected" : "") . '>04:00 PM</option>
                                                        <option value="16:30" ' . ($row["time"] == "16:30:00" ? "selected" : "") . '>04:30 PM</option>
                                                        <option value="17:00" ' . ($row["time"] == "17:00:00" ? "selected" : "") . '>05:00 PM</option>
                                                        <option value="17:30" ' . ($row["time"] == "17:30:00" ? "selected" : "") . '>05:30 PM</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="appointmentDepartment" class="form-label">Department</label>
                                                    <input type="text" class="form-control" id="appointmentDepartment" name="department" value="' . $row["department"] . '" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="appointmentDoctor" class="form-label">Doctor</label>
                                                    <input type="text" class="form-control" id="appointmentDoctor" name="doctor" value="' . $row["doctor"] . '" required>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ';
                        }
                    } else {
                        echo "No records found";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addAppointmentModal" tabindex="-1" aria-labelledby="appointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="appointmentModalLabel">Add Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="appointmentForm" action="helpers/addAppointment.php" method="post">
                    <div class="mb-3">
                        <label for="appointmentFirstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="appointmentFirstName" name="first_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="appointmentLastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="appointmentLastName" name="last_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="appointmentDOB" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="appointmentDOB" name="date_of_birth" required>
                    </div>
                    <div class="mb-3">
                        <label for="appointmentEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="appointmentEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="appointmentPhone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="appointmentPhone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="appointmentDate" class="form-label">Date</label>
                        <input type="date" class="form-control" id="appointmentDate" name="date" required>
                    </div>
                    <div class="mb-3">
                        <label for="appointmentTime" class="form-label">Time</label>
                        <select name="time" id="appointmentTime" class="form-control" required>
                            <option value="" selected>Appointment Time</option>
                            <option value="09:00">09:00 AM</option>
                            <option value="09:30">09:30 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="10:30">10:30 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="11:30">11:30 AM</option>
                            <option value="12:00">12:00 PM</option>
                            <option value="12:30">12:30 PM</option>
                            <option value="13:00">01:00 PM</option>
                            <option value="13:30">01:30 PM</option>
                            <option value="14:00">02:00 PM</option>
                            <option value="14:30">02:30 PM</option>
                            <option value="15:00">03:00 PM</option>
                            <option value="15:30">03:30 PM</option>
                            <option value="16:00">04:00 PM</option>
                            <option value="16:30">04:30 PM</option>
                            <option value="17:00">05:00 PM</option>
                            <option value="17:30">05:30 PM</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="appointmentDepartment" class="form-label">Department</label>
                        <input type="text" class="form-control" id="appointmentDepartment" name="department" required>
                    </div>
                    <div class="mb-3">
                        <label for="appointmentDoctor" class="form-label">Doctor</label>
                        <input type="text" class="form-control" id="appointmentDoctor" name="doctor" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

</body>
</html>