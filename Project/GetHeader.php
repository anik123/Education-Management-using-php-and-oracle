<?php
include("connection.php");
session_start();
$course=$_POST["course"];
$exam=$_POST["exam"];

	echo "<header><h3 class='tabs_involved'>Exam List</h3>
		</header>
       <form onSubmit='return false;' name='myform'>
		<div class='tab_container'>

			
            <div id='tab1' class='tab_content'>
          
			<table  class='tablesorter' > 
			 
   					<thead> <tr>
                   
	<th><center>Course Code</center></th>
	<th><center>Course Name</center></th>
	<th><center>Exam Type</center></th>
	<th><center>Exam Mark</center></th>
	<th><center>Total Question</center></th>
	<th><center>Exam Duration</center></th>
	<th><center>Question Created</center></th>
	<th><center>Exam Date</center></th>
                    </tr> </thead>
         		
			<tbody>
        ";   
		if($course!="0" && $exam=="0")
		$data1=oci_parse($conn,"select * from View_Teacher_ExamList_p_past where CourseCode='$course'") or die(oci_error());
		else if($course=="0" && $exam=="0")
		$data1=oci_parse($conn,"select * from View_Teacher_ExamList_All where VersityId='".$_SESSION["user"]."'") or die(oci_error());
		else if($course!="0" && $exam=="past")
		$data1=oci_parse($conn,"select * from View_Teacher_ExamList_p_past where CourseCode='$course' and ExamDate<=sysdate") or die(oci_error());
		else if($course!="0" && $exam=="future")
		$data1=oci_parse($conn,"select * from View_Teacher_ExamList_p_past where CourseCode='$course'  and ExamDate>sysdate") or die(oci_error());
		else if($course=="0" && $exam=="past")
		$data1=oci_parse($conn,"select * from View_Teacher_ExamList_All where  ExamDate<=sysdate and VersityId='".$_SESSION["user"]."'" ) or die(oci_error());
		else if($course=="0" && $exam=="future")
		$data1=oci_parse($conn,"select * from View_Teacher_ExamList_All where ExamDate>sysdate and VersityId='".$_SESSION["user"]."'" ) or die(oci_error());
		
		oci_execute($data1) or die(oci_error());
		while($row=oci_fetch_array($data1,OCI_ASSOC+OCI_RETURN_NULLS))
		{
			
			echo "<td><center>".$row["COURSECODE"]."</center></td>";
			echo "<td><center>".$row["COURSENAME"]."</center></td>";
			echo"<td><center>".$row["EXAMTYPE"]."</center></td>";
			echo"<td><center>".$row["EXAMMARK"]."</center></td>";
			echo"<td><center>".$row["EXAMTOTALQUESTION"]."</center></td>";
			echo"<td><center>".$row["EXAMDURATION"]."</center></td>";
			
			$data2=oci_parse($conn,"select count(*) as G from question where ExamId=".$row["EXAMID"]) or die(oci_error());
			oci_execute($data2);
			$data2=oci_fetch_array($data2,OCI_ASSOC+OCI_RETURN_NULLS);
			
			echo"<td><center>".$data2["G"]."</center></td>";
			echo"<td><center>".$row["EXAMDATE"]."</center></td></tr>";
			}
		
		echo 	"</tbody> 
			</table>
			</div><!-- end of #tab1 -->
            <footer>
				<div class='submit_link'>
					
					
				</div>
                
			</footer>
            </form>
		</div>";


?>