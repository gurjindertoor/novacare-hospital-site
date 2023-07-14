<?php
    include("../includes/adminHeader.php");
    include("../includes/conn.php");

    session_start(); // Starts the session

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['pwd']);

        $sql = "SELECT admin_id, first_name, last_name, email, password FROM admin WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);

        if ($count == 1) {
            if (password_verify($password, $row['password'])) {
                // Store session data
                $_SESSION['admin_id'] = $row['admin_id'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['logged_in'] = true;

                header("location: appointments.php");
                exit;
            } else {
                $error = "Your Login Name or Password is invalid";
                echo $error;
            }
        } else {
            $error = "Your Login Name or Password is invalid";
            echo $error;
        }
    }
?>

<!-- Admin Login -->
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-lg-4 col-md-5 col-sm-10 col-12">
            <div class="form-container">
                <h1 class="text-center my-4 py-3" id="title">NovaCare Admin Login</h1>
                <div class="card rounded-0 shadow">
                    <div class="card-header">
                        <div class="card-title h3 text-center mb-0 fw-bold">Login</div>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <form method="post" action="">
                                <div class="form-group"></div>
                                <div class="mb-3">
                                    <label for="email" class="control-label">Email</label>
                                    <input name="email" id="email" type="email" class="form-control rounded-0" placeholder="Email address" autofocus="" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="control-label">Password</label>
                                    <input type="password" class="form-control rounded-0" id="password" name="pwd" placeholder="Password" required>
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" name="login" class="btn btn-primary rounded-0">Login</button>
                                    <!-- Trigger the Forgot Password modal with a button -->
                                    <button type="button" class="btn btn-link rounded-0" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">Forgot Password?</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Admin Login -->

<!-- Modal for Forgot Password -->
<div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forgotPasswordModalLabel">Forgot Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="forgotPasswordForm" action="javascript:submitEmail();">
                    <div class="mb-3">
                        <label for="forgotEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="forgotEmail" name="email" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="forgotPasswordForm">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal for Forgot Password -->

<script>
  function submitEmail() {
    alert("Thank you, instructions have been sent via email if account exists.");

    // After alert, hide the modal
    const myModalEl = document.getElementById('forgotPasswordModal');
    const modal = bootstrap.Modal.getInstance(myModalEl);
    modal.hide();
  }
</script>

</body>
</html>