<?php

include_once './include/config.inc.php';
global $db, $db_host, $db_user, $db_password,$mailsite,$directory;

//Database Connectivity
include_once './include/db.connect.php';
global $connect;

$query= "SELECT DISTINCT `studid` FROM `2001A` WHERE date='09/01/2012' AND collid='112'";
$queryrev=mysql_query($query);

//echo "$queryrev";

while ($row=mysql_fetch_array($queryrev))
{
$studid=$row['studid'];
echo "$studid";
}

?>
