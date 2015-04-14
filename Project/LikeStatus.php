<?php
include("connection.php");
session_start();
$blog=$_POST["blog"];
$count=mysql_query("select * from bloglike where BlogId=".$blog." and LikeBy='".$_SESSION["user"]."'") or die(mysql_error());
$count=mysql_num_rows($count);
if($count>0)
{
	
	echo "Unlike";
}
else 
{
	echo "Like";
	}
?>