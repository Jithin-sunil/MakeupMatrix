<?php
include('../Assets/Connections/Connection.php');
// session_start();
include('Head.php');
if(isset($_POST['btnregister']))
 {
	 $name=$_POST["txtname"];
	 $photo=$_FILES['txtphoto']['name'];
	 $proof=$_FILES['upload']['name'];
	 $license=$_FILES['upload2']['name'];
	 
	 move_uploaded_file($_FILES['txtphoto']['tmp_name'],'../Assets/Files/Studio/Photo/'.$photo);
	  move_uploaded_file($_FILES['upload']['tmp_name'],'../Assets/Files/Studio/Photo/'.$proof);
	   move_uploaded_file($_FILES['upload2']['tmp_name'],'../Assets/Files/Studio/Photo/'.$license);
	 $insquery="INSERT INTO tbl_staff(staff_name,staff_photo,staff_proof,staff_license,studio_id,staff_djoin) VALUES('".$name."','".$photo."','".$proof."','".$license."','".$_SESSION['sid']."',curdate())";
	 if($con->query($insquery))
	 {
		 ?>
     <script>
       alert("Registered Successfully..");
       window.location="Staff.php";
     </script>
     <?php
	 }
 }
 if(isset($_GET['id']))
 {
  $delquery="Update tbl_staff set staff_status='0' WHERE staff_id='".$_GET['id']."'";
  if($con->query($delquery))
  {
    ?>
    <script>
      alert("Removed..");
      window.location="Staff.php";
    </script>
    <?php
  }
 }
	 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1">
    <tr>
      <td>Name</td>
     <td> <input type="text" name="txtname" id="txtname" /></td>
    
    
    <tr>
      <td>Photo</td>
      <td><label for="txtphoto"></label>
      <input type="file" name="txtphoto" id="txtphoto" /></td>
    </tr>
    <tr>
      <td>Proof</td>
      <td><label for="txtproof"></label>
        <label for="upload"></label>
      <input type="file" name="upload" id="upload" /></td>
    </tr>
    <tr>
      <td>License</td>
      <td><label for="txtlicense"></label>
        <label for="upload"></label>
      <input type="file" name="upload2" id="upload" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnregister" id="btnregister" value="Register" /></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
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
  $selquery="SELECT * FROM tbl_staff WHERE staff_status='1' and studio_id='".$_SESSION['sid']."'";
  $result=$con->query($selquery);
  while($row=$result->fetch_assoc())
  {
 ?>
  <tr>
    <td><?php echo $row['staff_name'];?></td>
    <td><img src="../Assets/Files/Studio/Photo/<?php echo $row['staff_photo'];?>" width="50" height="50" /></td>
    <td><img src="../Assets/Files/Studio/Photo/<?php echo $row['staff_proof'];?>" width="50" height="50" /></td>
    <td><img src="../Assets/Files/Studio/Photo/<?php echo $row['staff_license'];?>" width="50" height="50" /></td>
    <td><?php echo $row['staff_djoin']?></td>
    <td><a href="Staff.php?id=<?php echo $row['staff_id'];?>">Remove</a></td>
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