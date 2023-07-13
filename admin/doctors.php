<?php
    include("../includes/dashboard_header.php");
    include("../includes/conn.php");
?>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Doctors</h2>
                <!-- Add Doctor Button -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDoctorModal">
                    Add Doctor
                </button>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Doctor ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Specialty</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT doctor_id, first_name, last_name, email, phone, specialty FROM doctors";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>" . $row["doctor_id"] . "</td><td>" . $row["first_name"] . "</td><td>" . $row["last_name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["specialty"] . "</td><td>";
                            echo "<form action='deleteDoctor.php' method='post'><input type='hidden' name='id_to_delete' value='" . $row["doctor_id"] . "'><button type='button' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editDoctorModal" . $row["doctor_id"] . "'>Edit</button> <button type='submit' name='delete' class='btn btn-danger btn-sm'>Delete</button></form></td></tr>";
                            echo '
                                <!-- Edit Doctor Modal -->
                                <div class="modal fade" id="editDoctorModal' . $row["doctor_id"] . '" tabindex="-1" aria-labelledby="editDoctorModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editDoctorModalLabel">Edit Doctor</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="editDoctorForm' . $row["doctor_id"] . '" action="editDoctor.php" method="post">
                                                    <input type="hidden" name="doctor_id" value="' . $row["doctor_id"] . '">

                                                    <div class="mb-3">
                                                        <label for="doctorFirstName" class="form-label">First Name</label>
                                                        <input type="text" class="form-control" id="doctorFirstName" name="first_name" value="' . $row["first_name"] . '" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="doctorLastName" class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" id="doctorLastName" name="last_name" value="' . $row["last_name"] . '" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="doctorEmail" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="doctorEmail" name="email" value="' . $row["email"] . '" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="doctorPhone" class="form-label">Phone</label>
                                                        <input type="text" class="form-control" id="doctorPhone" name="phone" value="' . $row["phone"] . '" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="doctorSpecialty" class="form-label">Specialty</label>
                                                        <input type="text" class="form-control" id="doctorSpecialty" name="specialty" value="' . $row["specialty"] . '" required>
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
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Start Modal -->
<div class="modal fade" id="addDoctorModal" tabindex="-1" aria-labelledby="doctorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="doctorModalLabel">Add Doctor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="doctorForm" action="addDoctor.php" method="POST">
                    <div class="mb-3">
                        <label for="doctorFirstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="doctorFirstName" name="first_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="doctorLastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="doctorLastName" name="last_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="doctorEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="doctorEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="doctorPhone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="doctorPhone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="doctorSpecialty" class="form-label">Specialty</label>
                        <input type="text" class="form-control" id="doctorSpecialty" name="specialty" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="doctorForm">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

</body>
</html>