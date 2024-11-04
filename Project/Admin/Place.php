<?php
include('../Assets/Connections/Connection.php');
include('Head.php');
if(isset($_POST['btn_save']))
{
	$district_id=$_POST['dist_list'];
	 $place=$_POST['place_name'];
	 
$insertquery="INSERT INTO tbl_place(district_id,place_name) VALUES('".$district_id."','".$place."')";
         if($con->query($insertquery))	
           {
	       echo"Record Inserted";
           }
	   }

    if(isset($_GET['did']))
    {
      $del="Delete from tbl_place where place_id=".$_GET['did'];
      if($con->query($del))
      {
        ?>
        <script>
          alert('Record deleted');
          window.location='Place.php';
        </script>
        <?php
      }

    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1">
    <tr>
      <td >District</td>
      <td>
        <select name="dist_list">
        <option>---select---</option>
        <?php 
		$selectquery="SELECT * FROM tbl_district";
		$result=$con->query($selectquery);
		while($row=$result->fetch_assoc())
		{
		
		?>
        <option value="<?php echo $row['district_id']?>"> <?php echo $row['district_name']?></option>
        <?php
		}
		?>
       
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="place_name"></label>
      <input type="text" name="place_name" id="place_name" /></td>
    </tr>
    <tr>
      <td colspan="2"align="center"><input name="btn_save" type="submit" id="Save" value="Save"/></td>
    </tr>
  </table>
  <table>
  <tr>
  <th>District Name</th>
  <th>Place</th>
  <th>Action</th>
  </tr>
  <?php
	$selectquery="select * from tbl_place p inner join tbl_district d where d.district_id=p.district_id";
	$result=$con->query($selectquery);
	while($data=$result->fetch_assoc())
      { ?>
<tr>
<td><?php echo $data['district_name']?>
</td>
<td><?php echo $data['place_name']?>  
</td>
<td><a href="Place.php?did=<?php echo $data['place_id']?>">Delete</a></td>
</tr>     
   <?php }?>
  </table>
  
</form>
</body>
</html>

<?php 
include('Foot.php');
?>