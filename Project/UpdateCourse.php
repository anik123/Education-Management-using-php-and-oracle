<?php
include("connection.php");
   session_start();
 if(!isset($_SESSION["user"]))
         header("Location: http://localhost/myProject/munni/index.php");
  else{
	if(isset($_GET["CourseId"]))
	   	$CourseId=$_GET["CourseId"];

  }
  ?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Online Education System</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
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
	
	//document.getElementById("error").innerHTML="<h4 class='alert_success'>Sucessfully Submitted</h4>";
	//var v= document.forms["course"];
	var cid= document.getElementById("cid");
	//alert(v.value);
	var desc=document.getElementById("desc")
	var cname=document.getElementById("cname");
	var maxs=document.getElementById("maxs");
	var state=document.getElementById("state");
	var coid=document.getElementById("coid");
	if(cid.value.length<=0)
	{ 
		document.getElementById("error").innerHTML="<h4 class='alert_error'>Course id is empty</h4>";
		//return false
	}
	
	if(cname.value.length<=0)
	{
		document.getElementById("error").innerHTML="<h4 class='alert_error'>Course name is empty</h4>";
		//return false
	}
	
	if(maxs.value.length<=0)
	{
		document.getElementById("error").innerHTML="<h4 class='alert_error'>Max Student is empty</h4>";
		//return false
	}
	if(maxs.value.length>0 && isNaN(maxs.value))
	{
		document.getElementById("error").innerHTML="<h4 class='alert_error'>Max Student must be a number</h4>";
		//return false
	}
	else 
	{
	   var http=new XMLHttpRequest();
	   http.open("GET","SubmitCourseUpdate.php?cid="+cid.value+"&cname="+cname.value+"&desc="+desc.value+"&maxs="+maxs.value+"&state="+state.value+"&coid="+coid.value,false);
	   http.send();
	   var data=http.responseText;
	   if(data.length>1)
	       document.getElementById("error").innerHTML="<h4 class='alert_error'>"+data+"</h4>";
	   else if(data.length==1)
	        document.getElementById("error").innerHTML="<h4 class='alert_success'>Sucessfully Submitted</h4>";
	   else
	      alert("jai nai :D");
	}
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
	echo "<li class='icn_view_users'><a href='AssignTeacher.php'>Assign Teacher</a></li>
			<li class='icn_view_users'><a href='AssignStudent.php'>Assign Student</a></li>
			<li class='icn_view_users'><a href='AssignAcm.php'>Assign To ACM</a></li>";
	}
?>
           
            
        </ul>
		 <h3>Message</h3>
         <ul class="toggle">
          <li class="icn_edit_article"><a href="ComposeMessage.php">Compose Message</a></li>
            <li class="icn_folder"><a href="InboxMessage.php">Inbox<?php $count=mysql_query("select * from message where ToUser='".$_SESSION["user"]."' and Flag='Close'");$count=mysql_num_rows($count); if($count>=1) echo " <span style='color:#FF0000;'>[ ".$count." ]</span>"; ?></a></li>
            <li class="icn_folder"><a href="HelpAdmin.php">Help Admin</a></li>
         </ul>
        
         <?php
		 
if($query["Role"]=="Teacher")
{
	echo " <h3>Exam</h3>
        <ul class='toggle'><li class='icn_edit_article'><a href='CreateExam.php'>Create Exam</a></li>
            <li class='icn_categories'><a href='ExamStatus.php'>Exam Status</a></li>
            <li class='icn_edit_article'><a href='CreateQues.php'>Create Question</a></li>
			<li class='icn_edit_article'><a href='QuesStatus.php'>View Question</a></li>";
}
if($query["Role"]=="user")
   echo "<h3>Exam</h3>
        <ul class='toggle'>";
if($query["Role"]=="Teacher" || $query["Role"]=="user")
  echo "<li class='icn_settings'><a href='CurrentExam.php'>Current Exam</a></li>";
if($query["Role"]=="user")
   echo "<li class='icn_edit_article'><a href='MyMarkStatus.php'>My Mark Status</a></li></ul>";
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
        </ul>
		";
		
		
}
if($query["Role"]=="Admin")
   echo "<h3>Notice</h3>
        <ul class='toggle'>
            <li class='icn_edit_article'><a href='CreateNotice.php'>Create Notice</a></li>
            <li class='icn_categories'><a href='NoticeStatus.php'>View Notice</a></li>
        </ul>
		";
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
		
		<span id="error"></span>
		<article class="module width_half">
         
			<form id="form1" onSubmit="return false;">
            <header><h3>Update Course</h3></header>
				<?php
				 $coursedata=mysql_query("select * from course where CourseId=".$CourseId);
				 $coursedata=mysql_fetch_array($coursedata);
				?>
                <div class="module_content">
               
						<fieldset>
                        <input type="hidden" id="coid" value="<?php echo $CourseId; ?>" />
							<label>Course Id</label>
							<input type="text" style="width:92%;" id="cid"  value="<?php echo $coursedata["CourseCode"]; ?>"/>
						</fieldset>
                        <fieldset>
							<label>Course Name</label>
							<input type="text" style="width:92%" id="cname" value="<?php echo $coursedata["CourseName"]; ?>"/>
						</fieldset>
						<fieldset>
							<label>Description</label>
							<textarea id="desc" style="width:92%" rows="5"> <?php echo $coursedata["Description"]; ?></textarea>
						</fieldset>
                        <fieldset>
							<label>Max Student</label>
							<input type="text" style="width:92%" id="maxs" value="<?php echo $coursedata["MaxStudent"]; ?>"/>
						</fieldset>
						 <fieldset>
							<label>Status</label>
							<select style="width:92%" id="state">
                            <option value="Open" selected>Open
                            </option>
                            <option value="Close">Close
                            </option>
                            </select>
						</fieldset>
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					
					<input type="submit" onClick="check();" value="Update" class="alt_btn" />
					<input type="reset" value="Reset" class="alt_btn" />
				</div>
                
			</footer></form>
           
		</article><!-- end of styles article -->
		<div class="spacer"></div>
	</section>


</body>

</html>