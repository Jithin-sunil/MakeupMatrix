<?php
include('../Assets/Connections/Connection.php');
// session_start();
include('Head.php');
if(isset($_POST['submit']))
{
    $up="update tbl_booking set booking_reply='".$_POST['txtreply']."' ,booking_status='".$_GET['sts']."' where booking_id=".$_GET['bid'];
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
    <title>Reply</title>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>Reply</td>
                <td><textarea name="txtreply" id="" cols="30"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
                
            </tr>
        </table>
    </form>
</body>
</html>
<?php
include('Foot.php');
?>