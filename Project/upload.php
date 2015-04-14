<?php
include("header.php");
include("connection.php");
$course=$_POST["course"];
$uploadtype=$_POST["uploadtype"];
$path="upload/".$_SESSION["user"]."/";
$file = $path . basename($_FILES['upload']['name']); 
if($course=="0" || strlen($course)==0){
    echo "<h4 class='alert_error'>Please Select One Course</h4>";
	echo "<meta http-equiv='refresh' content='3;url=UploadCourseMatarial.php'></center>";
}
else if($uploadtype=="0" || strlen($uploadtype)==0)
{
	echo "<h4 class='alert_error'>Please Select File Type</h4>";
	echo "<meta http-equiv='refresh' content='3;url=UploadCourseMatarial.php'></center>";
}
else if($_FILES["upload"]["name"]==NULL)
{
	echo "<h4 class='alert_error'>Please Choose File</h4>";
	echo "<meta http-equiv='refresh' content='5;url=UploadCourseMatarial.php'></center>";
}
else 
{
	$FileExt = array("doc", "docx", "ppt", "pptx","Zip","rar");
	$AudioExt=array("mp3", "wma", "amr","wmv","m4a");
	$videoExt=array("mp4");
	$ext=pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);
	if($uploadtype=="File")
	{
		if(in_array($ext,$FileExt)){
		    echo "<h4 class='alert_success'>Allowed</h4>";
			if(is_dir("$path"))
			{
				 if(!file_exists("$path".$_FILES["upload"]["name"]))
				 {
				
				 move_uploaded_file($_FILES['upload']['tmp_name'], $file);
				 $a=oci_parse($conn,"insert into upload values(uploadid.nextval,'$course','".$_FILES["upload"]["name"]."','$uploadtype','".$_SESSION["user"]."',to_date('".date("Y-m-d")."','YYYY-MM-DD'))");
				 oci_execute($a);
				 echo "<h4 class='alert_success'>Sucessfully Uploaded</h4>";
				  echo "<meta http-equiv='refresh' content='5;url=UploadCourseMatarial.php'></center>";
				}
				 else 
				 {
					 echo "<h4 class='alert_error'>File Already Exists</h4>";
		   echo "<meta http-equiv='refresh' content='5;url=UploadCourseMatarial.php'></center>";
			    }
				   
			}
			else {
			    mkdir("upload/".$_SESSION["user"],0777);
				if(!file_exists("$path".$_FILES["upload"]["name"]))
				 {
				 move_uploaded_file($_FILES['upload']['tmp_name'], $file);
				 $b=oci_parse($conn,"insert into upload values(uploadid.nextval,'$course','".$_FILES["upload"]["name"]."','$uploadtype','".$_SESSION["user"]."',to_date('".date("Y-m-d")."','YYYY-MM-DD'))");
				 oci_execute($b);
				 echo "<h4 class='alert_success'>Sucessfully Uploaded</h4>";
				  echo "<meta http-equiv='refresh' content='5;url=UploadCourseMatarial.php'></center>";
				}
				 else 
				 {
					 echo "<h4 class='alert_error'>File Already Exists</h4>";
		   echo "<meta http-equiv='refresh' content='5;url=UploadCourseMatarial.php'></center>";
			    }
			}
		}
		else{
		   echo "<h4 class='alert_error'>Invaild Type of file for this file type</h4>";
		   echo "<meta http-equiv='refresh' content='5;url=UploadCourseMatarial.php'></center>";
		}
	}
	else if($uploadtype=="Audio")
	{
		if(in_array($ext,$AudioExt)){
		    echo "<h4 class='alert_success'>Allowed</h4>";
			if(is_dir("$path"))
			{
				 if(!file_exists("$path".$_FILES["upload"]["name"]))
				 {
					 
				 move_uploaded_file($_FILES['upload']['tmp_name'], $file);
				 $c=oci_parse($conn,"insert into upload values(uploadid.nextval,'$course','".$_FILES["upload"]["name"]."','$uploadtype','".$_SESSION["user"]."',to_date('".date("Y-m-d")."','YYYY-MM-DD'))");
				 oci_execute($c);
				 echo "<h4 class='alert_success'>Sucessfully Uploaded</h4>";
				  echo "<meta http-equiv='refresh' content='5;url=UploadCourseMatarial.php'></center>";
				}
				 else 
				 {
					 echo "<h4 class='alert_error'>File Already Exists</h4>";
		   echo "<meta http-equiv='refresh' content='5;url=UploadCourseMatarial.php'></center>";
			    }
				   
			}
			else {
			    mkdir("upload/".$_SESSION["user"],0777);
				if(!file_exists("$path".$_FILES["upload"]["name"]))
				 {
				 move_uploaded_file($_FILES['upload']['tmp_name'], $file);
				 $d=oci_parse($conn,"insert into upload values(uploadid.nextval,'$course','".$_FILES["upload"]["name"]."','$uploadtype','".$_SESSION["user"]."',to_date('".date("Y-m-d")."'),'YYYY-MM-DD')");
				 oci_execute($d);
				 echo "<h4 class='alert_success'>Sucessfully Uploaded</h4>";
				  echo "<meta http-equiv='refresh' content='5;url=UploadCourseMatarial.php'></center>";
				}
				 else 
				 {
					 echo "<h4 class='alert_error'>File Already Exists</h4>";
		   echo "<meta http-equiv='refresh' content='5;url=UploadCourseMatarial.php'></center>";
			    }
			}
		}
		else{
		   echo "<h4 class='alert_error'>Invaild Type of file for this file type</h4>";
		   echo "<meta http-equiv='refresh' content='5;url=UploadCourseMatarial.php'></center>";
		   }
	}
	else if($uploadtype=="Video")
	{
		if(in_array($ext,$videoExt)){
		    echo "<h4 class='alert_success'>Allowed</h4>";
			if(is_dir("$path"))
			{
				 if(!file_exists("$path".$_FILES["upload"]["name"]))
				 {
				 move_uploaded_file($_FILES['upload']['tmp_name'], $file);
				 $e=oci_parse($conn,"insert into upload values(uploadid.nextval,'$course','".$_FILES["upload"]["name"]."','$uploadtype','".$_SESSION["user"]."',to_date('".date("Y-m-d")."','YYYY-MM-DD'))");
				 oci_execute($e);
				 echo "<h4 class='alert_success'>Sucessfully Uploaded</h4>";
				  echo "<meta http-equiv='refresh' content='5;url=UploadCourseMatarial.php'></center>";
				}
				 else 
				 {
					 echo "<h4 class='alert_error'>File Already Exists</h4>";
		   echo "<meta http-equiv='refresh' content='5;url=UploadCourseMatarial.php'></center>";
			    }
				   
			}
			else {
			    mkdir("upload/".$_SESSION["user"],0777);
				if(!file_exists("$path".$_FILES["upload"]["name"]))
				 {
				 move_uploaded_file($_FILES['upload']['tmp_name'], $file);
				 $f=oci_parse($conn,"insert into upload values(uploadid.nextval,'$course','".$_FILES["upload"]["name"]."','$uploadtype','".$_SESSION["user"]."',to_date('".date("Y-m-d")."','YYYY-MM-DD'))");
				 oci_execute($f);
				 echo "<h4 class='alert_success'>Sucessfully Uploaded</h4>";
				  echo "<meta http-equiv='refresh' content='5;url=UploadCourseMatarial.php'></center>";
				}
				 else 
				 {
					 echo "<h4 class='alert_error'>File Already Exists</h4>";
		   echo "<meta http-equiv='refresh' content='5;url=UploadCourseMatarial.php'></center>";
			    }
			}
		}
		else{
		   echo "<h4 class='alert_error'>Invaild Type of file for this file type</h4>";
		   echo "<meta http-equiv='refresh' content='5;url=UploadCourseMatarial.php'></center>";
		}
	}
}
   


include("footer.php");
?>