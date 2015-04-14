<?php
include("connection.php");
session_start();

$vid=$_GET["vid"];
$data=mysql_query("select * from user where VersityId='$vid'");
$check=mysql_num_rows($data);
if($check>0){
$data=mysql_fetch_array($data);
echo $data["FirstName"]." ".$data["LastName"];
}
else
{
	echo "no";
	}
?>