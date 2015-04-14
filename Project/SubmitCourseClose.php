<?php
include("connection.php");
session_start();
$course=$_POST["course"];
if($course=="0" || strlen($course)==0)
   echo " <h4 class='alert_error'>Choose One Course</h4>";
else 
{
	$check=oci_parse($conn,"select count(*) as G from courseend where CourseCode='$course'");
	
	oci_execute($check);
	$check=oci_fetch_array($check,OCI_ASSOC+OCI_RETURN_NULLS);
	if($check["G"]>=1)
	   echo " <h4 class='alert_error'>It's Already Closed</h4>";
	else 
	{
	
		$data=oci_parse($conn,"select * from assignstudent where CourseCode='$course'");
		oci_execute($data);
		while($row=oci_fetch_array($data,OCI_ASSOC+OCI_RETURN_NULLS))
		{
			$quiz=0;
			$examMark=0;
		    $term=0;
			$ExamTerm=0;
			$data1=oci_parse($conn,"select e.ExamType ExamType,e.ExamMark ExamMark,m.ObtainedMark ObtainedMark from exam e , mark m where m.ExamId=e.ExamId and m.VersityId='".$row["VERSITYID"]."'");
			oci_execute($data1);
			while($row1=oci_fetch_array($data1,OCI_ASSOC+OCI_RETURN_NULLS))
			{
				if($row1["EXAMTYPE"]=="1st Quiz" || $row1["EXAMTYPE"]=="2nd Quiz"  || $row1["EXAMTYPE"]=="3rd Quiz"){
				  $quiz+=$row1["OBTAINEDMARK"];
				  $examMark += $row1["EXAMMARK"];
				}
				else{ 
				 $term+=$row1["OBTAINEDMARK"];
				 $ExamTerm += $row1["EXAMMARK"];
				}
			}
			
			if($examMark>0 && $ExamTerm>0){
			$quiz=($quiz*100)/$examMark;
			$term=($term*100)/$ExamTerm;
			$total=($quiz*0.20)+($term*0.80);
			$total=ceil($total);
			$a=oci_parse($conn,"insert into courseend values(courseendid.nextval,'$course','".$_SESSION["user"]."',to_date('".date("Y-m-d")."','YYYY-MM-DD'))");
			oci_execute($a);
			$b=oci_parse($conn,"insert into finalmark values(finalmarkid.nextval,'$course','".$_SESSION["user"]."',$total)");
			oci_execute($b);
			echo    "<h4 class='alert_success'>Sucessfully Closed</h4>";
			}
		//echo $examMark ." ".$ExamTerm;
		}
	}
}
?>