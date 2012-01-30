<?php
session_start();
if(isset ($_SESSION['username']) && ($_SESSION['flag']=='a'||$_SESSION['flag']=='r'))
{
	echo "Click one of the links from menu shown above.";
}
	else 
		echo "You are not authorized to view this page";

?>
