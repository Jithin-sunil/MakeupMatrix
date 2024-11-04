<?php
    include('../Connections/Connection.php');
    ?>
                <?php
                $sel = "select * from tbl_artist a 
                        inner join tbl_place p on a.place_id = p.place_id 
                        inner join tbl_district d on p.district_id=d.district_id where a.place_id=" . $_GET['pid'];
                $res = $con->query($sel);
                while ($row = $res->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['artist_id']; ?></td>
                        <td><?php echo $row['artist_name']; ?></td>
                        <td><?php echo $row['artist_contact']; ?></td>
                        <td><?php echo $row['artist_email']; ?></td>
                        <td><?php echo $row['district_name']; ?></td>
                        <td><?php echo $row['place_name']; ?></td>
                        <td><a href="../Assets/Files/Studio/Photo/<?php echo $row['artist_license']; ?>">View</a></td>
                        <td><a href="ViewService.php?aid=<?php echo $row['artist_id'] ?>">View Services</a></td>
                    </tr>
                <?php } ?>