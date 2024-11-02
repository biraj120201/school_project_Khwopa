<?php require('inc/essentials.php'); ?>
<?php include('inc/db_config.php'); ?>
<?php include('inc/scripts.php'); ?>
<?php adminLogin(); ?>
<?php require('inc/links.php'); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $frm_data = filtration(($_POST)); // Sanitize the input

    // Handle individual "mark as read"
    if (isset($frm_data['seen'])) {
        $q = "UPDATE user_queries SET seen=? WHERE sr_no=?";
        $values = [1, $frm_data['seen']];
        if (update($q, $values, 'ii')) {
            alert('success', 'Marked as read');
        } else {
            alert('error', 'Operation Failed');
        }
    }

    // Handle individual delete
    if (isset($frm_data['del'])) {
        $q = "DELETE FROM user_queries WHERE sr_no=?";
        $values = [$frm_data['del']];
        if (delete($q, $values, 'i')) {
            alert('success', 'Data deleted');
        } else {
            alert('error', 'Operation Failed');
        }
    }

    // Handle "mark all as seen"
    if (isset($frm_data['seen_all'])) {
        $q = "UPDATE user_queries SET seen=?";
        $values = [1];
        if (update($q, $values, 'i')) {
            alert('success', 'Marked all as read');
        } else {
            alert('error', 'Operation Failed');
        }
    }

    // Handle "delete all"
    if (isset($frm_data['del_all'])) {
        $q = "DELETE FROM user_queries";
        if (mysqli_query($con, $q)) {
            alert('success', 'All data deleted');
        } else {
            alert('error', 'Operation Failed');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings Page - User Queries</title>
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
                    <h3 class="m-b-4">User Queries</h3>

                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">

                            <div class="mb-3 text-end">
                                <form method="POST" action="user_queries.php" style="display:inline;">
                                    <input type="hidden" name="seen_all" value="1">
                                    <button type="submit" class="btn btn-sm rounded-pill btn-primary me-2"><i class="bi bi-check2-all me-1"></i> Mark All as Read</button>
                                </form>
                                <form method="POST" action="user_queries.php" style="display:inline;">
                                    <input type="hidden" name="del_all" value="1">
                                    <button type="submit" class="btn btn-sm rounded-pill btn-danger"><i class="bi bi-trash3-fill me-1"></i> Delete All</button>
                                </form>
                            </div>

                            <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                                <table class="table table-hover border">
                                    <thead class="sticky-top">
                                        <tr class="bg-dark text-light">
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col" width="20%">Subject</th>
                                            <th scope="col" width="30%">Message</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $q = "SELECT * FROM user_queries ORDER BY sr_no DESC";
                                        $data = mysqli_query($con, $q);
                                        $i = 1;

                                        while ($row = mysqli_fetch_assoc($data)) {
                                            $seen = '';
                                            if ($row['seen'] != 1) {
                                                $seen .= "<form method='POST' action='user_queries.php' style='display:inline;'>
                                                            <input type='hidden' name='seen' value='{$row['sr_no']}'>
                                                            <button type='submit' class='btn btn-sm rounded-pill btn-primary me-2'>Mark as read</button>
                                                          </form>";
                                            }
                                            $seen .= "<form method='POST' action='user_queries.php' style='display:inline;'>
                                                        <input type='hidden' name='del' value='{$row['sr_no']}'>
                                                        <button type='submit' class='btn btn-sm rounded-pill btn-danger'>Delete</button>
                                                      </form>";
                                            echo <<<query
                                              <tr>
                                                <td>$i</td>
                                                <td>{$row['name']}</td>
                                                <td>{$row['email']}</td>
                                                <td>{$row['subject']}</td>
                                                <td>{$row['message']}</td>
                                                <td>{$row['date']}</td>
                                                <td>$seen</td>
                                              </tr>
                                            query;
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload = function() {
            // Prevent form resubmission on refresh
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }

            // Check for alerts and auto-dismiss them
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.classList.remove('show');
                    alert.remove();
                }, 3000);
            });
        };
    </script>
</body>

</html>