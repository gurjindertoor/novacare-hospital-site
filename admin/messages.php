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

<div class="container my-5">
    <div class="row">
        <div class="col">
            <h2 class="mb-4">Messages</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Sender</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Date</th>
                        <th scope="col">Message Preview</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>Regarding Appointment</td>
                        <td>12/07/2023</td>
                        <td>Lorem ipsum dolor sit amet, consectetur...</td>
                    </tr>
                    <!-- More rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>

</html>
