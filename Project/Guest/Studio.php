<?php
include('../Assets/Connections/Connection.php');
// include('Head.php');

if (isset($_POST['btnregister'])) {
    $place = $_POST["sel_place"];
    $name = $_POST["txtname"];
    $contact = $_POST["txtcontact"];
    $email = $_POST["txtemail"];
    $address = $_POST["txt_address"];
    $district = $_POST["sel_district"];
    $password = $_POST['txt_password']; // New password field
    $photo = $_FILES['txtphoto']['name'];
    $proof = $_FILES['upload']['name'];
    $license = $_FILES['upload2']['name'];

    move_uploaded_file($_FILES['txtphoto']['tmp_name'], '../Assets/Files/Studio/Photo/' . $photo);
    move_uploaded_file($_FILES['upload']['tmp_name'], '../Assets/Files/Studio/Photo/' . $proof);
    move_uploaded_file($_FILES['upload2']['tmp_name'], '../Assets/Files/Studio/Photo/' . $license);

    $insquery = "INSERT INTO tbl_makeupstudio(studio_name, studio_contact, studio_email, studio_address, place_id, studio_photo, studio_proof, studio_license, studio_startdate, studio_password) 
                VALUES('" . $name . "','" . $contact . "','" . $email . "','" . $address . "','" . $place . "','" . $photo . "','" . $proof . "','" . $license . "', curdate(), '" . $password . "')";
    
    if ($con->query($insquery)) {
        echo "<div class='alert alert-success'>Inserted successfully!</div>";
        header('location:./login.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio Registration Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('../Assets/Templates/image.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
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
            max-width: 800px;
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
            <h2>Studio Registration</h2>
            <form action="" method="post" enctype="multipart/form-data" id="form1">
                <div class="row">
                    <!-- Name and Contact -->
                    <div class="col-md-6 mb-3">
                        <label for="txtname" class="form-label">Name</label>
                        <input type="text" class="form-control" name="txtname" id="txtname" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="txtcontact" class="form-label">Contact</label>
                        <input type="text" class="form-control" name="txtcontact" id="txtcontact" required>
                    </div>
                </div>

                <div class="row">
                    <!-- Email and Address -->
                    <div class="col-md-6 mb-3">
                        <label for="txtemail" class="form-label">Email</label>
                        <input type="email" class="form-control" name="txtemail" id="txtemail" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="txt_address" class="form-label">Address</label>
                        <textarea class="form-control" name="txt_address" id="txt_address" rows="3" required></textarea>
                    </div>
                </div>

                <div class="row">
                    <!-- District and Place -->
                    <div class="col-md-6 mb-3">
                        <label for="sel_district" class="form-label">District</label>
                        <select class="form-select" name="sel_district" id="sel_district" onchange="getPlace(this.value)" required>
                            <option>---select---</option>
                            <?php
                            $selectquery = "SELECT * FROM tbl_district";
                            $res = $con->query($selectquery);
                            while ($data = $res->fetch_assoc()) {
                                echo '<option value="' . $data['district_id'] . '">' . $data['district_name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="sel_place" class="form-label">Place</label>
                        <select class="form-select" name="sel_place" id="sel_place" required>
                            <option>---select---</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <!-- Photo, Proof, License -->
                    <div class="col-md-4 mb-3">
                        <label for="txtphoto" class="form-label">Photo</label>
                        <input type="file" class="form-control" name="txtphoto" id="txtphoto" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="upload" class="form-label">Proof</label>
                        <input type="file" class="form-control" name="upload" id="upload" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="upload2" class="form-label">License</label>
                        <input type="file" class="form-control" name="upload2" id="upload2" required>
                    </div>
                </div>

                <div class="row">
                    <!-- Password -->
                    <div class="col-md-6 mb-3">
                        <label for="txt_password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="txt_password" id="txt_password" required>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" name="btnregister" class="btn btn-primary">Register</button>
                    <button type="reset" name="btncancel" class="btn btn-secondary btn-cancel">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script src="../Assets/JQ/jQuery.js"></script>
    <script>
        function getPlace(did) {
            $.ajax({
                url: "../Assets/AjaxPages/Ajaxplace.php?did=" + did,
                success: function (result) {
                    $("#sel_place").html(result);
                }
            });
        }
    </script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<?php 
// include('Foot.php');
?>
