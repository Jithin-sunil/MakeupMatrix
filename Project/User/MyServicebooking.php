<?php
include('../Assets/Connections/Connection.php');
// session_start();
include('Head.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Service Bookings</title>
</head>
<body>
    <h1>My Service Bookings</h1>
    
    <!-- Makeup Studio Bookings -->
    <h2>Makeup Studio Bookings</h2>
    <form action="" method="post">
        <table>
            <tr>
                <th>#</th>
                <th>Service Name</th>
                <th>Service Amount</th>
                <th>Studio Name</th>
                <th>Studio Address</th>
                <th>Studio Contact</th>
                <th>Status</th>
                <th>Action</th> 
            </tr>
            <?php   
            $sel_studio = "SELECT * 
                           FROM tbl_booking b 
                           INNER JOIN tbl_service s ON b.service_id = s.service_id 
                           INNER JOIN tbl_makeupstudio m ON m.studio_id = s.studio_id 
                           WHERE user_id = " . $_SESSION['uid'];
            $result_studio = $con->query($sel_studio);
            $i = 0;
            while($row = $result_studio->fetch_assoc()) {
                $service_name = $row['service_name'];
        $service_rate = $row['service_rate'];
        $advance_amount = $service_rate * 0.25; 
                $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['service_name']; ?></td>
                    <td><?php echo $row['service_rate']; ?></td>
                    <td><?php echo $row['studio_name']; ?></td>
                    <td><?php echo $row['studio_address']; ?></td>
                    <td><?php echo $row['studio_contact']; ?></td>
                    <td>
                        <?php 
                        // Determine booking status
                        if ($row['booking_status'] == 0) {
                            echo "Pending";
                        } elseif ($row['booking_status'] == 1) {
                            echo $row['booking_reply'];

                            echo "  /Pay Advance ".$advance_amount."Rs";
                        } elseif ($row['booking_status'] == 2) {
                            echo "Rejected";
                        } elseif ($row['booking_status'] == 3) {
                            echo "Advance Paid";
                        } elseif ($row['booking_status'] == 4) {
                            echo "Work Finished.Pay Balance Amount/".$advance_amount-$service_rate ;
                        } elseif ($row['booking_status'] == 5) {
                            echo "Balance Payment Payed";
                        } elseif ($row['booking_status'] == 6) {
                            echo "Completed";
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        // Determine booking actions
                        if ($row['booking_status'] == 1) { 
                            ?>
                            <a href="Payment.php?bid=<?php echo $row['booking_id'] ?>&sts=3">Advance</a>
                            <?php
                        } elseif ($row['booking_status'] == 4) { 
                            ?>
                            <a href="Payment.php?bid=<?php echo $row['booking_id']; ?>&sts=5">Pay</a>
                            <?php
                        } elseif ($row['booking_status'] == 6) {
                            echo "Service Completed";
                            ?>
                            <a href="StudioReview.php?sid=<?php echo $row['studio_id']?>">Review</a>
                            <?php
                        } 
                        ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </form>

    <!-- Artist Bookings -->
    <h2>Artist Bookings</h2>
    <form action="" method="post">
        <table>
            <tr>
                <th>#</th>
                <th>Service Name</th>
                <th>Service Amount</th>
                <th>Artist Name</th>
                <th>Artist Contact</th>
                <th>Status</th>
                <th>Action</th> 
            </tr>
            <?php   
            $sel_artist = "SELECT * 
                           FROM tbl_booking b 
                           INNER JOIN tbl_service s ON b.service_id = s.service_id 
                           INNER JOIN tbl_artist a ON a.artist_id = s.artist_id 
                           WHERE user_id = " . $_SESSION['uid'];
            $result_artist = $con->query($sel_artist);
            $j = 0;
            while($row = $result_artist->fetch_assoc()) {
                $service_name = $row['service_name'];
        $service_rate = $row['service_rate'];
        $advance_amount = $service_rate * 0.25; 
                $j++;
                ?>
                <tr>
                    <td><?php echo $j; ?></td>
                    <td><?php echo $row['service_name']; ?></td>
                    <td><?php echo $row['service_rate']; ?></td>
                    <td><?php echo $row['artist_name']; ?></td>
                    <td><?php echo $row['artist_contact']; ?></td>
                    <td>
                        <?php 
                        // Determine booking status
                        if ($row['booking_status'] == 0) {
                            echo "Pending";
                        } elseif ($row['booking_status'] == 1) {
                            echo $row['booking_reply'];

                            echo "  /Pay Advance ".$advance_amount."Rs";
                        } elseif ($row['booking_status'] == 2) {
                            echo "Rejected";
                        } elseif ($row['booking_status'] == 3) {
                            echo "Advance Paid";
                        } elseif ($row['booking_status'] == 4) {
                            echo "Work Finished.Pay Balance Amount/".$advance_amount-$service_rate ;
                        } elseif ($row['booking_status'] == 5) {
                            echo "Balance Payment Payed";
                        } elseif ($row['booking_status'] == 6) {
                            echo "Completed";
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        // Determine booking actions
                        if ($row['booking_status'] == 1) { 
                            ?>
                            <a href="Payment.php?bid=<?php echo $row['booking_id'] ?>&sts=3">Advance</a>
                            <?php
                        } elseif ($row['booking_status'] == 4) { 
                            ?>
                            <a href="Payment.php?bid=<?php echo $row['booking_id']; ?>&sts=5">Pay</a>
                            <?php
                        } elseif ($row['booking_status'] == 6) {
                            echo "Service Completed";
                            ?>
                            <a href="ArtistReview.php?sid=<?php echo $row['artist_id']?>">Review</a>
                            <?php
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
