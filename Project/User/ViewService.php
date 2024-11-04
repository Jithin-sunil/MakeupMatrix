<?php
include('../Assets/Connections/Connection.php');
include('Head.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }

        .form-select {
            max-width: 300px;
            margin-bottom: 20px;
        }

        .table td img {
            border-radius: 10px;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .service-title {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .service-details {
            font-size: 0.9rem;
        }

        .service-action {
            font-weight: bold;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <!-- Category & Subcategory Selection -->
            <div class="mb-4">
                <label for="sel_category" class="form-label">Category</label>
                <select class="form-select" name="sel_category" id="sel_category" onchange="getSubcat(this.value)">
                    <option value="">---Select---</option>
                    <?php
                    $sel = "select * from tbl_category";
                    $res = $con->query($sel);
                    while ($row = $res->fetch_assoc()) {
                        echo '<option value="' . $row['category_id'] . '">' . $row['category_name'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="mb-4">
                <label for="sel_subcategory" class="form-label">SubCategory</label>
                <select class="form-select" name="sel_subcategory" id="sel_subcategory" onchange="Search()">
                    <option value="">--Select--</option>
                </select>
            </div>

            

            <!-- Service Listing Table -->
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Service Name</th>
                        <th>Service Price</th>
                        <th>Service Details</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="result">
                    <?php
                    if (isset($_GET['aid'])) {
                        ?>
                        <input type="hidden" name="txt_aid" id="txt_aid" value="<?php echo $_GET['aid'];?>">
                        <?php
                        $aid = $_GET['aid'];
                          $sel = "SELECT * FROM tbl_service WHERE artist_id = $aid";
                    } elseif (isset($_GET['sid'])) {
                        ?>
                        <input type="hidden" name="txt_sid" id="txt_sid" value="<?php echo $_GET['sid'];?>">
                        <?php
                        $sid = $_GET['sid'];
                         $sel = "SELECT * FROM tbl_service WHERE studio_id = $sid";
                    } else {
                        echo "<tr><td colspan='6'>No services available</td></tr>";
                    }

                    if (isset($sel)) {
                        $res = $con->query($sel);
                        $i=0;
                        while ($row = $res->fetch_assoc()) {
                            $i++;
                    ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td class="service-title"><?php echo $row['service_name']; ?></td>
                            <td><?php echo $row['service_rate']; ?></td>
                            <td class="service-details"><?php echo $row['service_description']; ?></td>
                            <td>
                                <img src="<?php echo '../Assets/Files/Services/' . $row['service_image']; ?>" alt="<?php echo $row['service_name']; ?>" width="100">
                            </td>
                            <td class="service-action">
                                <a href="Book.php?sid=<?php echo $row['service_id'] ?>" class="btn btn-primary">Book</a>
                            </td>
                        </tr>
                    <?php
                    }
                }
                    ?>
                </tbody>
            </table>
        </form>
    </div>

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/JQ/jQuery.js"></script>
    <script>
        function getSubcat(cid) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxSubcategory.php?cid=" + cid,
                success: function(result) {
                    $("#sel_subcategory").html(result);
                }
            });
        }

        function Search() {
            var category = $("#sel_category").val();
            var subcategory = $("#sel_subcategory").val();
            var aid = $("#txt_aid").val();
            var sid = $("#txt_sid").val();
            $.ajax({
                url: "../Assets/AjaxPages/AjaxService.php?category=" + category + "&subcategory=" + subcategory + "&aid=" +  aid +"&sid=" + sid,
                success: function(result) {
                    $("#result").html(result);
                }
            })
        }
    </script>

    
</body>

</html>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
    include('Foot.php');
    ?>
