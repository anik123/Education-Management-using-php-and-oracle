<?php
include("connection.php");
   session_start();
if(!isset($_SESSION["user"]))
         header("Location: http://localhost/myProject/munni/index.php");
else{	
	if(isset($_GET["BlogId"]))
	  $BlogId=$_GET["BlogId"];
}
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Keep Solving</title>
	
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
	
	var cate=document.getElementById("cate").value;
	var http=new XMLHttpRequest();
	http.open("POST","SubmitCategory.php",false);
	http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	http.send("cate="+cate);
	document.getElementById("error").innerHTML=http.responseText;
}
function commentvis()
{
	var v=document.getElementById("com");
	if(v.style.visibility=="visible")
	    v.style.visibility="hidden";
	else
	    v.style.visibility="visible";
}
function likevis()
{
	var blog=document.getElementById("blog").value;
	var http=new XMLHttpRequest();
	http.open("POST","LikeCount.php",false);
	http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	http.send("blog="+blog);
	document.getElementById("likeb").value=http.responseText;
	  commentvis();LikeCount.php
	}	
	
	function likestate()
{
	var blog=document.getElementById("blog").value;
	var http=new XMLHttpRequest();
	http.open("POST","LikeStatus.php",false);
	http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	http.send("blog="+blog);
	document.getElementById("likeb").value=http.responseText;
	
	http.open("POST","CommentCount.php",false);
	http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	http.send("blog="+blog);
	document.getElementById("comu").innerHTML=http.responseText;
	
	  // commentvis();LikeCount.phpGetComment.phpPostComment.php
	}
	function likecount()
	{
		var blog=document.getElementById("blog").value;
	var http=new XMLHttpRequest();
		http.open("POST","LikeUserCount.php",false);
	http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	http.send("blog="+blog);
	document.getElementById("likeu").innerHTML=http.responseText;
		}
	function loadcomment()
	{
		var blog=document.getElementById("blog").value;
	var http=new XMLHttpRequest();
	http.open("POST","GetComment.php",false);
	http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	http.send("blog="+blog);
	document.getElementById("show").innerHTML=http.responseText;
	}
	function postcomment()
	{
		var blog=document.getElementById("blog").value;
		var cm=document.getElementById("cm").value;
		if(cm.length<=0)
		  alert('Empty');
		 else{
	         var http=new XMLHttpRequest();
          	http.open("POST","PostComment.php",false);
	       http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	       http.send("blog="+blog+"&cm="+cm);
	       alert(http.responseText);
		 }
		}
</script>

</head>


<body onLoad="likestate(); loadcomment(); likecount();" >

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
		
		
		<?php
		$acmdata=mysql_query("select * from assignacm where VersityId='".$_SESSION["user"]."'");
		$acmdata=mysql_fetch_array($acmdata);
		?>
		<hr/>
        <h3>Home</h3>
        <ul class="toggle">
           <li class="icn_tags"><a href="AcmHome.php">Home</a></li>
        </ul>
        <?php
		if($acmdata["Role"]=="Admin") { 
		echo "<h3>Admin Panel</h3>
        <ul class='toggle'>
           <li class='icn_tags'><a href='CreateProblem.php'>Create Problem</a></li>
           <li class='icn_tags'><a href='CreateCategory.php'>Create Category</a></li>";
		}
		   ?>
        </ul>
        <h3>Problem</h3>
        <ul class="toggle">
           <li class="icn_tags"><a href="ProblemList.php">Problem List</a></li>
           <li class="icn_tags"><a href="ProblemRankList.php">Problem RankList</a></li>
           <li class="icn_tags"><a href="ProblemStatus.php">Problem Status </a></li>
        </ul>
         <h3>Blog</h3>
        <ul class="toggle">
           <li class="icn_tags"><a href="CreateBlog.php">Create Blog</a></li>
           <li class="icn_tags"><a href="BlogStatus.php">Blog Status</a></li>
           <li class="icn_tags"><a href="MyBlogStatus.php">My Blog </a></li>
        </ul>
        <h3>Contest</h3>
        <ul class="toggle">
           
           <li class="icn_tags"><a href="CreateContest.php">Create Contest</a></li>
           <li class="icn_tags"><a href="CreateContestProblem.php">Create Contest Problem</a></li>
          <li class="icn_tags"><a href="MyContestList.php">My Contest List</a></li>
           <li class="icn_tags"><a href="ContestList.php">Contest List</a></li>
           
        </ul>
		 <h3>Switch</h3>
        <ul class="toggle">
           
           <li class="icn_tags"><a href="Home.php">Back</a></li>
         
           
        </ul>
        
		
           
            
       
		
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
		  $bloginfo=mysql_query("select * from blog where BlogId=".$BlogId) or die(mysql_error());
		  $bloginfo=mysql_fetch_array($bloginfo);
		?>
		<span id="error"></span>
		<article class="module width_full">
         
			
            <header><h3></h3></header>
				
                <div class="module_content">
               <center><h1><i><u><?php echo $bloginfo["BlogName"]; ?></u></i></h1>
               <p><font style="font-size:18px;color:#000;font-family:Calibri;"> 
                     <?php echo $bloginfo["Description"]; ?>
               </font></p>
               </center>
               <center>
                    <div style="width:40%">
                    <fieldset>
					<input type="hidden" value="<?php echo $BlogId; ?>" id="blog" />
                    <input type='submit' id='likeb'  onClick="likevis();" class="alt_btn" />  &nbsp;&nbsp;&nbsp;&nbsp;  <input type="submit" value="Comment" onClick="commentvis(); likestate(); likecount();" class="alt_btn" />
                    </fieldset>
                    </div>
				</center>
</div>
						<div class="clear"></div>
				</div>
			
           
		</article>
          <div class="spacer"></div>
          <div class="clear"></div>
          <center>
          <div id="com" style="visibility:hidden;">
          <article class="module width_full">
         
			<div class="module_content">
            <fieldset>
            
            <div style="float:left"><font style="font-size:18px;color:#000;font-family:Calibri;">&nbsp;&nbsp;&nbsp;<span id="likeu"></span> People Like This</font></div> <div style="float:right"> <font style="font-size:18px;color:#000;font-family:Calibri;"> <span id="comu"></span> Comments&nbsp;&nbsp;&nbsp; </font></div>
            </fieldset>
            <fieldset>
            <textarea id="cm" style="width:96%;height:80px">
            </textarea>
           <div class="submit_link">
            
            <input type="submit" style="width:92%" onClick="postcomment(); loadcomment(); likestate();" value="Comment" class="alt_btn" >
            </div>
            </fieldset>
            <hr><br>
            <div id="show" style="width:100%;font-size:16px;color:#F00;">
            
                </div>
                </article></div>
          </center>
        <div class="spacer"></div>
	</section>


</body>

</html>

