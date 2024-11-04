<?php 
include('Head.php');
include('../Assets/Connections/Connection.php');

if (isset($_GET['id'])) {
    $remove = "UPDATE tbl_user SET user_status='0' WHERE user_id=" . $_GET['id'];
    if ($con->query($remove)) {
        ?>
        <script>
            window.location = "UserList.php";
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
    <title>User List</title>
</head>
<body>
<?php
$query = "SELECT * FROM tbl_user";
$result = $con->query($query);
?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">User List</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Gender</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $user_id = $row['user_id'];
                            $user_name = $row['user_name'];
                            $user_email = $row['user_email'];
                            $user_contact = $row['user_contact'];
                            $user_gender = $row['user_gender'];
                            $user_photo = $row['user_photo'];
                            $user_status = $row['user_status']; // Get user status

                            echo "<tr>";
                            echo "<td>{$user_name}</td>";
                            echo "<td>{$user_email}</td>";
                            echo "<td>{$user_contact}</td>";
                            echo "<td>{$user_gender}</td>";
                            echo "<td><img src='../Assets/Files/User/Photo/{$user_photo}' alt='User Photo' width='50'></td>";
                            
                            // Conditional rendering based on user status
                            echo "<td>";
                            if ($user_status == 0) {
                                echo "Removed";
                            } elseif ($user_status == 1) {
                                echo "<a href='UserList.php?id={$user_id}' class='btn btn-danger btn-sm'>Remove</a>";
                            }
                            echo "</td>";

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No users found</td></tr>";
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
