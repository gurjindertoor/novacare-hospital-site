<?php
  include("includes/header.php");
?>

<!-- Appointment Start -->
<div class="container-fluid bg-primary my-5 py-5">
    <div class="container py-5">
        <div class="row gx-5">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="mb-4">
                    <h5 class="d-inline-block text-white text-uppercase border-bottom border-5">Appointment</h5>
                    <h1 class="display-4">Make An Appointment For You or Your Family</h1>
                </div>
                <p class="text-white mb-5">Booking an appointment for yourself or your family is hassle-free with our user-friendly online appointment form, allowing you to schedule your visit at your convenience. Our streamlined booking process ensures a seamless experience, saving you time and effort. Experience the ease of securing an appointment with our hospital, where your health and well-being are our top priorities.</p>
                <a class="btn btn-outline-dark rounded-pill py-3 px-5" href="search.php">Find Doctor</a>
            </div>
            <div class="col-lg-6">
                <div class="bg-white text-center rounded p-5">
                    <h1 class="mb-4">Book An Appointment</h1>
                    <form id="appointmentForm" method="POST" action="addPatientAppointment.php">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" name="first_name" class="form-control bg-light border-0" placeholder="Your First Name" style="height: 55px;" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" name="last_name" class="form-control bg-light border-0" placeholder="Your Last Name" style="height: 55px;" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" onfocus="(this.type='date')" id="dob" name="date_of_birth" class="form-control bg-light border-0" placeholder="Your Date of Birth" style="height: 55px;" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" name="email" class="form-control bg-light border-0" placeholder="Your Email" style="height: 55px;" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" name="phone" class="form-control bg-light border-0" placeholder="Your Phone Number" style="height: 55px;" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" onfocus="(this.type='date')" id="appointment_date" name="appointment_date" class="form-control bg-light border-0" placeholder="Appointment Date" style="height: 55px;" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <select name="time" class="form-select bg-light border-0" style="height: 55px;" required>
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
                            <div class="col-12 col-sm-6">
                                <select name="doctor" class="form-select bg-light border-0" style="height: 55px;" required>
                                    <option value="" selected>Select Doctor</option>
                                    <option value="Dr. Emilio Ramirez">Dr. Emilio Ramirez</option>
                                    <option value="Dr. Olivia Johnson">Dr. Olivia Johnson</option>
                                    <option value="Dr. Emily Roberts">Dr. Emily Roberts</option>
                                    <option value="Dr. Malik Anderson">Dr. Malik Anderson</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Make An Appointment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Appointment End -->

<!-- Start Appointment Modal -->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="messageModalLabel">Appointment Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Message will be inserted here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Appointment Modal -->

<script type="text/javascript">
    $(document).ready(function() {
        let today = new Date();
        let dd = String(today.getDate()).padStart(2, '0');
        let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        let yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("dob").setAttribute("max", today);

        // Define tomorrow's date
        let tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        let dd_tomorrow = String(tomorrow.getDate()).padStart(2, '0');
        let mm_tomorrow = String(tomorrow.getMonth() + 1).padStart(2, '0'); //January is 0!
        let yyyy_tomorrow = tomorrow.getFullYear();

        tomorrow = yyyy_tomorrow + '-' + mm_tomorrow + '-' + dd_tomorrow;

        document.getElementById("appointment_date").setAttribute("min", tomorrow); // setting min date as tomorrow

        $('#dob').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false
        });

        $('#appointment_date').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false
        });

        $('#time').datetimepicker({
            format: 'HH:mm',
            useCurrent: false
        });

        // When the appointment date changes, fetch the available times
        $('#appointment_date').on('change', function() {
            const date = $(this).val();

            $.ajax({
                url: "fetchAvailableTimes.php",
                type: "POST",
                data: { date: date },
                success: function(response) {
                    const data = JSON.parse(response);
                    const timeSelect = $('select[name="time"]');
                    
                    // Empty the dropdown
                    timeSelect.empty();
                    
                    // Add the default option
                    timeSelect.append('<option value="" selected>Appointment Time</option>');
                    
                    // Add each available time slot
                    data.forEach(function(time) {
                        timeSelect.append('<option value="' + time + '">' + time + '</option>');
                    });
                }
            });
        });

        document.getElementById('appointmentForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Map of doctors to departments
            const doctorDepartments = {
                "Dr. Emilio Ramirez": "General Medicine",
                "Dr. Olivia Johnson": "OB/GYN",
                "Dr. Emily Roberts": "Pediatrics",
                "Dr. Malik Anderson": "Cardiology"
            };

            // Get selected doctor
            const selectedDoctor = $('select[name="doctor"]').val();

            // Add department to form data
            const formData = $("#appointmentForm").serialize() + "&department=" + doctorDepartments[selectedDoctor];

            $.ajax({
                url: "addPatientAppointment.php",
                type: "POST",
                data: formData,
                success: function(response) {
                    const data = JSON.parse(response);

                    if (data.statusCode === 201) {
                        // appointment already exists
                        $('.modal-body').html("The appointment is not available. Please choose another date or time.");
                        $('#messageModal').modal('show');
                    } else {
                        // appointment doesn't exist, can be added
                        $('.modal-body').html("Appointment successfully scheduled!");
                        $('#messageModal').modal('show');
                        setTimeout(function() {
                            document.getElementById('appointmentForm').reset();
                        }, 100);
                    }
                }
            });
        });
    });
</script>

<?php
  include("includes/footer.php");
?>
