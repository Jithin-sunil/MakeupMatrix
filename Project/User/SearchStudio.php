<?php
include('../Assets/Connections/Connection.php');
include('Head.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makeup Studio Directory</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css" rel="stylesheet"> -->
    <style>
        body {
            /* padding: 2rem; */
            background-color: #f0f0f0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
        }

        table th, table td {
            padding: 1rem;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f8f9fa;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        select {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
        }

        a {
            text-decoration: none;
            color: #0d6efd;
        }

        a:hover {
            text-decoration: underline;
        }

        .containers {
            padding: 2rem;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="containers">
    <h2>Search for Makeup Studios</h2>
    <form action="" method="post">
        <table>
            <tr>
                <td>District</td>
                <td>
                    <select name="sel_district" onchange="getPlace(this.value)">
                        <option>---select---</option>
                        <?php
                        $selectquery = "SELECT * FROM tbl_district";
                        $res = $con->query($selectquery);
                        while ($data = $res->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $data['district_id']; ?>"><?php echo $data['district_name']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Place</td>
                <td>
                    <select name="sel_place" id="sel_place" onchange="Search(this.value)">
                        <option>---select---</option>
                    </select>
                </td>
            </tr>
        </table>
    </form>

    <h2>Studio List</h2>
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
        <tbody id="result">
            <?php
            $sel = "SELECT * FROM tbl_makeupstudio m 
                    INNER JOIN tbl_place p ON m.place_id = p.place_id 
                    INNER JOIN tbl_district d ON p.district_id = d.district_id";
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
                    <td><a href="ViewService.php?sid=<?php echo $row['studio_id']; ?>">View Services</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
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

    function Search(pid) {
        $.ajax({
            url: "../Assets/AjaxPages/AjaxSearch.php?pid=" + pid,
            success: function(result) {
                $("#result").html(result);
            }
        });
    }
</script>

<?php include('Foot.php'); ?>

</body>
</html>
