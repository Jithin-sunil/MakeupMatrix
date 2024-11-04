<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>VIEW COMPLAINT</title>

</head>
<?php  
    ob_start();
    include('../Assets/Connection/Connection.php');
    include('Head.php');
      
    if(isset($_POST["btn_save"])) {
        $upQry = "update tbl_complaint set complaint_reply='".$_POST["txt_reply"]."',complaint_status='1' where complaint_id='".$_POST["hid"]."'";
        $Conn->query($upQry);
        header("Location:ViewComplaint.php");
    }
?>
<body>
    

        <table>
            <?php                          
                if (isset($_GET["up"])) {
            ?>
            <tr>
                <td colspan="2" align="center">
                    <h3>Send Reply</h3>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="txt_reply">Reply:</label>
                </td>
                <td>
                    <form method="post">
                        <input required="" type="text" id="txt_reply" name="txt_reply">
                        <input type="hidden" name="hid" value="<?php echo $_GET["up"];?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" class="btn-dark" name="btn_save" value="Save">
                    </form>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>

        <!-- User Complaints -->
        <h1>User Complaints</h1>
        <table>
            <thead>
                <tr>
                    <th align="center">Sl.No</th>
                    <th align="center">Complaint</th>
                    <th align="center">Date</th>
                    <th align="center">User</th>
                    <th align="center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 0;
                    $selQry = "SELECT * FROM tbl_complaint c 
                               INNER JOIN tbl_user u ON c.user_id = u.user_id 
                               WHERE complaint_status = '0'";
                    $rs = $Conn->query($selQry);
                    while ($data = $rs->fetch_assoc()) {
                        $i++;
                ?>
                <tr>
                    <td align="center"><?php echo $i;?></td>
                    <td align="center"><?php echo $data["complaint_content"] ?></td>
                    <td align="center"><?php echo $data["complaint_date"] ?></td>
                    <td align="center"><?php echo $data["user_name"] ?></td>
                    <td align="center"><a href="ViewComplaint.php?up=<?php echo $data["complaint_id"] ?>" class="status_btn">Reply</a></td>
                </tr>
                <?php                     
                }
                ?>
            </tbody>
        </table>

        <!-- Artist Complaints -->
        <h1>Artist Complaints</h1>
        <table>
            <thead>
                <tr>
                    <th align="center">Sl.No</th>
                    <th align="center">Complaint</th>
                    <th align="center">Date</th>
                    <th align="center">Artist</th>
                    <th align="center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 0;
                    $selQry = "SELECT * FROM tbl_complaint c 
                               INNER JOIN tbl_artist a ON c.artist_id = a.artist_id 
                               WHERE complaint_status = '0'";
                    $rs = $Conn->query($selQry);
                    while ($data = $rs->fetch_assoc()) {
                        $i++;
                ?>
                <tr>
                    <td align="center"><?php echo $i;?></td>
                    <td align="center"><?php echo $data["complaint_content"] ?></td>
                    <td align="center"><?php echo $data["complaint_date"] ?></td>
                    <td align="center"><?php echo $data["artist_name"] ?></td>
                    <td align="center"><a href="ViewComplaint.php?up=<?php echo $data["complaint_id"] ?>" class="status_btn">Reply</a></td>
                </tr>
                <?php                     
                }
                ?>
            </tbody>
        </table>

        <!-- Makeup Studio Complaints -->
        <h1>Makeup Studio Complaints</h1>
        <table>
            <thead>
                <tr>
                    <th align="center">Sl.No</th>
                    <th align="center">Complaint</th>
                    <th align="center">Date</th>
                    <th align="center">Makeup Studio</th>
                    <th align="center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 0;
                    $selQry = "SELECT * FROM tbl_complaint c 
                               INNER JOIN tbl_makeupstudio m ON c.makeupstudio_id = m.makeupstudio_id 
                               WHERE complaint_status = '0'";
                    $rs = $Conn->query($selQry);
                    while ($data = $rs->fetch_assoc()) {
                        $i++;
                ?>
                <tr>
                    <td align="center"><?php echo $i;?></td>
                    <td align="center"><?php echo $data["complaint_content"] ?></td>
                    <td align="center"><?php echo $data["complaint_date"] ?></td>
                    <td align="center"><?php echo $data["makeupstudio_name"] ?></td>
                    <td align="center"><a href="ViewComplaint.php?up=<?php echo $data["complaint_id"] ?>" class="status_btn">Reply</a></td>
                </tr>
                <?php                     
                }
                ?>
            </tbody>
        </table>

        
    
</body>
<?php
    include('Foot.php');
    ob_end_flush();
?>
</html>
