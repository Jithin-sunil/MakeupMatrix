
<?php 
include('Head.php');
include('../Assets/Connections/Connection.php');
if(isset($_GET['id']))
{
    $up="update tbl_artist set artist_status='".$_GET['sts']."' where artist_id=".$_GET['id'];
    if($con->query($up))
    {
        ?>
        <script>
            window.location="Artist.php";
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
    <title>Artist</title>
</head>
<body>
<?php

$query = "SELECT *
          FROM tbl_artist m inner join tbl_place p on m.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id";
$result = $con->query($query);
?>

          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Artists</h4>
                <!-- <p class="card-description"> Hoverable table displaying artist data except password. </p> -->
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Artist Name</th>
                      <th>Contact</th>
                      <th>License</th>
                      <th>Proof</th>
                      <th>Email</th>
                      <th>Photo</th>
                      
                      <th>District</th>
                      <th>Place </th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Fetch each row of the result as an associative array
                        while ($row = $result->fetch_assoc()) {
                            $artist_id = $row['artist_id'];
                            $artist_name = $row['artist_name'];
                            $artist_contact = $row['artist_contact'];
                            $artist_license = $row['artist_license'];
                            $artist_proof = $row['artist_proof'];
                            $artist_email = $row['artist_email'];
                            $artist_photo = $row['artist_photo'];
                           
                            $place_name = $row['place_name'];
                            $district_name = $row['district_name'];
                            $artist_status = $row['artist_status'];
                            
                            // Display artist data in table
                            echo "<tr>";
                            echo "<td>{$artist_name}</td>";
                            echo "<td>{$artist_contact}</td>";
                            echo "<td><a href='../Assets/Files/Artist/Photo/{$artist_license}'><img src='../Assets/Files/Artist/Photo/{$artist_license}' alt='artist Photo' width='50'></a></td>";
                            echo "<td><a href='../Assets/Files/Artist/Photo/{$artist_proof}'><img src='../Assets/Files/Artist/Photo/{$artist_proof}' alt='artist Photo' width='50'></a></td>";
                            echo "<td>{$artist_email}</td>";
                            echo "<td><img src='../Assets/Files/Artist/Photo/{$artist_photo}' alt='artist Photo' width='50'></td>";
                            
                            echo "<td>{$district_name}</td>";
                            echo "<td>{$place_name}</td>";
                            
                            // Show status based on artist_status
                            echo "<td>";
                            if ($artist_status == 0) {
                                echo "<label class='badge badge-danger'>Pending</label>";
                            } elseif ($artist_status == 1) {
                                echo "<label class='badge badge-success'>Verified</label>";
                            } else {
                                echo "<label class='badge badge-warning'>Rejected</label>";
                            }
                            echo "</td>";
                            
                            // Conditional links based on artist_status
                            echo "<td>";
                            if ($artist_status == 0) {
                                echo "<a href='Artist.php?id={$artist_id}&sts=1' class='btn btn-success btn-sm'>Verify</a> ";
                                echo "<a href='Artist.php?id={$artist_id}&sts=2' class='btn btn-danger btn-sm'>Reject</a>";
                            } elseif ($artist_status == 1) {
                                echo "<a href='Artist.php?id={$artist_id}&sts=2' class='btn btn-danger btn-sm'>Reject</a>";
                            } elseif ($artist_status == 2) {
                                echo "<a href='Artist.php?id={$artist_id}&sts=1' class='btn btn-success btn-sm'>Verify</a>";
                            }
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='11'>No artists found</td></tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
</body>
</html>
<?php
include('Foot.php');

?>