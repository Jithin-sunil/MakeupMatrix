
<?php 
include('Head.php');
include('../Assets/Connections/Connection.php');
if(isset($_GET['id']))
{
    $up="update tbl_makeupstudio set studio_status='".$_GET['sts']."' where studio_id=".$_GET['id'];
    if($con->query($up))
    {
        ?>
        <script>
            window.location="Studio.php";
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio</title>
</head>
<body>
<?php

$query = "SELECT *
          FROM tbl_makeupstudio m inner join tbl_place p on m.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id";
$result = $con->query($query);
?>

<div class="col-lg-17 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Makeup Studios</h4>
      <!-- Add scrollable container with fixed height -->
      <div style="overflow-x: auto; max-height: 500px;"> <!-- Adjust height as needed -->
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Studio Name</th>
              <th>Contact</th>
              <th>License</th>
              <th>Proof</th>
              <th>Email</th>
              <th>Photo</th>
              <th>Start Date</th>
              <th>Address</th>
              <th>District</th>
              <th>Place</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $studio_id = $row['studio_id'];
                    $studio_name = $row['studio_name'];
                    $studio_contact = $row['studio_contact'];
                    $studio_license = $row['studio_license'];
                    $studio_proof = $row['studio_proof'];
                    $studio_email = $row['studio_email'];
                    $studio_photo = $row['studio_photo'];
                    $studio_startdate = $row['studio_startdate'];
                    $studio_address = $row['studio_address'];
                    $place_name = $row['place_name'];
                    $district_name = $row['district_name'];
                    $studio_status = $row['studio_status'];

                    echo "<tr>";
                    echo "<td>{$studio_name}</td>";
                    echo "<td>{$studio_contact}</td>";
                    echo "<td><a href='../Assets/Files/Studio/Photo/{$studio_license}'><img src='../Assets/Files/Studio/Photo/{$studio_license}' alt='Studio Photo' width='50'></a></td>";
                    echo "<td><a href='../Assets/Files/Studio/Photo/{$studio_proof}'><img src='../Assets/Files/Studio/Photo/{$studio_proof}' alt='Studio Photo' width='50'></a></td>";
                    echo "<td>{$studio_email}</td>";
                    echo "<td><img src='../Assets/Files/Studio/Photo/{$studio_photo}' alt='Studio Photo' width='50'></td>";
                    echo "<td>{$studio_startdate}</td>";
                    echo "<td>{$studio_address}</td>";
                    echo "<td>{$district_name}</td>";
                    echo "<td>{$place_name}</td>";

                    echo "<td>";
                    if ($studio_status == 0) {
                        echo "<label class='badge badge-danger'>Pending</label>";
                    } elseif ($studio_status == 1) {
                        echo "<label class='badge badge-success'>Verified</label>";
                    } else {
                        echo "<label class='badge badge-warning'>Rejected</label>";
                    }
                    echo "</td>";

                    echo "<td>";
                    if ($studio_status == 0) {
                        echo "<a href='Studio.php?id={$studio_id}&sts=1' class='btn btn-success btn-sm'>Verify</a> ";
                        echo "<a href='Studio.php?id={$studio_id}&sts=2' class='btn btn-danger btn-sm'>Reject</a>";
                    } elseif ($studio_status == 1) {
                        echo "<a href='Studio.php?id={$studio_id}&sts=2' class='btn btn-danger btn-sm'>Reject</a>";
                    } elseif ($studio_status == 2) {
                        echo "<a href='Studio.php?id={$studio_id}&sts=1' class='btn btn-success btn-sm'>Verify</a>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='11'>No studios found</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

</body>
</html>
<?php
include('Foot.php');

?>