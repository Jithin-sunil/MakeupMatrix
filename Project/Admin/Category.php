<?php
include('../Assets/Connections/Connection.php');
include('Head.php');
$categoryname='';
$eid=0;

 if(isset($_GET['eid']))
        {
	$selOneQry="SELECT * FROM tbl_category where category_id='".$_GET['eid']."'";
	$result=$con->query($selOneQry);
	$data=$result->fetch_assoc();
	$categoryname=$data['category_name'];
	$eid=$data['category_id'];
		}

if(isset($_POST['btnsave']))
{
	$categoryname=$_POST['txtname'];
	if($eid==0)
	   {
      $photo = $_FILES["txt_photo"]["name"];
      $path = $_FILES["txt_photo"]["tmp_name"];
      move_uploaded_file($path,"../Assets/Files/Category/".$photo);
        $insertquery="INSERT INTO tbl_category(category_name,Category_image) VALUES('".$categoryname."','".$photo."')";
         if($con->query($insertquery))	
           {
	      
            ?>
             <script>
             alert('Inserted Successfully');
             window.location="Category.php";
             </script>
             <?php
  
           }
	   }

   if($eid>0)
      {
	   $updatequery="update tbl_category set category_name='".$categoryname."' where category_id='".$_GET['eid']."'";
	   if($con->query($updatequery))
	     {
		?>
        <script>
		alert('Updated Successfully');
		window.location="Category.php";
		</script>
        <?php
         }
      }
}

if(isset($_GET['did']))
{	
$deletequery="DELETE FROM tbl_category WHERE category_id='".$_GET['did']."'";
if($con->query($deletequery))
{
	?>
        <script>
		alert('Deleted Successfully');
		window.location="Category.php";
		</script>
        <?php
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Category</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table  border="1">
    <tr>
      <td >Category Name</td>
      <td ><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" value="<?php echo $categoryname ?>"></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><input type="file" name="txt_photo" id=""></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Save">
     
        <input type="submit" name="btncancel" id="btncancel" value="Cancel">
      </td>
    </tr>
  </table>
  <table width="233" border="1">
    <tr>
      <td width="48">SlNo</td>
      <td width="70">Category</td>
      <td width="70">Photo</td>
      <td width="93">Action</td>
    </tr>
    <?php
	$i=0;
	$selectquery="SELECT * FROM tbl_category";
	$result=$con->query($selectquery);
	while($data=$result->fetch_assoc())
	{
		$i++;
		?>
        <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data['category_name']?></td>
      <td><img src="../Assets/Files/Category/<?php echo $data["Category_image"]?>" width="100" alt=""></td>
      <td><a href="category.php?did=<?php echo $data['category_id']?>">Delete</a>
      <!-- <a href="category.php?eid=<?php echo $data['category_id']?>">Edit</a></td> -->
  
      <?php } ?>
    </tr>
  </table>
</form>
</body>
</html>
<?php 
include('Foot.php');
?>