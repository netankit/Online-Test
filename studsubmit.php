<!--

## Note : Removing the copyright notice is violation of the GNU Licenses ##
// +----------------------------------------------------------------------+
// +----------------------------------------------------------------------+
// | Developed by Ankit Bahuguna                                          |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GNU - GPL license, |
// | that is bundled with this package in the folder LICENSE, and is      |
// | available through the world-wide-web at                              |
// |	    http://www.gnu.org/licenses/gpl-2.0.html                      |
// | This program is free software; you can redistribute it and/or modify |
// | it under the terms of the GNU General Public License as published by |
// | the Free Software Foundation; either version 2 of the License, or	  |
// | (at your option) any later version.			          |
// |                                                                      |
// | This program is distributed in the hope that it will be useful,      |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of       |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the         |
// | GNU General Public License for more details.                         |
// |                                                                      |
// | You should have received a copy of the GNU General Public License    |
// | along with this program; if not, write to the Free Software          |
// | Foundation, Inc., 59 Temple Place, Suite 330, Boston,                |
// | MA 02111-1307 USA.                 				  |
// +----------------------------------------------------------------------+
// | Author: Ankit Bahuguna <mailankitbahuguna@gmail.com>     		  |
// | Copyright © 2011             					  |
// +----------------------------------------------------------------------+
// +----------------------------------------------------------------------+

-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="author" content="Spoken Tutorial (www.spoken-tutorial.org)" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="images/style.css" type="text/css" />
	<title>Student Submission</title>
</head>
<body>
	<div id="page" align="center">
		<div id="content" style="width:1000px">
			<div id="logo">
			</div>
			<div id="topheader">
				<div align="center">
					<br />
                                        <h1><b>Spoken Tutorial</b></h1><br />
                                </div>
				<div id="toplinks" class="smallgraytext">

				</div>
			</div>
			<div id="menu">
				<div align="right" class="smallwhitetext" style="padding:9px;">

				</div>
			</div>
		<!--
                    <div id="submenu">
				<div align="right" class="smallgraytext" style="padding:9px;">
					<a href="#">Submenu 1</a> | <a href="#">Submenu 2</a> | <a href="#">Submenu 3</a> | <a href="#">Submenu 4</a> | <a href="#">Submenu 5</a> | <a href="#">Submenu 6</a>
				</div>
			</div>
                 -->
	<div id="contenttext">
				<div style="padding:10px">
					<span class="titletext">Online Test Centre!</span>
					</div>
					<div class="bodytext" style="padding:12px;" align="justify">
					<?php
                                            session_start();
                                            //ini_set('session.gc_maxlifetime', 60*60);
                                            //$currentTimeoutInSecs = ini_get('session.gc_maxlifetime');
                                            //echo $currentTimeoutInSecs;
                                                    if(isset ($_SESSION['username']) && ($_SESSION['flag']=='a'||$_SESSION['flag']=='r'||$_SESSION['flag']=='s')){
                                                    $tid=$_SESSION['tid'];
                                                    $collid=$_SESSION['collid'];
                                                    $studid=$_SESSION['uid'];

                                                    //echo "Test ID: $tid <br /> ";
                                                    //echo "College ID: $collid <br /> ";
                                                    //echo "Student ID: $studid <br /> ";
                                                    include_once './include/config.inc.php';
                                                    global $db, $db_host, $db_user, $db_password,$mailsite,$directory;

                                                    //Database Connectivity
                                                    include_once './include/db.connect.php';
                                                    global $connect;

                                                    /* Submit_Code V1.0 - Following code works */

                                                    /*

                                                    $querytotal="SELECT * from `$tid`";
                                                    $totalques=mysql_query($querytotal);
                                                    $querycount=mysql_num_rows($totalques);
                                                    //echo $querycount; //Gets the total number of question in the database.
                                                    //echo "<br />";


                                                    $ans_values='';
                                                    for($countloop=1;$countloop<=$querycount;$countloop++){
                                                    $answernum= "answer".$countloop;
                                                    $answernum = $_POST[$answernum];
                                                    $answernum = mysql_real_escape_string($answernum);
                                                    $answernum="'".$answernum."'";
                                                    //echo $answernum."</br>";
                                                    $ans_values= $ans_values.$answernum.", ";
                                                    //echo $ans_values."</br>";
                                                    }

                                                    
                                                    $timestamp=date("d/m/Y",time());
                                                    //echo $timestamp;
                                                    $insquery=  "INSERT INTO `".$tid.'A'."` VALUES ('', ".$ans_values." '$collid', '$studid', '$timestamp' )";
                                                    //echo $insquery;
                                                    $queryins=mysql_query($insquery);

                                                     */

                                                    /*
                                                     * Submit_Code V2.0 - The following code is used to submit the answers in asnwer table
                                                     * The table used has just one single answer column unlike Submit_code 1.0 where each 
                                                     * answer is submitted to a particular answer column, which is created at the time of
                                                     * creation of the test.
                                                    */

                                                    $querytotal="SELECT * from `$tid`";
                                                    $totalques=mysql_query($querytotal);
                                                    $querycount=mysql_num_rows($totalques);
                                                    //echo $querycount; //Gets the total number of question in the database.
                                                    //echo "<br />";

                                                    $timestamp=date("d/m/Y",time());
                                                    //echo $timestamp;

                                                    for($countloop=1;$countloop<=$querycount;$countloop++){
                                                        
                                                        $quesnum="quesid".$countloop;
                                                        $ques_id=$_POST[$quesnum];
                                                        $answernum= "answer".$countloop;
                                                        $answer = $_POST[$answernum];
                                                        $answer = mysql_real_escape_string($answer);
                                                        $insquery=  "INSERT INTO `".$tid.'A'."` VALUES ('', '$ques_id','$answer','0', '$collid', '$studid', '$timestamp' )";
                                                        //echo $insquery;
                                                        $queryins=mysql_query($insquery);
                                                    }   // End of for loop

                                                    /*End of Submit_Code V2.0*/

                                                      echo "Thanks for submitting your answers. The result will be declared very soon and notified to you! ";

                                                    echo "For Security reasons we have disconnected you from test interface!";
                                                    session_destroy();


                                            }


                                           else 
                                               echo "</br>Please login again to access this page.";
                                        ?>
				</div>
			</div>
			<div id="leftpanel">
				<div align="left" class="graypanel">
                                   <?php
                                    if(isset ($_SESSION['username']) && ($_SESSION['flag']=='a'||$_SESSION['flag']=='r'||$_SESSION['flag']=='s'))
                                                    {
                                                        $pname=$_SESSION['username'];
                                                        echo "Welcome $pname\n";
                                                        echo "<a href='logout.php'> Logout</a>";
                                                    }
                                                    else
                                                    {
                                                        echo "<a href='index.php'> Login</a>";

                                                    }
                                     ?>
                                    </div>
			</div>
			<div id="footer" class="smallgraytext">
				&copy; 2011 | <a href="http://www.spoken-tutorial.org" target="_blank">Spoken Tutorial</a>
			</div>
		</div>
	</div>
</body>
</html>
