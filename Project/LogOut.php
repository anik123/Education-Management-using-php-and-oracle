<?php
session_start();
unset($_SESSION["user"]);
session_destroy();
echo "<center>Sucessfully Logout<br>";
	echo "Redirecting.. </center>";
	echo "<meta http-equiv='refresh' content='5;url=http://localhost/myProject/munni/index.php'>";
?>