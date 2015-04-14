<?php
include 'connection.php';
session_start();
 // http.send("course="+course+"&ques="+ques+"&mark="+mark+"&mark="+mark+"&op1="+op1+"&op2="+op2+"&op3="+op3+"&op4="+op4+"&ans="+ans+"&ql="+ql);
  $course=$_POST["course"];
  $ques=$_POST["ques"];
  $mark=$_POST["mark"];
  $op1=$_POST["op1"];
  $op2=$_POST["op2"];
  $op3=$_POST["op3"];
  $op4=$_POST["op4"];
  $ans=$_POST["ans"];
  $ql=$_POST["ql"];
  
  if($course=="0" || strlen($course)==0)
      echo "<h4 class='alert_error'>Please Select One Exam</h4>";
  else if(strlen($ques)==0)
      echo "<h4 class='alert_error'>Please Write Question</h4>";
  else if(strlen($mark)==0)
      echo "<h4 class='alert_error'>Please Write Mark</h4>";
  else if(strlen($op1)==0)
      echo "<h4 class='alert_error'>Please Write Option 1</h4>";
  else if(strlen($op2)==0)
      echo "<h4 class='alert_error'>Please Write Option 2</h4>";
  else if(strlen($op3)==0)
      echo "<h4 class='alert_error'>Please Write Option 3</h4>";
  else if(strlen($op4)==0)
      echo "<h4 class='alert_error'>Please Write Option 4</h4>";
  else if(strlen($ans)==0)
      echo "<h4 class='alert_error'>Please Write Anwser</h4>";
  else if($ql<=0)
      echo "<h4 class='alert_error'>You Can't Add More Question</h4>";
  else
      {
         $a=oci_parse($conn,"insert into question values(questionid.nextval,$course,'$ques',$mark)") or die(oci_error());
		 oci_execute($a);
		 $check=oci_parse($conn,"select * from question order by QuestionId desc ");
		 oci_execute($check);
		 $check=oci_fetch_array($check,OCI_ASSOC+OCI_RETURN_NULLS);
		 $b=oci_parse($conn,"insert into questionoption values(".$check["QUESTIONID"].",'$op1')") or die(oci_error());
		 oci_execute($b);
		 $c=oci_parse($conn,"insert into questionoption values(".$check["QUESTIONID"].",'$op2')") or die(oci_error());
		 oci_execute($c);
		 $d=oci_parse($conn,"insert into questionoption values(".$check["QUESTIONID"].",'$op3')") or die(oci_error());
		 oci_execute($d);
		 $e=oci_parse($conn,"insert into questionoption values(".$check["QUESTIONID"].",'$op4')") or die(oci_error());
		 oci_execute($e);
		 $f=oci_parse($conn,"insert into questionanswer values(".$check["QUESTIONID"].",'$ans')") or die(oci_error());
		 oci_execute($f);
		 echo "<h4 class='alert_success'>Sucessfully Created</h4>";
      }
      
?>