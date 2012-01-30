<?php
session_start();
if(isset ($_SESSION['username']) && ($_SESSION['flag']=='a'||$_SESSION['flag']=='r'))
{
	
	
	echo "
	<form method='post' action='$PHP_SELF'> 
	<table cellpadding='2'>
	
	<tr>
		<td>
		College ID: 
		</td>
		<td>
		<input type='text' size='40' name='collid'>
		</td>
	</tr>
	
	<tr>
		<td>
		College Name: 
		</td>
		<td>
		<input type='text' size='40' name='cname'>
		</td>
	</tr>
	<tr>
		<td>
		<input type='submit' size='40' name='submit' value='Submit'>
		</td>
	</tr>
	
	</table>
	</form>
	
	";
	
	
	$collid=$_POST['collid'];
	$cname=$_POST['cname'];
	
	include_once './include/config.inc.php';
	global $db, $db_host, $db_user, $db_password,$mailsite,$directory;

	//Database Connectivity
	include_once './include/db.connect.php';
	global $connect;
	
	$collid = mysql_real_escape_string($collid);
	$cname = mysql_real_escape_string($cname);
	
	
	//Check whether the College is already added in the database
	$college_exists="SELECT `collid` FROM college WHERE collid='$collid'";
	$query_college_exists=mysql_query($college_exists);
	$number_result=mysql_num_rows($query_college_exists);
	
	if($number_result==0)
	{
		if ($collid && $cname){
			//Inserting College Id and College Name into the college table
			$myquery="INSERT INTO `college` VALUES ('','$collid', '$cname')";
			$queryques=mysql_query($myquery);
			echo "</br>The $cname with id $collid is successfully added to the database";
		}
		else
			echo "Please Provide both College ID and College name to add details of the college to the database.";
	
	}
	
	else {
		echo "The following College ID. alredy exists in the database. Use a different college ID to register this college.";
	}
	
	
}//User Session if ends here
	else 
		echo " You are not authorised to view this page";


?>
