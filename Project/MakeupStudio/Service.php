<?php
include('../Assets/Connections/Connection.php');
// session_start();
include('Head.php');
// session_start();
if(isset($_POST['btn_submit']))
{
    $name=$_POST['txt_name'];
    $details=$_POST['txt_details'];
    $subcat=$_POST['sel_subcategory'];
    $rate=$_POST['txt_rate'];
    $photo=$_FILES['file_photo']['name'];
    $temp=$_FILES['file_photo']['tmp_name'];
    move_uploaded_file($temp,'../Assets/Files/Services/'.$photo);
    $ins="insert into tbl_service (service_name,service_description,subcategory_id,service_rate,service_image,studio_id)
    values('".$name."','".$details."','".$subcat."','".$rate."','".$photo."','".$_SESSION['sid']."')";
    if($con->query($ins))
    {
        ?>
        <script>
            alert("Inserted");
            window.location="Service.php";
        </script>
        <?php
    }
}

if(isset($_GET['did']))
{
    $delqry="delete from tbl_service where service_id=".$_GET['did'];
    if($con->query($delqry))
    {
        ?>
        <script>
            alert("Removed");
            window.location="Service.php";
        </script>
        <?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="txt_name" id=""></td>
            </tr>
            <tr>
                <td>Details</td>
                <td><textarea name="txt_details" id="" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td>Category</td>
                <td><select name="sel_category" id="sel_category" onchange="getSubcat(this.value)">
                    <option value="">--Select--</option>
                    <?php
                    $sel="select * from tbl_category";
                    $res=$con->query($sel);
                    while($row=$res->fetch_assoc())
                    {
                        ?>
                        <option value="<?php echo $row['category_id']?>"><?php echo $row['category_name']?></option>
                        <?php
                    }
                    ?>
                </select></td>
            </tr>
            <tr>
                <td>SubCategory</td>
                <td><select name="sel_subcategory" id="sel_subcategory">
                    <option value="">--Select--</option>
                </select></td>
            </tr>
            
            <!-- <tr>
                <td>Type</td>
                <td><select name="sel_type" id="sel_type">
                    <option value="">--Select--</option>
                    <?php
                    $sel="select * from tbl_type";
                    $res=$con->query($sel);
                    while($row=$res->fetch_assoc())
                    {
                        ?>
                        <option value="<?php echo $row['type_id']?>"><?php echo $row['type_name']?></option>
                        <?php
                    }
                    ?>
                </select></td>
            </tr> -->
            <tr>
                <td>Rate</td>
                <td><input type="text" name="txt_rate" id=""></td>
            </tr>
            <tr>
                <td>Photo</td>
                <td><input type="file" name="file_photo" id=""></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="btn_submit" value="Submit"></td>
                
            </tr>
        </table>
    </form>
    <br>
    <table>
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Details</td>
            <td>Category</td>
            <td>SubCategory</td>
            <td>Rate</td>
            <td>Photo</td>
            <td>Action</td>
        </tr>
        <?php
        $i=0;
        $sel="Select * from tbl_service s inner join tbl_subcategory sc on s.subcategory_id=sc.subcategory_id inner join tbl_category c on sc.category_id=c.category_id where studio_id=".$_SESSION['sid'];
        $res=$con->query($sel);
        while($row=$res->fetch_assoc())
        {
            $i++;
            ?>
            <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['service_name'] ?></td>
            <td><?php echo $row['service_description']?></td>
            <td><?php echo $row['category_name'] ?></td>
            <td><?php echo $row['subcategory_name']?></td>
            <td><?php echo $row['service_rate'] ?></td>
            <td><img src="../Assets/Files/Services/<?php echo $row['service_image'];?>" width="50" height="50" /></td>
            <td><a href="Service.php?did=<?php echo $row['service_id']?>">DELETE</a></td>
        </tr>

        <?php

        }


        ?>
        
    </table>
</body>
</html>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getSubcat(cid) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxSubcategory.php?cid=" + cid,
      success: function (result) {

        $("#sel_subcategory").html(result);
      }
    });
  }

</script>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php 
include('Foot.php');
?>