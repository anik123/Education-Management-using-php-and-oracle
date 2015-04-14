<?php
include("connection.php");
session_start();
$data = $_POST['data'];
$data = explode(',', $data);
foreach($data as $value){
     if(strlen($value)<=0)
	   continue;
	    //echo "<h4 class='alert_error'>".$value."</hr>";
	else{
		$check= oci_parse($conn,"select * from upload where UploadId=$value");
		oci_execute($check);
		$row=oci_fetch_array($check,OCI_ASSOC+OCI_RETURN_NULLS);
		$path="upload/".$_SESSION["user"]."/".$row["UPLOADFILE"];
		if(unlink($path)==true){
			$a=oci_parse($conn,"delete from upload where UploadId=$value");
			oci_execute($a);
		   echo"<h4 class='alert_success'>Sucessfully Deleted</h4>";
		   echo "<meta http-equiv='refresh' content='3;url=UploadStatus.php'></center>";
		}
		else
		   echo "<h4 class='alert_error'>Failed To delete</hr>";
	}
	 
}
//echo "<h4 class='alert_success'>Khali</hr>";	 
?> 