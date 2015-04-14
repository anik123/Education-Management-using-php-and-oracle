<?php
include("connection.php");
   session_start();
//if(!isset($_SESSION["user"]))
  //       header("Location: http://localhost/myProject/munni/index.php");
	$_SESSION["user"]="10-15391-1";	
	if(isset($_GET["ProblemId"])){
	  $ProblemId=$_GET["ProblemId"];
	  $ContestId=$_GET["ContestId"];
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
           <li class="icn_tags"><a href="AcmHome.php">Home</a></li>
        </ul>
        
        <h3>Contest</h3>
        <ul class="toggle">
           
           <li class="icn_tags"><a href="<?php echo "ContestHome.php?ContestId=".$ContestId; ?>">Contest Home</a></li>
           <li class="icn_tags"><a href="<?php echo "ContestStatus.php?ContestId=".$ContestId; ?>">Contest Status</a></li>
          <li class="icn_tags"><a href="<?php echo "ContestRankList.php?ContestId=".$ContestId; ?>">Contest Rank List </a></li>
         
           
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
		
		<span id="error"></span>
		<article class="module width_full">
         
			
            <header></header>
				
                <div class="module_content">
                <?php
				$data=mysql_query("select * from contestproblem where ProblemId=".$ProblemId);
				$data=mysql_fetch_array($data);
				?>
                <center>
                <?php
                $countmysql=mysql_query("select * from contestsubmit where SubmitBy='".$_SESSION["user"]."' and ProblemId=$ProblemId and Answer='Accepted'");
				$countmysql=mysql_num_rows($countmysql);
				
				$datatime=mysql_query("select * from contest where ContestId=".$ContestId);
		$datatime=mysql_fetch_array($datatime);
		$start=date("Y-m-d H:i:s");
		$valu1=explode(":",$datatime["ContestTime"]);
		$valu2=explode(":",$datatime["ContestDuration"]);
		$sec=$valu1[2]+$valu2[2];
		$min=$valu1[1]+$valu2[1];
		$hour=$valu1[0]+$valu2[0];
		if(($sec-60)>=0)
		{
			$min=$min+1;
			$sec=$sec-60;
			if(($min-60)>=0)
			{
				$hour=$hour+1;
				$min=$min-60;
				
				}
			}
		$new= $hour.":".$min.":".$sec;
	    $new=$datatime["ContestDate"]." ".$new;
		$new=date_create($new);
		$new=date_format($new,"Y-m-d H:i:s");
		$end=$datatime["ContestDate"]." ".$datatime["ContestTime"];
		
		$end=date_create($end);
		$end=date_format($end,"Y-m-d H:i:s");
		/*
		echo "New : ".$new."<br>";
		echo "Start : ".$start."<br>";
		echo "End : ".$end."<br>";
		*/
		
		if($end<$start){
		 if(($start>=$end && $start<=$new) && $countmysql<=0)
		       echo "<form style='width:40%' method='post' enctype='multipart/form-data' action='SubmitContestSolve.php' ><input type='hidden' value='".$data["ProblemId"]."' name='ProblemId' ><input type='hidden' value='".$ContestId."' name='ContestId' ><input name='a' type='file' /><input type='submit' value='Submit' class='alt_btn'/></form>";
		 
		}
				?>
				</center><br>
               <center><h2><?php echo $data["ProblemName"]; ?></h2>
               <b>Input:</b> standard input<br>
               <b>Output:</b> standard output
               </center>
					<br>
                    <div style=" font:Calibri;
   font-size:14px;"><?php echo $data["Description"]; ?></div><br>
   <h3>Input</h3>
   <div style=" font:Calibri;
   font-size:14px;"><?php echo $data["InputDescription"]; ?> </div>
   <h3>Output</h3>
   <div style=" font:Calibri;
   font-size:14px;"><?php echo $data["OutputDescription"]; ?></div>
    <h3>Sample Input</h3>
   <div style=" font:Calibri;
   font-size:14px;">
<pre>
<?php echo $data["SampleInput"]; ?>
</pre>   
 </div>
    <h3>Sample Output</h3>
   <div style=" font:Calibri;font-size:14px;">
<pre>
<?php echo $data["SampleOutput"]; ?>
</pre>   
<center><a href="<?php echo $data["InputCase"]; ?>">Input Case</a><br><br>

<a href="ContestHome.php?ContestId=<?php echo $ContestId; ?>"><font style="color:#F00;font-size:16px;" ><b> || Contest Home || </b></font></a>
</center>


</div>
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					
					
				</div>
                
			</footer></form>
           
		</article><!-- end of styles article -->
		<div class="spacer"></div>
	</section>


</body>

</html>

