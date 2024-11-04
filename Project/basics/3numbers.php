<?php
$greatestnumberis="";
if(isset($_POST["check"]))
{
	$num1=$_POST["num1"];
	$num2=$_POST["num2"];
	$num3=$_POST["num3"];
	
	if(($num1>$num2)&($num1>$num3))
	{
		$greatestnumberis=$num1;
	}
	else if (($num2>$num1)&($num2>$num3))
	{
		$greatestnumberis=$num2;
	}
	else
	{
		$greatestnumberis=$num3;
	}
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
<div align="center"></div>
<div align="center"></div>
<table width="335" border="1">
  <tr>
    <td width="164"><div align="left">Number 1</div></td>
    <td width="155"><label for="num1"></label>
      <input type="text" name="num1" id="num1" /></td>
  </tr>
  <tr>
    <td>Number 2</td>
    <td><label for="num2"></label>
      <input type="text" name="num2" id="num2" /></td>
  </tr>
  <tr>
    <td>Number 3</td>
    <td><label for="num3"></label>
      <input type="text" name="num3" id="num3" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="check" id="check" value="CHECK" /></td>
    </tr>
  <tr>
    <td>GREATEST NUMBER IS:</td>
    <td><?php echo $greatestnumberis;?></td>
  </tr>
</table>
</form>
</body>
</html>