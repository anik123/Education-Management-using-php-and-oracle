<?php
include("connection.php");
session_start();
$course=$_POST["course"];
echo "<header><h3>Course List</h3></header>
       <form onSubmit='return false;' name='myform'>
		<div class='tab_container'>

			
            <div id='tab1' class='tab_content'>
          
			<table  class='tablesorter' > 
			 
   					<thead> <tr>
    <th><center>Course Code</center></th>               
	<th><center>Course Name</center></th>
	<th><center>Teacher Name</center></th>
	<th><center>Obtained Grade</center></th>
	
	
                    </tr> </thead>
         		
			<tbody>
        ";   
		$data1=oci_parse($conn,"select c.CourseCode CourseCode,c.CourseName CourseName from course c,assignstudent a where c.CourseCode=a.CourseCode and a.VersityId='".$_SESSION["user"]."'");
		oci_execute($data1);
		while($row=oci_fetch_array($data1,OCI_ASSOC+OCI_RETURN_NULLS))
		{
			$data2=oci_parse($conn,"select count(*) as G from courseend where CourseCode='".$row["COURSECODE"]."'");
			oci_execute($data2);
			$count=oci_fetch_array($data2,OCI_ASSOC+OCI_RETURN_NULLS);
			if($count["G"]>=1 && $course=="2")
			{
				$grade=oci_parse( $conn,"select f.Mark Mark,u.FirstName FirstName,u.LastName LastName from finalmark f,assignteacher a,user u where a.CourseCode=f.CourseCode and u.VersityId=a.VersityId and  f.VersityId='".$_SESSION["user"]."'");
				oci_execute($grade);
				$grade=oci_fetch_array($grade,OCI_ASSOC+OCI_RETURN_NULLS);
				$gradetext=oci_parse($conn,"select * from grade where LowMark <= ".$grade["MARK"]. " and HighMark>=".$grade["MARK"]);
				oci_execute($gradetext);
				$gradetext=oci_fetch_array($gradetext,OCI_ASSOC+OCI_RETURN_NULLS);
				echo "<tr><td><center>".$row["COURSECODE"]."</center></td>";
			echo "<td><center>".$row["COURSENAME"]."</center></td>";
			echo "<td><center>".$grade["FIRSTNAME"]." ".$grade["LASTNAME"]."</center></td>";
			echo "<td><center>".$gradetext["GRADENAME"]."</center></td></tr>";
			}
			if($count["G"]<=0 && $course=="1")
			{
				$grade=oci_parse($conn,"select u.FirstName FirstName,u.LastName LastName from assignteacher a,userinfo u where a.VersityId=u.VersityId and a.CourseCode='".$row["COURSECODE"]."'");
			    oci_execute($grade);
				$grade=oci_fetch_array($grade,OCI_ASSOC+OCI_RETURN_NULLS);
				
				echo "<tr><td><center>".$row["COURSECODE"]."</center></td>";
			echo "<td><center>".$row["COURSENAME"]."</center></td>";
			echo "<td><center>".$grade["FIRSTNAME"]." ".$grade["LASTNAME"]."</center></td>";
			echo "<td><center>-</center></td></tr>";
			}
			
			}
		
	
		
		echo 	"</tbody> 
			</table>
			</div><!-- end of #tab1 -->
           
            </form>
		</div>";


?>