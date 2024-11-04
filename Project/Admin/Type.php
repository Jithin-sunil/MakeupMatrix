<?php
include('../Assets/Connections/Connection.php');
include('Head.php');
$typename='';
$eid=0;

       if(isset($_GET['eid']))
        {
	$selOneQry="SELECT * FROM tbl_type where type_id='".$_GET['eid']."'";
	$result=$con->query($selOneQry);
	$data=$result->fetch_assoc();
	$typename=$data['type_name'];
	$eid=$data['type_id'];
       }
	   
if(isset($_POST['button']))
{
	$typename=$_POST['txt_dist'];
	if($eid==0)
	   {
        $insertquery="INSERT INTO tbl_type(type_name) VALUES('".$typename."')";
         if($con->query($insertquery))	
           {
	      ?>
        <script>
           alert('Inserted Successfully');
           window.location="Type.php";
           </script>
   
        </script>
        <?php
           }
	   }

   if($eid>0)
      {
	   $updatequery="update tbl_type set type_name='".$typename."' where type_id=".$_GET['eid'];
	   if($con->query($updatequery))
	     {
		?>
        <script>
		alert('Updated Successfully');
		window.location="Type.php";
		</script>
        <?php
         }
      }
}
if(isset($_GET['did']))
 {	
  
	$deletequery="DELETE FROM tbl_type WHERE type_id=".$_GET['did'];
	if($con->query($deletequery))
	{
		?>
        <script>
		alert('Deleted  Successfully');
		window.location="Type.php";
		</script><?php }
 }?>   
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Type</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1">
    <tr>
      <td width="98">Type Name</td>
      <td width="174"><label for="txt_dist"></label>
      <input type="text" name="txt_dist" id="txt_dist" value="<?php echo $typename ?>"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"> <input type="submit" name="button" id="button" value="Submit" /></td>
    </tr>
  </table>
  </form>
  <table width="200" border="1">
    <tr>
      <td>#</td>
      <td>Type</td>
      <td>Action</td>
    </tr>
    <tr>
	<?php
	$i=0;
	$selectquery="SELECT * FROM tbl_type";
	$result=$con->query($selectquery);
	while($data=$result->fetch_assoc())
      {
		  $i++;
		 ?>
         <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data['type_name']?></td>
      <td><a href="Type.php?did=<?php echo $data['type_id']?>">Delete</a>
      <a href="Type.php?eid=<?php echo $data['type_id']?>">Edit</a></td>
      <?php } ?>
     </tr> 
   </table>
</body>
</html>
<?php 
include('Foot.php');
?>