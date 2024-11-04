<?php
include('../Assets/Connections/Connection.php');
$email = '';
$password = '';
session_start();
// include('Head.php');

if (isset($_POST['btnsave'])) {
    $email = $_POST['txtemail'];
    $password = $_POST['txtpassword'];

    $selectquery = "SELECT * FROM tbl_adminreg WHERE admin_email='" . $email . "' AND admin_password='" . $password . "'";
    $res = $con->query($selectquery);

    $selectquery1 = "SELECT * FROM tbl_user WHERE user_email='" . $email . "' AND user_password='" . $password . "'";
    $res1 = $con->query($selectquery1);

    $selectquery2 = "SELECT * FROM tbl_artist WHERE artist_email='" . $email . "' AND artist_password='" . $password . "'";
    $res2 = $con->query($selectquery2);

    $selectquery3 = "SELECT * FROM tbl_makeupstudio WHERE studio_email='" . $email . "' AND studio_password='" . $password . "'";
    $res3 = $con->query($selectquery3);

    if ($data = $res->fetch_assoc()) {
        $_SESSION['adid'] = $data['admin_id'];
        header('location:../Admin/adminhome.php');
    } else if ($data1 = $res1->fetch_assoc()) {
        if($data1['user_status']==1)
        {
            $_SESSION['uid'] = $data1['user_id'];
            header('location:../User/Userhome.php');
        }
        else
        {
            ?>
            <script>
                alert('Your Account is Revoked By Admin. Contact For More Details')
            </script>
            <?php
        }
       
    } else if ($data2 = $res2->fetch_assoc()) {
        if($data2['artist_status']==1)
        {
            $_SESSION['aid'] = $data2['artist_id'];
        header('location:../Artist/Homepage.php');
        }
        else if($data2['artist_status']==2)
        {
            ?>
            <script>
                alert('Your Join Request is Rejected.')
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert('Your Join Request is Pending.')
            </script>
            <?php
        }
        
        
    } else if ($data3 = $res3->fetch_assoc()) {
        if($data3['studio_status']==1)
        {
            $_SESSION['sid'] = $data3['studio_id'];
            header('location:../MakeupStudio/Homepage.php');
        }
        
    } else if($data2['studio_status']==2)
    {
        ?>
        <script>
            alert('Your Join Request is Rejected.')
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            alert('Your Join Request is Pending.')
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
    <title>User Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-image: url('../Assets/Templates/Main/images/lg4.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
            margin: 0;
            padding: 0;
        }
        

        .form-container {
            margin-top: 50px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            max-width: 400px;
            width: 100%;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container label {
            font-weight: bold;
        }

        .form-container .btn {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="form-container">
            <h2>Login</h2>
            <form id="form1" name="form1" method="post" action="">
                <div class="mb-3">
                    <label for="txtemail" class="form-label">Email</label>
                    <input type="text" class="form-control" name="txtemail" id="txtemail" required>
                </div>
                <div class="mb-3">
                    <label for="txtpassword" class="form-label">Password</label>
                    <input type="password" class="form-control" name="txtpassword" id="txtpassword" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" name="btnsave" id="btnsave" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php 
// include('Foot.php');
?>