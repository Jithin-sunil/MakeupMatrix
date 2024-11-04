<?php
include('../Assets/Connections/Connection.php');
// session_start();
include('Head.php');
if(isset($_GET['bid']))
{
    $up="update tbl_booking set booking_status='".$_GET['sts']."' where booking_id=".$_GET['bid'];
    if($con->query($up))
    {
        ?>
        <script>
            window.location="ViewServiceBooking.php";
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
                <th>Booking Details</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php
            $sel = "SELECT *
                    FROM tbl_booking b 
                    INNER JOIN tbl_service s ON b.service_id = s.service_id 
                    INNER JOIN tbl_user m ON m.user_id = b.user_id 
                    LEFT JOIN tbl_assignstaff staff ON b.booking_id = staff.booking_id
                    WHERE s.studio_id = " . $_SESSION['sid'];
            $result = $con->query($sel);
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $s= "select * from tbl_assignstaff a inner join tbl_staff s on a.staff_id=s.staff_id where a.staff_id=".$row['staff_id'];
                $r= $con->query($s);
                $staff_name = $r->fetch_assoc()['staff_name'];
                $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['service_name'] ?></td>
                <td><?php echo $row['service_rate'] ?></td>
                <td><?php echo $row['user_name'] ?></td>
                <td><?php echo $row['user_contact'] ?></td>
                <td><?php echo $row['booking_date'] ?></td>
                <td><?php echo $row['booking_details'] ?></td>
                
                <td>
                    <?php 
                    // Displaying status
                    if ($row['booking_status'] == 0) {
                        echo "Pending";
                    } else if ($row['booking_status'] == 1) {
                        echo "Verified";
                    } else if ($row['booking_status'] == 2) {
                        echo "Rejected";
                    } else if ($row['booking_status'] == 3) {
                        echo "Advance Paid . Assigned to  ". $staff_name;
                    } else if ($row['booking_status'] == 4) {
                        echo "Work Finished";
                    } else if ($row['booking_status'] == 5) {
                        echo "Balance Payment Payed";
                    } else if ($row['booking_status'] == 6) {
                        echo "Completed";
                    } 
                    ?>
                </td>
                <td>
                    <?php
                    // Action buttons based on status
                    if ($row['booking_status'] == 0) {
                        ?>
                        <a href="Reply.php?bid=<?php echo $row['booking_id']; ?>">Verify</a>
                        <a href="ViewServiceBooking.php?bid=<?php echo $row['booking_id']; ?>&sts=2">Reject</a>
                        <?php
                    } else if ($row['booking_status'] == 1) {
                        echo "Waiting for Advance Payment";
                    } else if ($row['booking_status'] == 2) {
                        echo "Booking Rejected";
                    } else if ($row['booking_status'] == 3) {
                        ?>
                        <a href="ViewServiceBooking.php?bid=<?php echo $row['booking_id']; ?>&sts=4">Mark Work as Finished</a>
                        <?php
                    } else if ($row['booking_status'] == 4) {
                        echo "Waiting for Balance Amount ";
                    } else if ($row['booking_status'] == 5) {
                        ?>
                        <a href="ViewServiceBooking.php?bid=<?php echo $row['booking_id']; ?>&sts=6">Completed</a>
                        <?php
                    } else if ($row['booking_status'] == 6) {
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
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php 
include('Foot.php');
?>