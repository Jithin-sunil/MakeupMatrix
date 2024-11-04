    <?php
    include('../Connections/Connection.php');
    ?>
    <h2>Makeup Studio List</h2>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Studio Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>District</th>
                    <th>Place</th>
                    <th>License</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sel = "select * from tbl_makeupstudio m 
                        inner join tbl_place p on m.place_id = p.place_id 
                        inner join tbl_district d on p.district_id=d.district_id where m.place_id=" . $_GET['pid'];
                $res = $con->query($sel);
                while ($row = $res->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['studio_id']; ?></td>
                        <td><?php echo $row['studio_name']; ?></td>
                        <td><?php echo $row['studio_contact']; ?></td>
                        <td><?php echo $row['studio_email']; ?></td>
                        <td><?php echo $row['studio_address']; ?></td>
                        <td><?php echo $row['district_name']; ?></td>
                        <td><?php echo $row['place_name']; ?></td>
                        <td><a href="../Assets/Files/Studio/Photo/<?php echo $row['studio_license']; ?>">View</a></td>
                        <td><a href="ViewService.php?sid=<?php echo $row['studio_id'] ?>">View Services</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>