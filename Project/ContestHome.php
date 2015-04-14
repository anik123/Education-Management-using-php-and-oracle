<?php
define("SECONDS_PER_HOUR", 60*60);
include("connection.php");
   session_start();
  if(!isset($_SESSION["user"]))
         header("Location: http://localhost/myProject/munni/index.php");
else{	
		
	   if(isset($_GET["ContestId"]))
	      $ContestId=$_GET["ContestId"];

}?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Keep Solving</title>
	
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
		<article class="module width_half">
        <div class="module_content">
        <?php
		$data=mysql_query("select * from contest where ContestId=".$ContestId);
		$data=mysql_fetch_array($data);
		$start=date("Y-m-d H:i:s");
		$valu1=explode(":",$data["ContestTime"]);
		$valu2=explode(":",$data["ContestDuration"]);
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
		$hold=$new;
	    $new=$data["ContestDate"]." ".$new;
		$new=date_create($new);
		$new=date_format($new,"Y-m-d H:i:s");
		$end=$data["ContestDate"]." ".$data["ContestTime"];
		
		$end=date_create($end);
		$end=date_format($end,"Y-m-d H:i:s");
		/*
		echo "New : ".$new."<br>";
		echo "Start : ".$start."<br>";
		echo "End : ".$end."<br>";
		*/
		echo "<center> <h3><font style='color:#9999CC'><b>Contest Name : ".$data["ContestName"]."</b></font></h3></center>";
		if($end>$start)
		     echo "<center> <h3><font style='color:#F00'>Contest hasn't start yet</font></h3><br>
			 
			 </center>";
	   else
	   { 
		 if($start>=$end && $start<=$new){
		       echo "<center> <h3><font style='color:#ABD679'>Contest is running</font></h3>
			   <h3><font style='color:#F00'> Contest Will End In : $hold</font></h3>
			   </center>";
		 }
		  else 
		      echo "<center> <h3><font style='color:#F00'>Contest is closed</font></h3>
			 
			  </center>";
		}
		?>
       <!--<center> <h3><font style="color:#F00">Contest Is Closed</font></h3>
       <h4>Will Start After 18:25:36</h4></center>-->
        </div>
        </article><br>
		<div class="clear"></div>
		<article class="module width_half">
			
				<div class="module_content">
                <ul>   
                <table style="width:100%"  class="tablesorter" > 
			    <tbody>

             <?php
			 if($end<=$start){
				$value=mysql_query("select * from contestproblem where ContestId=".$data["ContestId"]);
				while($row=mysql_fetch_array($value)){
				    echo "<tr><td><h3><li><a href='ViewContestProblem.php?ProblemId=".$row["ProblemId"]."&ContestId=".$data["ContestId"]."'>".$row["ProblemName"]."</a></li></h3></td></tr>";
				}
			 }
			 else 
			    echo "<center><h4>You will see problem during and after contest</h4></center>";
				?>
               
                </tbody>
                </table>
                </ul>
				</div>
                
		</article><!-- end of styles article -->
		<div class="spacer"></div>
	</section>


</body>

</html>