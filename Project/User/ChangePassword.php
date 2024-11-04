
<?php
include('../Assets/Connections/Connection.php');
$oldpassword='';
$newpassword='';
$confirmpassword='';
// session_start();
include('Head.php');
if(isset($_POST['btnchange']))
{
	$oldpassword=$_POST['txtpwd'];
	$newpassword=$_POST['txtnewpwd'];
	$confirmpassword=$_POST["txtretypepwd"];

	$selquery="select * from tbl_artist where artist_password='".$oldpassword."' and artist_id='".$_SESSION['aid']."'";
	$res=$con->query($selquery);
	if($data=$res->fetch_assoc())
	{
		if($newpassword==$confirmpassword)
		{
			$updatequery="update tbl_artist set artist_password='".$newpassword."' where artist_id='".$_SESSION['aid']."'";
			$con->query($updatequery);
			echo "password updated";
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>ChangePassword</title>
</head>

<body>
  
<form id="form1" name="form1" method="post" action="">
  <table border="1">
    <tr>
      <td>Old password</td>
      <td><label for="txtpwd"></label>
      <input type="text" name="txtpwd" id="txtpwd" /></td>
    </tr>
    <tr>
      <td>New password</td>
      <td><label for="txtnewpwd"></label>
      <input type="text" name="txtnewpwd" id="txtnewpwd" /></td>
    </tr>
    <tr>
      <td>Re-type password</td>
      <td><label for="txtretypepwd"></label>
      <input type="text" name="txtretypepwd" id="txtretypepwd" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnchange" value="ChangePassword"/>
        <input type="reset" name="btncancel"  value="cancel" />      </tr>
  </table>
</form>
</body>
</html>
<?php 
include('Foot.php');
?>