<?php
    include("../includes/dashboard_header.php");
    include("../includes/conn.php");
?>

<!-- Messages Table -->
<div class="container my-5">
    <div class="row">
        <div class="col">
            <h2 class="mb-4">Messages</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Message ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT message_id, first_name, last_name, email, phone, subject, message FROM messages";
                        $result = mysqli_query($conn, $sql);

                        $messages = array();

                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                $messages[] = $row;
                                echo "<tr><td>".$row["message_id"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["email"]."</td><td>".$row["phone"]."</td><td>";
                                echo "<form action='deleteMessage.php' method='post'><input type='hidden' name='id_to_delete' value='".$row["message_id"]."'><button type='button' class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#modal".$row["message_id"]."'>View</button><button type='submit' name='delete' class='btn btn-danger btn-sm'>Delete</button></form></td></tr>";
                            }                            
                        } else {
                            echo "No records found";
                        }

                        mysqli_free_result($result);

                        foreach ($messages as $message) {
                            echo '
                            <div class="modal fade" id="modal'.$message["message_id"].'" tabindex="-1" aria-labelledby="modalLabel'.$message["message_id"].'" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel'.$message["message_id"].'">Message from '.$message["first_name"].' '.$message["last_name"].'</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" style="max-width: 100%; word-wrap: break-word;">
                                            <h5>'.$message["subject"].'</h5>
                                            <p>'.$message["message"].'</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';                            
                        }

                        mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End Messages Table -->

<!-- Bootstrap and JS bundle includes Popper -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
