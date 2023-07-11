<?php
    include("../includes/dashboard_header.php");
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
</head>

<body>


<div class="container py-5">
    <div class="table-responsive">
        <h2 class="mb-4">Appointments</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Department</th>
                    <th scope="col">Doctor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John Doe</td>
                    <td>john.doe@example.com</td>
                    <td>2023-07-15</td>
                    <td>10:30 AM</td>
                    <td>Cardiology</td>
                    <td>Dr. Smith</td>
                </tr>
                <tr>
                    <td>Jane Doe</td>
                    <td>jane.doe@example.com</td>
                    <td>2023-07-20</td>
                    <td>2:00 PM</td>
                    <td>Neurology</td>
                    <td>Dr. Johnson</td>
                </tr>
                <!-- More rows... -->
            </tbody>
        </table>
    </div>
</div>



</body>

</html>