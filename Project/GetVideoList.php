<?php
include("connection.php");
session_start();
$course=$_POST["course"];
$content=oci_parse($conn,"select * from upload where CourseCode='$course' and UploadType='Video' order by UploadDate Desc") or die(oci_error());
oci_execute($content);
$count=1;
echo "<table border='1' style='width:100%;border:collapse;'>";
while($row1=oci_fetch_array($content,OCI_ASSOC+OCI_RETURN_NULLS))
{
	$datepicker=$row1["UPLOADDATE"];
 
	if($count==0)
	   echo "<tr>";
	
	 echo "<td style='width:25%'><center>Upload On : $datepicker <br><br><img  src='images/p.png' width='135px' height='150px' />
	<br><br><a href='Video.php?VideoId=".$row1["UPLOADID"]."'>".$row1["UPLOADFILE"]."</a><br><br>
	
	</td></center>";
	$count++;
	//echo $row1["UploadFile"];
	if($count==3)
	{
		echo "</tr>";
		$count=1;
	}
	}
	echo "</table>";
//while
?>