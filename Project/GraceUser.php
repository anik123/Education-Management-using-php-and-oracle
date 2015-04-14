<?php
include("connection.php");
   session_start();
if(!isset($_SESSION["user"]))
         header("Location: http://localhost/myProject/munni/index.php");
	else{
		 if(isset($_GET["UserId"])){
			 $value=$_GET["UserId"];
			 $value=explode("|", $value);
			 //echo strlen($value);
			 $UserId=$value[0];
			 $CourseCode=$value[1];
			// echo $value[0]." ".$value[1]; 
			 
		 }
	}
		
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Dashboard I Admin Panel</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
     <link rel="stylesheet" href="calender/jquery-ui.css" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
    
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
    <link rel="stylesheet" media="all" type="text/css" href="js/jquery-ui.css" />
		<link rel="stylesheet" media="all" type="text/css" href="js/jquery-ui-timepicker-addon.css" />
		<link rel="stylesheet" media="all" type="text/css" href="http://code.jquery.com/ui/1.9.1/themes/smoothness/jquery-ui.css" />
		
		
    <script src="calender/jquery-1.8.2.js"></script>
    <script src="calender/jquery-ui.js"></script>
    <script>
    $(function() {
        $( "#datepicker" ).datepicker();
		
    });
    </script>
  
	<script type="text/javascript">
	$(document).ready(function() 
    { 
      	  $(".tablesorter").tablesorter(); 
		  
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>
<script type="text/javascript">
function check()
{
	
		var course=document.getElementById("course").value;
	var vid=document.getElementById("vid").value;
	var mark=document.getElementById("mark").value;
	var bonus=document.getElementById("bonus").value;
	var http= new XMLHttpRequest();
	http.open("POST","SubmitGraceUser.php",false);
	http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	http.send("course="+course+"&vid="+vid+"&mark="+mark+"&bonus="+bonus);
	document.getElementById("error").innerHTML=http.responseText;
}
	
	
	
</script>

</head>


<body>

	<header id="header">
		<hgroup>
       <h1 class="site_title">Welcome
             <?php
			$query=mysql_query("select * from user where VersityId='".$_SESSION["user"]."'");
			$query=mysql_fetch_array($query);
			echo " ".$query["FirstName"]." ".$query["LastName"]."</h2>";
			?></h1>
			<h2 class="section_title"></h2>
            <div class="btn_view_site">
            <a href="LogOut.php">Log out</a>
            
            </div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
			
		<hr/>
        <h3>Home</h3>
        <ul class="toggle">
           <li class="icn_tags"><a href="Home.php">Home</a></li>
        </ul>
		<h3>Course</h3>
        <ul class="toggle">
<?php
if($query["Role"]=="Admin")
{
	echo "<li class='icn_new_article'><a href='CreateCourse.php'>Create Course</a></li>";
	}
?>
           
           <li class="icn_edit_article"><a href="CourseStatus.php">View Course List</a></li>
           <?php
if($query["Role"]=="Admin")
{
	echo "<li class='icn_view_users'><a href='AssignTeacher.php'>Assign To Teacher</a></li>
			<li class='icn_view_users'><a href='AssignStudent.php'>Assign To Student</a></li>";
	}
?>
           
            
        </ul>
		 <h3>Message</h3>
         <ul class="toggle">
          <li class="icn_edit_article"><a href="ComposeMessage.php">Compose Message</a></li>
            <li class="icn_folder"><a href="InboxMessage.php">Inbox</a></li>
         </ul>
        
         <?php
		 
if($query["Role"]=="Teacher")
{
	echo " <h3>Exam</h3>
        <ul class='toggle'><li class='icn_edit_article'><a href='CreateExam.php'>Create Exam</a></li>
            <li class='icn_categories'><a href='ExamStatus.php'>Exam Status</a></li>
            <li class='icn_edit_article'><a href='CreateQues.php'>Create Question</a></li>";
}
if($query["Role"]=="user")
   echo "<h3>Exam</h3>
        <ul class='toggle'>";
if($query["Role"]=="Teacher" || $query["Role"]=="user")
  echo "<li class='icn_settings'><a href='CurrentExam.php'>Current Exam</a></li>";
if($query["Role"]=="user")
   echo "</ul>";
?>
        
            
            <?php
if($query["Role"]=="Teacher")
{
	echo "<li class='icn_security'><a href='MarkStatus.php'>Mark Status</a></li></ul>";
	}
?>
        <h3>User Panel</h3>
        <ul class="toggle">
         <?php
if($query["Role"]=="Admin")
{
	echo "<li class='icn_edit_article'><a href='CreateUser.php'>Create User</a></li>";
	echo "<li class='icn_edit_article'><a href='UserList.php'>Change User</a></li>";
	}
?>
        
            <li class="icn_add_user"><a href="UpdateUser.php">Update User</a></li>
            <?php
			
            echo "<li class='icn_profile'><a href='UserDetails.php?ProfileId=".$query["UserId"]."'>Profile</a></li>";
        ?>
		</ul>
        
         <?php
if($query["Role"]=="Admin")
{
	echo "<h3>Admin Panel</h3>
        <ul class='toggle'><li class='icn_categories'><a href='BelowMark.php'>Analize Mark</a></li>
	<li class='icn_security'><a href='GradeClose.php'>Close Grade</a></li></ul>";
}
else if($query["Role"]=="Teacher")
   echo " <h3>Admin Panel</h3>
        <ul class='toggle'><li class='icn_security'><a href='CourseClose.php'>Close Course</a></li> </ul>";
?>
         
           
            
       <?php
	   if($query["Role"]=="user")
{
       echo "<h3>Media</h3>
        <ul class='toggle'>
            <li class='icn_video'><a href='Video.php'>Video</a></li>
            <li class='icn_audio'><a href='Audio.php'>Audio</a></li>
            <li class='icn_photo'><a href='File.php'>File</a></li>
        </ul>";
}
		?>
         <?php
	   if($query["Role"]=="Teacher")
{
       echo "<h3>Management</h3>
        <ul class='toggle'>
            <li class='icn_edit_article'><a href='UploadCourseMatarial.php'>Upload Matarial</a></li>
            <li class='icn_categories'><a href='UploadStatus.php'>View Content</a></li>
        </ul>";
}
		?>
		
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2012 Anik Islam</strong></p>
			
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		
		
		
		
		<!-- end of messages article -->
		
		<div class="clear"></div>
		
		<!-- end of post new article -->
		<?php
		   
		     $data=mysql_query("select u.VersityId VersityId,u.FirstName FirstName,u.LastName LastName,c.CourseCode CourseCode,c.CourseName CourseName from user u,course c,assignstudent a where c.CourseCode=a.CourseCode and u.VersityId=a.VersityId and c.CourseCode='$CourseCode' and u.UserId=$UserId");
		      $row=mysql_fetch_array($data);
		?>
		<span id="error"></span>
		<article class="module width_half">
         
			<form id="form1" onSubmit="return false;">
            <header><h3>Update Profile</h3></header>
				
                <div class="module_content">
               
               <fieldset>
							<label>Course Code</label>
							<input type="text" readonly="true" style="width:92%;" id="course" value="<?php echo $row["CourseCode"]; ?>" />
						</fieldset>
						
                        <fieldset>
							<label>Course Name</label>
							<input type="text" style="width:92%;" readonly="true"  value="<?php echo $row["CourseName"]." ".$row["LastName"]; ?>" />
						</fieldset>
						 <fieldset>
							<label>Student Id</label>
							<input type="text" readonly="true" style="width:92%;" id="vid" value="<?php echo $row["VersityId"]; ?>" />
						</fieldset>
						
                        <fieldset>
							<label>Student Name</label>
							<input type="text" style="width:92%;" readonly="true"  value="<?php echo $row["FirstName"]." ".$row["LastName"]; ?>" />
						</fieldset>
						
                        <fieldset>
							<label>Obtained Mark</label>
                           <input type="text" style="width:92%;" id="mark" readonly="true" value="<?php 
						   $gmark=mysql_query("select * from finalmark where VersityId='".$row["VersityId"]."'");
						   $gmark=mysql_fetch_array($gmark);
						   echo $gmark["Mark"]; ?>" />               
						</fieldset>
                        <fieldset>
							<label>Bonus</label>
                            
							<input type="text"  style="width:92%;" id="bonus" />                           
						</fieldset>
                        
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					
					<input type="submit" onClick="check();" value="Add Bonus" class="alt_btn" />
					
				</div>
                
			</footer></form>
           
		</article><!-- end of styles article -->
		<div class="spacer"></div>
	</section>


</body>

</html>

