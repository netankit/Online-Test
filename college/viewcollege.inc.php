<?php
session_start();
if(isset ($_SESSION['username']) && ($_SESSION['flag']=='a'||$_SESSION['flag']=='r'))
{
	
	echo "<strong>Following is a list of Colleges enrolled with the Spoken Tutorial Initiative</strong><br /></br>";
	include_once './include/config.inc.php';
	global $db, $db_host, $db_user, $db_password,$mailsite,$directory;

	//Database Connectivity
	include_once './include/db.connect.php';
	global $connect;
	
	$querycollege="SELECT * from `college`";
	$totalcollege=mysql_query($querycollege);
	
	
	echo "
	<table border='1' cellpadding='5'>
	<th> S. NO. </th>
	<th> College ID. </th>
	<th> College Name </th>
	";
	$sno=1;
	while ($row=mysql_fetch_array($totalcollege))
	{
		$collid=$row['collid'];
		$cname=$row['cname'];
		
		echo"
		<tr>
		<td> $sno. </td>
		<td> $collid </td>
		<td> $cname </td>
		</tr>
							
		";
		
		$sno++;
		
	}
	echo "</table>";
}
	else 
		echo " You are not authorised to view this page";

?>
