<?php
    include("../includes/admin_header.php");
    include("../includes/conn.php");
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['pwd']);

        $sql = "SELECT admin_id FROM admin WHERE email = '$email' and password = '$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);

        // If result matched $email and $password, table row must be 1 row
        if ($count == 1) {
            $_SESSION['login_user'] = $email;
            header("location: dashboard.php");
        } else {
            $error = "Your Login Name or Password is invalid";
            echo $error;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>NovaCare</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">

	<style>
        body {
            background-color: #f0f0f0; /* light grey */
        }
        #title {
            color: #333; /* dark grey */
        }
    </style>
</head>

<body>
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
                                    <div class="form-group">
                                        
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="control-label">Email</label>
                                        <input name="email" id="email" type="email" class="form-control rounded-0" placeholder="Email address" autofocus="" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="control-label">Password</label>
                                        <input type="password" class="form-control rounded-0" id="password" name="pwd" placeholder="Password" required>
                                    </div>  
                                    <div class="d-grid">
                                        <button type="submit" name="login" class="btn btn-primary rounded-0">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</body>
