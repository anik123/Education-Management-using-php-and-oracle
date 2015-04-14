<?php
include("connection.php");
session_start();
$blog=$_POST["blog"];
$count=mysql_query("select * from blogcomment where BlogId=".$blog) or die(mysql_error());
while($row=mysql_fetch_array($count))
{
	$user=mysql_query("select * from user where VersityId='".$row["CommentBy"]."'");
	$user=mysql_fetch_array($user);
	echo " <font style='color:#000'> <b>".$user["FirstName"]." ".$user["LastName"]." </b></font>  : ".$row["Comment"]."<hr>";
	
	}
?>