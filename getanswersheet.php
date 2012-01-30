<?php
session_start();

if(isset ($_SESSION['username']) && ($_SESSION['flag']=='a'||$_SESSION['flag']=='r'))
{

$tablename=$_SESSION['tablename'];
$date=$_SESSION['date'];
$collid=$_SESSION['collid'];

$q=$_GET["q"];

//Global Include
include_once './include/config.inc.php';
global $db, $db_host, $db_user, $db_password,$mailsite,$directory;

//Database Connectivity
include_once './include/db.connect.php';
global $connect;


$query= "SELECT * FROM `$tablename` WHERE date='$date' AND collid='$collid' AND studid='$q'";
$queryrev=mysql_query($query);
echo "<b>Student Answers </br> </b>";
while ($row=mysql_fetch_array($queryrev))
{
	$ansid=$row['ansid'];
	$quesid=$row['quesid'];
	$answer_ques=$row['answer'];
	echo 'Question ID: '.$quesid.'</br>';
	echo "Answer:</br><textarea rows='3' cols='100'  wrap='physical' disabled='disabled'  style='color: darkblue; background-color: lightyellow'>".$answer_ques.'</textarea></br></br>';
	echo "---------------------------------------------------------------------------------------------------------------------------------</br>";
}
	
} 
else
	echo "You are not Authorized to use this Page";
?>
