
<?php
$result="";
if(isset($_POST["add"]))
{
	$num1=$_POST["num1"];
	$num2=$_POST["num2"];
	$result=$num1+$num2;
}
if(isset($_POST["sub"]))
{
	$num1=$_POST["num1"];
	$num2=$_POST["num2"];
	$result=$num1-$num2;
}
if(isset($_POST["mult"]))
{
	$num1=$_POST["num1"];
	$num2=$_POST["num2"];
	$result=$num1*$num2;
}
if(isset($_POST["div"]))
{
	$num1=$_POST["num1"];
	$num2=$_POST["num2"];
	$result=$num1/$num2;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <div align="center">
    <table width="247" border="2">
      <tr>
        <td width="90">Number 1</td>
        <td width="144"><label for="num1"></label>
        <input type="text" name="num1" id="num1" /></td>
      </tr>
      <tr>
        <td>Number 2</td>
        <td><label for="num2"></label>
        <input type="text" name="num2" id="num2" /></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <input type="submit" name="add" id="add" value="+" />
          <input type="submit" name="sub" id="sub" value="-" />
          <input type="submit" name="mult" id="mult" value="*" />
          <input type="submit" name="div" id="div" value="/" />
        </div></td>
      </tr>
      <tr>
        <td>Result:</td>
      <td><?php echo $result;?></td>
  </tr>
    </table>
  </div>
</form>
<label for="textarea"></label>
<label for="textfield"></label>
</body>
</html>