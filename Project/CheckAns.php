<?php
include("header.php");
include("connection.php");
$examid=$_POST["examid"];
$ques=$_POST["ques"];
echo "<h4 class='alert_success'>Sucessfully Submitted</h4>";
$num=0;
$total=0;
$ansno=0;
for($i=1;$i<=$ques;$i++)
{
	$index="op".$i;
	if(isset($_POST[$index]))
	{
		$ans=$_POST[$index];
		$ans=explode("#",$ans);
		//echo "Question Id ".$ans[0]."<br>";
		//echo "Given Answer ".$ans[1]."<br>";
		$GetAns=oci_parse($conn,"select count(*) as G from questionanswer where QuestionId=".$ans[0]." and Answer='".$ans[1]."'");
		oci_execute($GetAns);
		$GetAns=oci_fetch_array($GetAns,OCI_ASSOC+OCI_RETURN_NULLS);
		$GetNum=oci_parse($conn,"select * from question where QuestionId=".$ans[0]);
		oci_execute($GetNum);
		$GetNum=oci_fetch_array($GetNum,OCI_ASSOC+OCI_RETURN_NULLS);
		if($GetAns["G"]>0)
		{
			
			$num+=$GetNum["QUESTIONMARK"];
			$total +=$GetNum["QUESTIONMARK"];
			$ansno++;
			
		}
		else 
		{
			$total +=$GetNum["QUESTIONMARK"];
			}
		}
}
$extra=oci_parse($conn,"select c.CourseName CourseName,e.ExamType ExamType , e.ExamMark ExamMark from exam e , course c where e.CourseCode=c.CourseCode and e.ExamId=$examid");
oci_execute($extra);
$extra=oci_fetch_array($extra,OCI_ASSOC+OCI_RETURN_NULLS);
$total = ceil($num*$extra["EXAMMARK"])/$total;
if(ceil($extra["EXAMMARK"]/2)>$total)
     // $a=oci_parse($conn,"insert into message values(messageid.Nextval,'10-00000-1','".$_SESSION["user"]."','".$extra["EXAMTYPE"]."','You have scored below 50% in this exam','Close',to_date(sysdate,'YYYY-MM-DD'))") or die(oci_error());
	  //oci_execute($a);
echo "<pre>";
echo "<h4 class='alert_info'>Course Name   : ".$extra["COURSENAME"]."</h4><br>";
echo "<h4 class='alert_info'>Exam Type     : ".$extra["EXAMTYPE"]."</h4><br>";
echo "<h4 class='alert_info'>Obtained Mark : ".$total."</h4><br>";
echo "<h4 class='alert_info'>Correct Anser : ".$ansno."</h4><br>";
echo "</pre>";

$b=oci_parse($conn,"insert into mark values($examid,'".$_SESSION["user"]."',$ansno,$total)");
oci_execute($b);
include("footer.php");
?>