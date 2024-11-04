<?php
include('../Assets/Connections/Connection.php');	
// session_start();
include('Head.php');
	$selqry="select * from tbl_makeupstudio u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where studio_id='".$_SESSION['sid']."' ";
	$res=$con->query($selqry);
	$data=$res->fetch_assoc();
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1">
   <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>Name</td>
      <td><?php echo $data['studio_name']?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data['studio_email']?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data['studio_contact']?></td>
    </tr>
   
    <tr>
      <td>District</td>
      <td><?php echo $data['district_name']?></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><?php echo $data['place_name']?></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><a href="EditProfile.php">EditProfile</a> <a href="ChangePassword.php">ChangePassword</a></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php 
include('Foot.php');
?>