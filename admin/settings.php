<?php
    include("../includes/loginCheck.php");
    include("../includes/dashboardHeader.php");
?>

<!-- Account Settings -->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-4">Account Settings</h2>
            <form method="post" action="helpers/updateSettings.php">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
<!-- End Account Settings -->

</body>
</html>
