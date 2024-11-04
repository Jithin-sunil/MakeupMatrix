<?php
include('../Assets/Connections/Connection.php');
include('Head.php');
$districtname='';
$eid=0;

       if(isset($_GET['eid']))
        {
	$selOneQry="SELECT * FROM tbl_district where district_id='".$_GET['eid']."'";
	$result=$con->query($selOneQry);
	$data=$result->fetch_assoc();
	$districtname=$data['district_name'];
	$eid=$data['district_id'];
       }
	   
if(isset($_POST['button']))
{
	$districtname=$_POST['txt_dist'];
	if($eid==0)
	   {
        $insertquery="INSERT INTO tbl_district(district_name) VALUES('".$districtname."')";
         if($con->query($insertquery))	
           {
	       echo"Record Inserted";
           }
	   }

   if($eid>0)
      {
	   $updatequery="update tbl_district set district_name='".$districtname."' where district_id=".$_GET['eid'];
	   if($con->query($updatequery))
	     {
		?>
        <script>
		alert('Updated Successfully');
		window.location="district.php";
		</script>
        <?php
         }
      }
}
if(isset($_GET['did']))
 {	

	$deletequery="DELETE FROM tbl_district WHERE district_id=".$_GET['did'];
	if($con->query($deletequery))
	{
		?>
        <script>
		alert('Deleted  Successfully');
		window.location="district.php";
		</script><?php }
 }?>   
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1">
    <tr>
      <td >District Name</td>
      <td ><label for="txt_dist"></label>
      <input type="text" name="txt_dist" id="txt_dist" value="<?php echo $districtname ?>"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"> <input type="submit" name="button" id="button" value="Submit" /></td>
    </tr>
  </table>
  </form>
  <table border="1">
    <tr>
      <td>#</td>
      <td>District</td>
      <td>Action</td>
    </tr>
    <tr>
	<?php
	$i=0;
	$selectquery="SELECT * FROM tbl_district";
	$result=$con->query($selectquery);
	while($data=$result->fetch_assoc())
      {
		  $i++;
		 ?>
         <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data['district_name']?></td>
      <td><a href="district.php?did=<?php echo $data['district_id']?>">Delete</a>
      <a href="district.php?eid=<?php echo $data['district_id']?>">Edit</a></td>
      <?php } ?>
     </tr> 
   </table>
</body>
</html>
<?php 
include('Foot.php');
?>