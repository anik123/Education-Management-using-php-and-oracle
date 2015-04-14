<?php
include("connection.php");
session_start();
$blog=$_POST["blog"];
$count=mysql_query("select * from bloglike where BlogId=".$blog) or die(mysql_error());
$count=mysql_num_rows($count);
echo $count;
?>