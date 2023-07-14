<?php
    include("../includes/loginCheck.php");
    include("../includes/dashboardHeader.php");
    include("../includes/conn.php");
?>

<!-- Patients Table -->
<div class="container my-5">
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Patients</h2>
                <!-- Add Patient Button -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPatientModal">
                  Add Patient
                </button>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Patient ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT patient_id, first_name, last_name, email, phone, date_of_birth FROM patients";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td>".$row["patient_id"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["email"]."</td><td>".$row["phone"]."</td><td>".date('d/m/Y', strtotime($row["date_of_birth"]))."</td><td>";
                                echo "<form action='helpers/deletePatient.php' method='post'><input type='hidden' name='id_to_delete' value='".$row["patient_id"]."'><button type='button' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editPatientModal".$row["patient_id"]."'>Edit</button> <button type='submit' name='delete' class='btn btn-danger btn-sm'>Delete</button></form></td></tr>";
                                echo '
                                <!-- Edit Patient Modal -->
                                <div class="modal fade" id="editPatientModal'.$row["patient_id"].'" tabindex="-1" aria-labelledby="editPatientModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editPatientModalLabel">Edit Patient</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="editPatientForm" action="helpers/editPatient.php" method="post">
                                                    <input type="hidden" name="patient_id" value="'.$row["patient_id"].'">

                                                    <div class="mb-3">
                                                        <label for="patientFirstName" class="form-label">First Name</label>
                                                        <input type="text" class="form-control" id="patientFirstName" name="first_name" value="'.$row["first_name"].'" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="patientLastName" class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" id="patientLastName" name="last_name" value="'.$row["last_name"].'" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="patientEmail" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="patientEmail" name="email" value="'.$row["email"].'" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="patientPhone" class="form-label">Phone</label>
                                                        <input type="text" class="form-control" id="patientPhone" name="phone" value="'.$row["phone"].'" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="patientDOB" class="form-label">Date of Birth</label>
                                                        <input type="date" class="form-control" id="patientDOB" name="date_of_birth" value="'.$row["date_of_birth"].'" required>
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
                            echo "No results found";
                        }

                        mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End Patients Table -->

<!-- Add Patient Modal -->
<div class="modal fade" id="addPatientModal" tabindex="-1" aria-labelledby="addPatientModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPatientModalLabel">Add Patient</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addPatientForm" action="helpers/addPatient.php" method="post">
                    <div class="mb-3">
                        <label for="patientFirstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="patientFirstName" name="first_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="patientLastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="patientLastName" name="last_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="patientEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="patientEmail" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="patientPhone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="patientPhone" name="phone" required>
                    </div>

                    <div class="mb-3">
                        <label for="patientDOB" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="patientDOB" name="date_of_birth" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Patient</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Patient Modal -->

</body>
</html>
