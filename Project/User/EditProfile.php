<?php
include('../Assets/Connections/Connection.php');
$name='';
$email='';
$contact=0;


include('Head.php');
 $selqry="select * from tbl_user where user_id='".$_SESSION['uid']."' ";
	$res=$con->query($selqry);
	$data=$res->fetch_assoc();
	if(isset($_POST['btnedit']))
	{
		$name=$_POST['txtname'];
		$email=$_POST['txtname2'];
		$contact=$_POST['txtname3'];
		
		$updatequery="update tbl_user set user_name='".$name."',user_email='".$email."',user_contact='".$contact."' where user_id='".$_SESSION['uid']."'";
		$con->query($updatequery);
	}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EditProfile</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1">
    <tr>
      <td>Name</td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" value="<?php echo $data['user_name']?>" /></td>
    </tr>
    <tr>
      <td>Email ID</td>
      <td><label for="txtname2"></label>
      <input type="text" name="txtname2" id="txtname2" value="<?php echo $data['user_email']?>" /></td>
    </tr>
    <tr>
      <td>Contact Number</td>
      <td><label for="txtname3"></label>
      <input type="text" name="txtname3" id="txtname3" value="<?php echo $data['user_contact']?>" /></td>
    </tr>
    
    
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnedit"  value="Edit" />
      </div></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php 
include('Foot.php');
?>