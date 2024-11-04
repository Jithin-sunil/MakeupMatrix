<?php
include('../Connections/Connection.php');

?>
    <?php
    $i = 1;  
     $selQry = "SELECT * FROM tbl_service s 
               INNER JOIN tbl_subcategory sc ON s.subcategory_id = sc.subcategory_id 
               INNER JOIN tbl_category c ON sc.category_id = c.category_id
               WHERE TRUE";

    if($_GET['aid'] == "undefined")
    {
        $selQry .= " AND s.artist_id = 0";
    }
    else if($_GET['sid'] == "undefined")
    {
        $selQry .= " AND s.studio_id = 0";
    }
    else if (isset($_GET['aid']) && $_GET['aid'] != "") {
        $selQry .= " AND s.artist_id = " . $_GET['aid'];
    } elseif (isset($_GET['sid']) && $_GET['sid'] != "") {
        $selQry .= " AND s.studio_id = " . $_GET['sid'];
    }
    if ($_GET['category'] != "") {
        $selQry .= " AND c.category_id IN(" . $_GET['category'] . ")";
    }
    if ($_GET['subcategory'] != "") {
        $selQry .= " AND sc.subcategory_id IN(" . $_GET['subcategory'] . ")";
    }
    // echo $selQry;
   
    $reslt = $con->query($selQry);
    
    
    while ($row = $reslt->fetch_assoc()) {
    ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row['service_name']; ?></td>
            <td><?php echo $row['service_rate']; ?></td>
            <td><?php echo $row['service_description']; ?></td>
            <td><img src="<?php echo '../Assets/Files/Services/' . $row['service_image']; ?>" alt="<?php echo $row['service_name']; ?>" width="100"></td>
            <td><a href="Book.php?sid=<?php echo $row['service_id']; ?>">Book</a></td>
        </tr>
    <?php
    }
    ?>
