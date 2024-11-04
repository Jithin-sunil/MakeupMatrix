<?php 
include('Head.php');
include('../Assets/Connections/Connection.php');


// Fetch total studios count from tbl_makeupstudio
$sqlStudios = "SELECT COUNT(*) AS total_studios FROM tbl_makeupstudio";
$resultStudios = $con->query($sqlStudios);  // Using $con->query
$rowStudios = $resultStudios->fetch_assoc(); // Using fetch_assoc()
$totalStudios = $rowStudios['total_studios'];

// Fetch total users count from tbl_user
$sqlUsers = "SELECT COUNT(*) AS total_users FROM tbl_user";
$resultUsers = $con->query($sqlUsers);  // Using $con->query
$rowUsers = $resultUsers->fetch_assoc(); // Using fetch_assoc()
$totalUsers = $rowUsers['total_users'];

// Fetch total users count from tbl_user
$sqlartist = "SELECT COUNT(*) AS artist FROM tbl_artist where artist_status=1";
$resultartist = $con->query($sqlartist);  // Using $con->query
$rowartist = $resultartist->fetch_assoc(); // Using fetch_assoc()
$totalartist = $rowartist['artist'];

// Fetch total completed bookings from tbl_booking (assuming 'status' column for completion)
$sqlBookings = "SELECT COUNT(*) AS total_completed FROM tbl_booking WHERE booking_status = '6'";
$resultBookings = $con->query($sqlBookings);  // Using $con->query
$rowBookings = $resultBookings->fetch_assoc(); // Using fetch_assoc()
$totalCompletedBookings = $rowBookings['total_completed'];

?>



<div class="content-wrapper">
<div class="row">
  <div class="col-md-12">

    <div class="tab-content tab-transparent-content">
      <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
        <div class="row">
          <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body text-center">
                <h5 class="mb-2 text-dark font-weight-normal">Total Studios</h5>
                <h2 class="mb-4 text-dark font-weight-bold">
                  <?php echo $totalStudios; ?>
                </h2>
                <div
                  class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent">
                  <i class="mdi mdi-lightbulb icon-md absolute-center text-dark"></i>
                </div>
                <p class="mt-4 mb-0">Studios Available</p>
                <!-- <h3 class="mb-0 font-weight-bold mt-2 text-dark">100%</h3> -->
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body text-center">
                <h5 class="mb-2 text-dark font-weight-normal">Total Users</h5>
                <h2 class="mb-4 text-dark font-weight-bold">
                  <?php echo $totalUsers; ?>
                </h2>
                <div
                  class="dashboard-progress dashboard-progress-2 d-flex align-items-center justify-content-center item-parent">
                  <i class="mdi mdi-account-circle icon-md absolute-center text-dark"></i>
                </div>
                <p class="mt-4 mb-0">Registered Users</p>
                <!-- <h3 class="mb-0 font-weight-bold mt-2 text-dark">100%</h3> -->
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body text-center">
                <h5 class="mb-2 text-dark font-weight-normal">Total Artists</h5>
                <h2 class="mb-4 text-dark font-weight-bold">
                  <?php echo $totalartist; ?>
                </h2>
                <div
                  class="dashboard-progress dashboard-progress-2 d-flex align-items-center justify-content-center item-parent">
                  <i class="mdi mdi-account-circle icon-md absolute-center text-dark"></i>
                </div>
                <p class="mt-4 mb-0">Verified Artists</p>
                <!-- <h3 class="mb-0 font-weight-bold mt-2 text-dark">100%</h3> -->
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body text-center">
                <h5 class="mb-2 text-dark font-weight-normal">Completed Bookings</h5>
                <h2 class="mb-4 text-dark font-weight-bold">
                  <?php echo $totalCompletedBookings; ?>
                </h2>
                <div
                  class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent">
                  <i class="mdi mdi-eye icon-md absolute-center text-dark"></i>
                </div>
                <p class="mt-4 mb-0">Bookings Completed</p>
                <!-- <h3 class="mb-0 font-weight-bold mt-2 text-dark">100%</h3> -->
              </div>
            </div>

          </div>
          <?php
          

$query = "SELECT *
          FROM tbl_makeupstudio m inner join tbl_place p on m.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id";
$result = $con->query($query);

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

          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Makeup Studios</h4>
                <!-- <p class="card-description"> Hoverable table displaying studio data except password. </p> -->
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
                            
                            // Display studio data in table
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
                            
                            // Show status based on studio_status
                            echo "<td>";
                            if ($studio_status == 0) {
                                echo "<label class='badge badge-danger'>Pending</label>";
                            } elseif ($studio_status == 1) {
                                echo "<label class='badge badge-success'>Verified</label>";
                            } else {
                                echo "<label class='badge badge-warning'>Rejected</label>";
                            }
                            echo "</td>";
                            
                            // Conditional links based on studio_status
                            echo "<td>";
                            if ($studio_status == 0) {
                                echo "<a href='adminhome.php?vid={$studio_id}&sts=1' class='btn btn-success btn-sm'>Verify</a> ";
                                echo "<a href='adminhome.php?rid={$studio_id}&sts=2' class='btn btn-danger btn-sm'>Reject</a>";
                            } elseif ($studio_status == 1) {
                                echo "<a href='adminhome.php?rid={$studio_id}&sts=2' class='btn btn-danger btn-sm'>Reject</a>";
                            } elseif ($studio_status == 2) {
                                echo "<a href='adminhome.php?vid={$studio_id}&sts=1' class='btn btn-success btn-sm'>Verify</a>";
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
      </div>
    </div>
  </div>
</div>
</div>
<!-- content-wrapper ends -->
<?php 
include('Foot.php');
?>