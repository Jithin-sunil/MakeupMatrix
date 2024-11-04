<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>VIEW REPLIED COMPLAINTS</title>
</head>
<?php  
    ob_start();
    include('../Assets/Connection/Connection.php');
    include('Head.php');
?>
<body>
    <!-- User Replied Complaints -->
    <h1>User Replied Complaints</h1>
    <table>
        <thead>
            <tr>
                <th align="center">Sl.No</th>
                <th align="center">Complaint</th>
                <th align="center">Date</th>
                <th align="center">User</th>
                <th align="center">Reply</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 0;
                $selQry = "SELECT * FROM tbl_complaint c 
                           INNER JOIN tbl_user u ON c.user_id = u.user_id 
                           WHERE complaint_status = '1'";
                $rs = $Conn->query($selQry);
                while ($data = $rs->fetch_assoc()) {
                    $i++;
            ?>
            <tr>
                <td align="center"><?php echo $i;?></td>
                <td align="center"><?php echo $data["complaint_content"] ?></td>
                <td align="center"><?php echo $data["complaint_date"] ?></td>
                <td align="center"><?php echo $data["user_name"] ?></td>
                <td align="center"><?php echo $data["complaint_reply"] ?></td>
            </tr>
            <?php                     
            }
            ?>
        </tbody>
    </table>

    <!-- Artist Replied Complaints -->
    <h1>Artist Replied Complaints</h1>
    <table>
        <thead>
            <tr>
                <th align="center">Sl.No</th>
                <th align="center">Complaint</th>
                <th align="center">Date</th>
                <th align="center">Artist</th>
                <th align="center">Reply</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 0;
                $selQry = "SELECT * FROM tbl_complaint c 
                           INNER JOIN tbl_artist a ON c.artist_id = a.artist_id 
                           WHERE complaint_status = '1'";
                $rs = $Conn->query($selQry);
                while ($data = $rs->fetch_assoc()) {
                    $i++;
            ?>
            <tr>
                <td align="center"><?php echo $i;?></td>
                <td align="center"><?php echo $data["complaint_content"] ?></td>
                <td align="center"><?php echo $data["complaint_date"] ?></td>
                <td align="center"><?php echo $data["artist_name"] ?></td>
                <td align="center"><?php echo $data["complaint_reply"] ?></td>
            </tr>
            <?php                     
            }
            ?>
        </tbody>
    </table>

    <!-- Makeup Studio Replied Complaints -->
    <h1>Makeup Studio Replied Complaints</h1>
    <table>
        <thead>
            <tr>
                <th align="center">Sl.No</th>
                <th align="center">Complaint</th>
                <th align="center">Date</th>
                <th align="center">Makeup Studio</th>
                <th align="center">Reply</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 0;
                $selQry = "SELECT * FROM tbl_complaint c 
                           INNER JOIN tbl_makeupstudio m ON c.makeupstudio_id = m.makeupstudio_id 
                           WHERE complaint_status = '1'";
                $rs = $Conn->query($selQry);
                while ($data = $rs->fetch_assoc()) {
                    $i++;
            ?>
            <tr>
                <td align="center"><?php echo $i;?></td>
                <td align="center"><?php echo $data["complaint_content"] ?></td>
                <td align="center"><?php echo $data["complaint_date"] ?></td>
                <td align="center"><?php echo $data["makeupstudio_name"] ?></td>
                <td align="center"><?php echo $data["complaint_reply"] ?></td>
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
