<?php
    include("../includes/dashboard_header.php");
    include("../includes/conn.php");
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
            <h2 class="mb-4">Patients</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Patient ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Number of Appointments</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT patient_id, name, email, phone, date_of_birth, number_of_appts FROM patients";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>".$row["patient_id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["phone"]."</td><td>".date('d/m/Y', strtotime($row["date_of_birth"]))."</td><td>".$row["number_of_appts"]."</td></tr>";
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


</body>

</html>
