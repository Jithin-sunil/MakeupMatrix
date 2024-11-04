<?php
include('../Assets/Connections/Connection.php');
// include('Head.php');


if (isset($_POST['btnsub'])) {
    $place = $_POST["sel_place"];
    $name = $_POST["txtname"];
    $gender = $_POST["gender"];
    $email = $_POST["txtemail"];
    $password = $_POST["txtpwd"];
    $contact = $_POST["txtcon"];
    $photo = $_FILES['upload']['name'];
    $path = $_FILES['upload']['tmp_name'];
    move_uploaded_file($path, '../Assets/Files/User/Photo/' . $photo);
    $insquery = "INSERT INTO tbl_user(place_id, user_name, user_email, user_password, user_gender, user_contact, user_photo) 
    VALUES('" . $place . "','" . $name . "','" . $email . "','" . $password . "','" . $gender . "','" . $contact . "','" . $photo . "')";
    if ($con->query($insquery)) {
        echo "inserted";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
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

        .form-container .btn-cancel {
            background-color: #6c757d;
            border: none;
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center">
        <div class="form-container">
            <h2>User Registration</h2>
            <form action="" method="post" enctype="multipart/form-data" id="form1">
                <div class="row">
                    <!-- Row for Name and Email -->
                    <div class="col-md-6 mb-3">
                        <label for="txtname" class="form-label">Name</label>
                        <input type="text" class="form-control" name="txtname" id="txtname" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="txtemail" class="form-label">Email</label>
                        <input type="email" class="form-control" name="txtemail" id="txtemail" required>
                    </div>
                </div>

                <div class="row">
                    <!-- Row for Password and Confirm Password -->
                    <div class="col-md-6 mb-3">
                        <label for="txtpwd" class="form-label">Password</label>
                        <input type="password" class="form-control" name="txtpwd" id="txtpwd" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="txtconf" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="txtconf" id="txtconf" required>
                    </div>
                </div>

                <div class="row">
                    <!-- Row for Contact Number and Gender -->
                    <div class="col-md-6 mb-3">
                        <label for="txtcon" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" name="txtcon" id="txtcon" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="gender" class="form-label">Gender</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="Male" required>
                            <label class="form-check-label">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="Female" required>
                            <label class="form-check-label">Female</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Row for District and Place -->
                    <div class="col-md-6 mb-3">
                        <label for="sel_district" class="form-label">District</label>
                        <select class="form-select" name="sel_district" id="sel_district" onchange="getPlace(this.value)">
                            <option>---select---</option>
                            <?php
                            $selectquery = "select * from tbl_district";
                            $res = $con->query($selectquery);
                            while ($data = $res->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $data['district_id']; ?>"><?php echo $data['district_name']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="sel_place" class="form-label">Place</label>
                        <select class="form-select" name="sel_place" id="sel_place">
                            <option>---select---</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <!-- Row for Photo Upload -->
                    <div class="col-md-12 mb-3">
                        <label for="upload" class="form-label">Photo</label>
                        <input class="form-control" type="file" name="upload" id="upload" required>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" name="btnsub" class="btn btn-primary">Submit</button>
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
                success: function(result) {
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