<?php
include('../Assets/Connections/Connection.php');
include('Head.php');
$name='';
$email='';
$password='';
$eid=0;
 if(isset($_GET['Eid']))
        {
	$selOneQry="SELECT * FROM adminreg where admin_id='".$_GET['Eid']."'";
	$result=$con->query($selOneQry);
	$data=$result->fetch_assoc();
	$name=$data["admin_name"];
	$email=$data["admin_email"];
	$password=$data["admin_password"];
	$eid=$data["admin_id"];
       }
	   
if(isset($_POST['button']))
{
	$name=$_POST['txt_name'];
	$email=$_POST['txt_email'];
	$password=$_POST['txt_pswrd'];
	if($eid==0)
	   {
        $insertquery="INSERT INTO adminreg(admin_name,admin_email,admin_password) VALUES('".$name."','".$email."','".$password."')";
         if($con->query($insertquery))	
           {
	       echo "Record Inserted";
           }
	   }

   if($eid>0)
      {
		  echo $_GET['Eid'];
	   $updatequery="update adminreg set admin_name='".$name."',admin_email='".$email."', admin_password='".$password."' where admin_id='".$_GET['Eid']."'";
	   if($con->query($updatequery))
	     {
		?>
        <script>
		alert('Updated Successfully');
		//window.location="admin.php";
		</script>
        <?php
         }
  
	  }}
if(isset($_GET['did']))
 {	
	$deletequery="DELETE FROM adminreg WHERE admin_id='".$_GET['did']."'";
	if($con->query($deletequery))
	{
		?>
        <script>
		alert('Deleted  Successfully');
		//window.location="admin.php";
		</script><?php
   } 
 }?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Registration</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="256" border="1">
    <tr>
      <td width="103">NAME</td>
      <td width="137"><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $name ?>" /></td>
    </tr>
    <tr>
      <td>EMAIL</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" value="<?php echo $email ?>" /></td>
    </tr>
    <tr>
      <td>PASSWORD</td>
      <td><label for="txt_pswrd"></label>
      <input type="text" name="txt_pswrd" id="txt_pswrd" value="<?php echo $password ?>" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="button" id="button" value="Submit" />
      <br /> </td>
    </tr>
  </table>
  <table width="200" border="1">
    <tr>
      <td><p>Id</p></td>
      <td>NAME</td>
      <td>EMAIL</td>
      <td>PASSWORD</td>
      <td>ACTION</td>
    </tr>
    <tr>
      	<?php
		$i=0;
	$selectquery="select * from adminreg";
	$result=$con->query($selectquery);
	while($data=$result->fetch_assoc())
      {
		  $i++;
		 ?>
         <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data['admin_name']?></td>
      <td><?php echo $data['admin_email']?></td>
      <td><?php echo $data['admin_password']?></td>
	  <td><a href="admin.php?did=<?php echo $data['admin_id']?>">Delete</a>
      <a href="admin.php?Eid=<?php echo $data['admin_id']?>">Edit</a></td> 
      </tr> 
        <?php } ?> 
   
  </table>
</form>
</body>
</html>
<?php
include('Foot.php');