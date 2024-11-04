<?php
include('../Assets/Connections/Connection.php');
// session_start();
include('Head.php');
if(isset($_POST['submit']))
{
    $date = $_POST['txt_date'];
    $time = $_POST['txt_time'];
    $details = $_POST['txt_details'];
    $address = $_POST['txt_address'];
    $Ins=" insert into tbl_booking (booking_todate,booking_totime,booking_details,booking_address,user_id,service_id,booking_date)
    values('".$date."','".$time."','".$details."','".$address."','".$_SESSION['uid']."','".$_GET['sid']."',curdate()) ";
    if($con->query($Ins))
    {
        ?>
        <script>
            alert('Booking Successful');
            window.location='MyServiceBooking.php';
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
    <title>Document</title>
    <link rel="stylesheet" href="../Assets/Templates/form.css">
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>For Date</td>
                <td><input type="date" name="txt_date" min="<?php echo date('Y-m-d')?>" id=""></td>
            </tr>
            <tr>
                <td>For Time</td>
                <td><input type="time" name="txt_time" id=""></td>
            </tr>
            <tr>
                <td>Details</td>
                <td><textarea name="txt_details" id=""></textarea></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea name="txt_address" id=""></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
                <td></td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php 
include('Foot.php');
?>