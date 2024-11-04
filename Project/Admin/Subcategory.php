<?php
include('../Assets/Connections/Connection.php');
include('Head.php');
if (isset($_POST['btn_save'])) {
  $category_id = $_POST['category_list'];
  $subcategory = $_POST['txt_catname'];

  $insertquery = "insert into tbl_subcategory(category_id,subcategory_name) values ('" . $category_id . "','" . $subcategory . "')";

  if ($con->query($insertquery)) {
    ?>
    <script>
    alert('Successfully saved');
    window.location = "Subcategory.php";
    </script>
    <?php
  }
}

if(isset(($_GET['did'])))
{
 
  $deletequery = "DELETE FROM tbl_subcategory WHERE subcategory_id = ".$_GET['did'];
  if ($con->query($deletequery)) {
    ?>
    <script>
    alert('Successfully deleted');
    window.location = "Subcategory.php";
    </script>
    <?php
  }
}

?>

<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Subcategory</title>
</head>

<body>
  <form id="form1" name="form1" method="post" action="">
    <table border="1">
      <tr>
        <td width="141">Category</td>
        <td><label for="category_list"></label>

          <select name="category_list" id="category_list">
            <option>---select---</option>
            <?php
            $selectquery = "SELECT * FROM tbl_category";
            $result = $con->query($selectquery);
            while ($row = $result->fetch_assoc()) {
              ?>
              <option value="<?php echo $row['category_id'] ?>"> <?php echo $row['category_name'] ?></option>
              <?php
            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Subcategory</td>
        <td><label for="txt_catname"></label>
          <input type="text" name="txt_catname" id="txt_catname" />
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" name="btn_save" id="btn_save" value="Save" /></td>
      </tr>
    </table>

    <table>
      <tr>
        <th>#</th>
        <th>Category</th>
        <th>Subcategory</th>
        <th>Action</th>
      </tr>
      <?php
      $i = 0;
       $selectquery = "select * from  tbl_subcategory s inner join tbl_category  c on  c.category_id=s.category_id";
      $result = $con->query($selectquery);
      while ($data = $result->fetch_assoc()) {
        $i++;
        ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $data['category_name'] ?>
          </td>
          <td><?php echo $data['subcategory_name'] ?>
          </td>
          <td>
            <a href="Subcategory.php?did=<?php echo $data['subcategory_id'] ?>">Delete</a>
          </td>
        </tr>
      <?php } ?>
    </table>

  </form>
</body>

</html>
<?php
include('Foot.php');
?>