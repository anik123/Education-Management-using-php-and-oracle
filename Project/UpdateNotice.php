<?php
include("connection.php");
   session_start();
if(!isset($_SESSION["user"]))
         header("Location: http://localhost/myProject/munni/index.php");
else{		
	if(isset($_GET["NoticeId"]))
	$NoticeId=$_GET["NoticeId"];

}
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Online Education System</title>
	
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
	var desc= document.getElementById("desc").value;
    var notice =document.getElementById("noticeid").value;
	var http=new XMLHttpRequest();
	http.open("POST","SubmitUpdateNotice.php",false);
	http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	http.send("desc="+desc+"&noticeid="+notice);
	document.getElementById("error").innerHTML=http.responseText;
}//SubmitUpdateNotice.php
	
	
	
</script>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title">Welcome
             <?php
			$query=oci_parse($conn,"select * from userinfo where VersityId='".$_SESSION["user"]."'") or die(oci_error());
			oci_execute($query) or die(oci_error());
			$query=oci_fetch_array($query,OCI_ASSOC+OCI_RETURN_NULLS);
			echo " ".$query["FIRSTNAME"]." ".$query["LASTNAME"]."</h2>";
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
if($query["ROLE"]=="Admin")
{
	echo "<li class='icn_new_article'><a href='CreateCourse.php'>Create Course</a></li>";
	}
?>
           
           <li class="icn_edit_article"><a href="CourseStatus.php">View Course List</a></li>
           <?php
if($query["ROLE"]=="Admin")
{
	echo "<li class='icn_view_users'><a href='AssignTeacher.php'>Assign Teacher</a></li>
			<li class='icn_view_users'><a href='AssignStudent.php'>Assign Student</a></li>
			";
	}
?>
           
            
        </ul>
		 <h3>Message</h3>
         <ul class="toggle">
          <li class="icn_edit_article"><a href="ComposeMessage.php">Compose Message</a></li>
            <li class="icn_folder"><a href="InboxMessage.php">Inbox</a></li>
            <li class="icn_folder"><a href="HelpAdmin.php">Help Admin</a></li>
         </ul>
        
         <?php
		 
if($query["ROLE"]=="Teacher")
{
	echo " <h3>Exam</h3>
        <ul class='toggle'><li class='icn_edit_article'><a href='CreateExam.php'>Create Exam</a></li>
            <li class='icn_categories'><a href='ExamStatus.php'>Exam Status</a></li>
            <li class='icn_edit_article'><a href='CreateQues.php'>Create Question</a></li>
			<li class='icn_edit_article'><a href='QuesStatus.php'>View Question</a></li>";
}
if($query["ROLE"]=="user")
   echo "<h3>Exam</h3>
        <ul class='toggle'>";
if($query["ROLE"]=="Teacher" || $query["ROLE"]=="user")
  echo "<li class='icn_settings'><a href='CurrentExam.php'>Current Exam</a></li>";
if($query["ROLE"]=="user")
   echo "<li class='icn_edit_article'><a href='MyMarkStatus.php'>My Mark Status</a></li></ul>";
?>
        
            
            <?php
if($query["ROLE"]=="Teacher")
{
	echo "<li class='icn_security'><a href='MarkStatus.php'>Mark Status</a></li></ul>";
	}
?>
        <h3>User Panel</h3>
        <ul class="toggle">
         <?php
if($query["ROLE"]=="Admin")
{
	echo "<li class='icn_edit_article'><a href='CreateUser.php'>Create User</a></li>";
	echo "<li class='icn_edit_article'><a href='UserList.php'>Change User</a></li>";
	}
?>
        
            <li class="icn_add_user"><a href="UpdateUser.php">Update User</a></li>
            <?php
			
            echo "<li class='icn_profile'><a href='UserDetails.php?ProfileId=".$query["USERID"]."'>Profile</a></li>";
        ?>
		</ul>
        
         <?php
if($query["ROLE"]=="Admin")
{
	echo "<h3>Admin Panel</h3>
        <ul class='toggle'><li class='icn_categories'><a href='BelowMark.php'>Analize Mark</a></li>
	<li class='icn_security'><a href='GradeClose.php'>Close Grade</a></li></ul>";
}
else if($query["ROLE"]=="Teacher")
   echo " <h3>Admin Panel</h3>
        <ul class='toggle'><li class='icn_security'><a href='CourseClose.php'>Close Course</a></li> </ul>";
?>
         
           
            
       <?php
	   if($query["ROLE"]=="user")
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
	   if($query["ROLE"]=="Teacher")
{
       echo "<h3>Management</h3>
        <ul class='toggle'>
            <li class='icn_edit_article'><a href='UploadCourseMatarial.php'>Upload Matarial</a></li>
            <li class='icn_categories'><a href='UploadStatus.php'>View Content</a></li>
        </ul>
		";
		
		
}
if($query["ROLE"]=="Admin")
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
		<article class="module width_3_quarter">
         
			<?php
            $noticedata=oci_parse($conn,"select * from notice where NoticeId=".$NoticeId);
			oci_execute($noticedata);
			$noticedata=oci_fetch_array($noticedata,OCI_ASSOC+OCI_RETURN_NULLS);
			
			?>
            <form id="form1" onSubmit="return false;">
            
            <header><h3>Update Notice</h3></header>
				
                <div class="module_content">
               
						 <fieldset>
                         <input type="hidden" id="noticeid" value="<?php echo $NoticeId; ?>" />
                        <label>Description</label>
                        <textarea style="width:92%; height:350px" id="desc">
                        <?php
                        echo $noticedata["DESCRIPTION"];
						
						?>
                        </textarea>
						
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

