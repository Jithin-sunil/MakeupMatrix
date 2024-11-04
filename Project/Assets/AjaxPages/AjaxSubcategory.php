<option value="">--select---</option>
<?php
include('../Connections/Connection.php');


    $selquery="select * from tbl_subcategory where category_id=".$_GET["cid"];
    $result=$con->query($selquery);
    while($data=$result->fetch_assoc())
        {
?>
<option value="<?php echo $data["subcategory_id"]?>"><?php echo $data["subcategory_name"] ?></option>
<?php
        }
?>
                        
                








