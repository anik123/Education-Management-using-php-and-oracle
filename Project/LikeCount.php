<?php
include("connection.php");
session_start();
$blog=$_POST["blog"];
$count=mysql_query("select * from bloglike where BlogId=".$blog." and LikeBy='".$_SESSION["user"]."'") or die(mysql_error());
$count=mysql_num_rows($count);
if($count>0)
{
	mysql_query("delete from bloglike where BlogId=".$blog." and LikeBy='".$_SESSION["user"]."'") or die(mysql_error());
	echo "Like";
}
else 
{
	mysql_query("insert into bloglike values(null,$blog,'".$_SESSION["user"]."','".date("Y-m-d H:i:s")."') ") or die(mysql_error());
	echo "Unlike";
	}
?>