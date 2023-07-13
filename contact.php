<?php
    include("includes/header.php");
    include("includes/conn.php");
?>
<!-- Contact Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Any Questions?</h5>
            <h1 class="display-4">Please Feel Free To Contact Us</h1>
        </div>
        <div class="row justify-content-center position-relative" style="z-index: 1;">
            <div class="col-lg-8">
                <div class="bg-white rounded p-5 mt-1 mb-0">
                    <form id="contactForm" method="POST" action="addPatientMessage.php">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" name="first_name" class="form-control bg-light border-0" placeholder="Your First Name" style="height: 55px;" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" name="last_name" class="form-control bg-light border-0" placeholder="Your Last Name" style="height: 55px;" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" name="email" class="form-control bg-light border-0" placeholder="Your Email" style="height: 55px;" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" name="phone" class="form-control bg-light border-0" placeholder="Your Phone Number" style="height: 55px;" required>
                            </div>
                            <div class="col-12">
                                <input type="text" name="subject" class="form-control bg-light border-0" placeholder="Subject" style="height: 55px;" required>
                            </div>
                            <div class="col-12">
                                <textarea name="message" class="form-control bg-light border-0" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="col-12">
                                <button id="contactSubmit" class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<!-- Start Contact Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModalLabel">Message Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Message sent successfully!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Contact Modal -->

</body>
</html>

<script>
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                $('#contactForm')[0].reset();
                $('#contactModal').modal('show');
            },
            error: function(err) {
                console.log(err);
            }
        });
    });
</script>

<?php
    include("includes/footer.php");
?>
