<?php
include("connection.php");
session_start();
$blog=$_POST["blog"];
$cm=$_POST["cm"];
mysql_query("insert into blogcomment values(null,$blog,'$cm','".$_SESSION["user"]."','".date("Y-m-d H:i:s")."')") or die(mysql_error());
echo "Successfully Comment";
?>