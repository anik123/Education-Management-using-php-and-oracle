<?php
include('connection.php');
session_start();
$cate=$_POST["cate"];
if(strlen($cate)<=0)
{
	echo " <h4 class='alert_error'>Type CategoryName</h4>";
}
else
{
	   mysql_query("insert into category values(null,'$cate','".$_SESSION["user"]."','".date("Y-m-d H:i:s")."')") or die(mysql_error());
	   echo "<h4 class='alert_success'>Sucessfully Created</h4>";
	}
?>