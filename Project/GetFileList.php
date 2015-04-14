<?php
include("connection.php");
session_start();
$course=$_POST["course"];
$content=oci_parse($conn,"select * from upload where CourseCode='$course' and UploadType='File' order by UploadDate Desc") or die(oci_error());
$count=1;
oci_execute($content);
echo "<table border='1' style='width:100%;border:collapse;'>";
while($row1=oci_fetch_array($content,OCI_ASSOC+OCI_RETURN_NULLS))
{
	

    $path="upload/".$row1["UPLOADBY"]."/".$row1["UPLOADFILE"];
	if($count==0)
	   echo "<tr>";
	
	 echo "<td style='width:25%'><center>Upload On : ".$row1["UPLOADDATE"]." <br><br><img  src='images/f.png' width='135px' height='150px' />
	<br><br><a href='$path'>".$row1["UPLOADFILE"]."</a><br><br>
	
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