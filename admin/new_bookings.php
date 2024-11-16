<?php require('inc/essentials.php'); ?>
<?php include('inc/db_config.php'); ?>
<?php include('inc/scripts.php'); ?>
<?php adminLogin(); ?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel -New Bookings</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <?php require('css/style.php'); ?>
</head>

<body class="bg-light">
    <?php require('inc/header.php'); ?>
    <div>
        <div class="container-fluid" id="main-content">
            <div class="row">
                <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                    <h3 class="m-b-4">New Bookings</h3>

                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <div class="text-end mb-4">
                                <input type="text" oninput="search_user(this.value)" class="form-control shadow-none w-25 ms-auto" placeholder="Type to search">
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover border ">
                                    <thead>
                                        <tr class="bg-dark text-light">
                                            <th scope="col">#</th>
                                            <th scope="col">User Details</th>
                                            <th scope="col">Room Details</th>
                                            <th scope="col">Booking Details</th>
                                            <th scope="col">Actions</th> <!-- Changed this to "Actions" -->
                                        </tr>

                                    </thead>
                                    <tbody id="table-data">
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
<!--assign room modal-->
    <div class="modal fade" id="assign-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="assign_room_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Assign Room</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Room Number</label>
                            <input type="text" name="feature_name" class="form-control shadow-none" required>
                        </div>
                        <span class="badge bg-light text-dark mb-3 text-wrap lh-base">
                            Note: Assign Room number only when user has been arrived.
                        </span>
                        <input type="hidden" name="booking_id">
                    </div> <!-- This closes the modal body -->
                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary text-dark shadow-none btn-warning" data-bs-dismiss="modal">CANCEL</button>
                        <button type="submit" class="btn text-secondary text-dark shadow-none custom-bg">SUBMIT</button>
                    </div>
                </div> <!-- Close modal-content -->
            </form>
        </div>
    </div>




    <script src="scripts/new_bookings.js"></script>

</body>

</html>