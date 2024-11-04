<?php
include('../Assets/Connections/Connection.php');
// session_start();
include('Head.php');

if (isset($_GET['bid'])) {
    $up = "UPDATE tbl_booking SET booking_status='" . $_GET['sts'] . "' WHERE booking_id=" . $_GET['bid'];
    if ($con->query($up)) {
        ?>
        <script>
            window.location = "ViewServiceBooking.php";
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Bookings</title>
</head>
<body>
    <h1>Service Bookings</h1>
    <form action="" method="post">
        <table>
            <tr>
                <th>#</th>
                <th>Service Name</th>
                <th>Service Amount</th>
                <th>User Name</th>
                <th>User Contact</th>
                <th>Booking Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php
            $sel = "SELECT *
                    FROM tbl_booking b 
                    INNER JOIN tbl_service s ON b.service_id = s.service_id 
                    INNER JOIN tbl_user m ON m.user_id = b.user_id 
                    WHERE s.artist_id = " . $_SESSION['aid'];
            $result = $con->query($sel);
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['service_name'] ?></td>
                    <td><?php echo $row['service_rate'] ?></td>
                    <td><?php echo $row['user_name'] ?></td>
                    <td><?php echo $row['user_contact'] ?></td>
                    <td><?php echo $row['booking_date'] ?></td>
                    <td>
                        <?php 
                        // Displaying status
                        if ($row['booking_status'] == 0) {
                            echo "Pending";
                        } elseif ($row['booking_status'] == 1) {
                            echo "Verified";
                        } elseif ($row['booking_status'] == 2) {
                            echo "Rejected";
                        } elseif ($row['booking_status'] == 3) {
                            echo "Advance Paid";
                        } elseif ($row['booking_status'] == 4) {
                            echo "Work Finished.Waiting  for Balance Amount";
                        } elseif ($row['booking_status'] == 5) {
                            echo "Balance Payment Recevied";
                        }
                        elseif ($row['booking_status'] == 6) {
                            echo "Service Completed.";
                        }
                        
                        ?>
                    </td>
                    <td>
                        <?php
                        // Action buttons based on status
                        if ($row['booking_status'] == 0) {
                            ?>
                            <a href="Reply.php?bid=<?php echo $row['booking_id']; ?>&sts=1">Verify</a>
                            <a href="ViewServiceBooking.php?bid=<?php echo $row['booking_id']; ?>&sts=2">Reject</a>
                            <?php
                        } elseif ($row['booking_status'] == 1) {
                            echo "Waiting for Advance Payment";
                        } elseif ($row['booking_status'] == 2) {
                            echo "Booking Rejected";
                        } elseif ($row['booking_status'] == 3) {
                            
                            ?>
                            <a href="ViewServiceBooking.php?bid=<?php echo $row['booking_id']; ?>&sts=4">Mark Work as Finished</a>
                            <?php
                        } elseif ($row['booking_status'] == 4) {
                            echo "Waiting for Balance Amount";

                        }
                        elseif ($row['booking_status'] == 5) {
                            ?>
                            <a href="ViewServiceBooking.php?bid=<?php echo $row['booking_id']; ?>&sts=6">Completed</a>
                            <?php
                            
                        }
                        elseif ($row['booking_status'] == 6) {
                            echo "Service Completed";

                        }
                        ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </form>
</body>
</html>
<?php 
include('Foot.php');
?>
