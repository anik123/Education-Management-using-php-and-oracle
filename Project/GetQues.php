<?php
include("connection.php");
session_start();
$course=$_POST["course"];
$id=1;
$data=oci_parse($conn,"select * from question where ExamId=$course");
			oci_execute($data);
			echo "<ol>";
				while($row=oci_fetch_array($data,OCI_ASSOC+OCI_RETURN_NULLS)){
               
					echo "<li><h2>".$row["QUESTION"]."</h2></li><fieldset>
                 <table  style='width:92%'>
                 <tr>";
					$data1=oci_parse($conn,"select * from questionoption where QuestionId=".$row["QUESTIONID"]);
					oci_execute($data1);
					while($row1=oci_fetch_array($data1,OCI_ASSOC+OCI_RETURN_NULLS))
					{
						echo "<td><input type='radio' name='op".$id."' value='".$row["QUESTIONID"]."#".$row1["OPTIONNAME"]."' >".$row1["OPTIONNAME"]."</td>";
						}
						$id++;
				echo "</tr></table></fieldset>";
				}
				echo "</ol>";



?>