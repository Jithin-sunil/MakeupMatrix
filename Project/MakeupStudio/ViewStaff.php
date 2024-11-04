<?php
include('../Assets/Connections/Connection.php');
include('Head.php');

if(isset($_GET['aid']))
{
  $ins="insert into tbl_assignstaff (staff_id,booking_id,assign_date)values('".$_GET['aid']."','".$_GET['bid']."',curdate())";
  if($con->query($ins))
  {
    $up="update tbl_booking set booking_status='3' where booking_id=".$_GET['bid'];
    $con->query($up);
    ?>
    <script>
      alert('Staff Assigned..');
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
    <title>Document</title>
</head>
<body>
<table>
  <tr>
    <td>Name</td>
    <td>Photo</td>
    <td>Proof</td>
    <td>License</td>
    <td>Date of Join</td>
    <td>Action</td>
  </tr>
  <?php
  $selquery="SELECT * FROM tbl_staff WHERE studio_id='".$_SESSION['sid']."'";
  $result=$con->query($selquery);
  while($row=$result->fetch_assoc())
  {
 
    
 ?>
  <tr>
    <td><?php echo $row['staff_name'];?></td>
    <td><img src="../Assets/Files/Studio/Images/<?php echo $row['staff_photo'];?>" width="50" height="50" /></td>
    <td><img src="../Assets/Files/Studio/Photo/<?php echo $row['staff_proof'];?>" width="50" height="50" /></td>
    <td><img src="../Assets/Files/Studio/Photo/<?php echo $row['staff_license'];?>" width="50" height="50" /></td>
   <td><?php echo $row['staff_djoin']?></td>
   <td><?php   
     $sel="select * from tbl_assignstaff where staff_id=".$row['staff_id'];
     $res=$con->query($sel);
     $rowS=$res->fetch_assoc();
      if(empty($rowS['assign_status']) || $rowS['assign_status']==0)
    {
      
      ?>
      <a href="ViewStaff.php?aid=<?php echo $row['staff_id']?>&bid=<?php echo  $_GET['bid']?>">Assign</a>
      <?php
    }
    else
    {
      echo  "Unavailable ";
    }
    ?></td>
    
  </tr>
  <?php
  }

  ?>
</table>
</body>
</html>
<?php 
include('Foot.php');
?>