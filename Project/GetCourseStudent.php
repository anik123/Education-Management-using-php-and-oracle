<?php
include("connection.php");
session_start();
$course=$_POST["course"];
echo "<header><h3 class='tabs_involved'>Uploaded Matarial</h3></header><form onSubmit='return false;' name='myform'><div class='tab_container'><div id='tab1' class='tab_content'><table  class='tablesorter' ><thead> <tr><th><center>Student Id</center></th><th><center>Student Name</center></th><th><center>Exam Mark</center></th><th><center>Exam Grade</center></th></tr></thead><tbody>";

		$data1=mysql_query("select * from assignstudent where CourseCode='$course'") or die(mysql_error());
		
		
		while($row=mysql_fetch_array($data1))
		{
		
			
			$markdata=mysql_query("select * from finalmark where VersityId='".$row["VersityId"]."'") or die(mysql_error());
			$count=mysql_num_rows($markdata);
			$grademark=0;
			$grade="";
			if($count==1)
			{
				$markdata=mysql_fetch_array($markdata);
				$mark12=intval($markdata["Mark"]);
				//echo $mark12;
					$grade=mysql_query("SELECT * FROM  `grade` WHERE LowMark <= $mark12 AND HighMark >= $mark12 " ) or die(mysql_error());
					$grade=mysql_fetch_array($grade);
					$grade=$grade["GradeName"];
					
					$grademark=$markdata["Mark"];
			}
			else
			{
				$grade="F";
				$grademark=0;
			}
			
			$studentdata=mysql_query("select * from user where VersityId='".$row["VersityId"]."'") or die(mysql_error());
			$studentdata=mysql_fetch_array($studentdata);
		
			//$coursedata=mysql_fetch_array($coursedata);
		    echo "<tr><td><center>".$studentdata["VersityId"]."</center></td>";
			echo "<td><center><a href='GraceUser.php?UserId=".$studentdata["UserId"]."|".$markdata["CourseCode"]."'>".$studentdata["FirstName"]." ".$studentdata["LastName"]."</a></center></td>";
			echo "<td><center>".$grademark."</center></td>";
			echo "<td><center>".$grade."</center></td></tr>";
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