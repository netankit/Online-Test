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
	<title>Evaluate Test Scores</title>
</head>
<body>
	<div id="page" align="center">
		<div id="content" style="width:1000px">
			<div id="logo">
			</div>
			<div id="topheader">
				<div align="center">
					<br />
                                        <h1><b>Spoken Tutorial </b></h1><br />
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
					<span class="titletext">Online Test Evaluation Sheet</span>
					</div>
					<div class="bodytext" style="padding:12px;" align="justify">
					
					<?php
					session_start();
					if(isset ($_SESSION['username']) && ($_SESSION['flag']=='a'||$_SESSION['flag']=='r'))
                                        {
						//Global Variables - include file.
                                                include_once './include/config.inc.php';
                                                global $db, $db_host, $db_user, $db_password,$mailsite,$directory;

                                                //Database Connectivity
                                                include_once './include/db.connect.php';
                                                global $connect;
						
						/*The Page performs the following functions:
						Get the ID details of all the distinct users who appeared for the test.
						Retrive user answer from the tidA table one by one for each user who appeared for the test.
						Retrive Test answer from the tid_ans table.
						Compare the two answers using the strcasecmp() function
						If they do match->update the tidA table column 'points' with value 1 default is set to 0.
						After this the answers given by the students we have to sum up the total number of correct answers- 
						-and store in the testscores table. This can be done by using the aggregate funtions in the SQL Query. 
						The testscore table we have the schema:
						scoreid(PK), date, collid, studid, tid, score
						*/
						
						$tablename=$_SESSION['tablename'];
						$date=$_SESSION['date'];
						$collid=$_SESSION['collid'];
						$tid=$_SESSION['tid'];
						
						$tablename=mysql_real_escape_string($tablename);
						$date=mysql_real_escape_string($date);
						$tid=mysql_real_escape_string($tid);
						
						//Check whether the test is already evaluated
						$query_check="SELECT `tid` FROM `reviewed` WHERE date='$date' AND collid='$collid'";
						$querycheck=mysql_query($query_check);
						$checkrows=mysql_num_rows($querycheck);
						//echo $checkrows;
						
						
						if($checkrows==0)
						{
						//Get the ID details of all the distinct users who appeared for the test.
						$query= "SELECT DISTINCT `studid` FROM `$tablename` WHERE date='$date' AND collid='$collid'";
                                                $queryrev=mysql_query($query);
                                        	$numrows=mysql_num_rows($queryrev);
                                        	
                                        	while ($row=mysql_fetch_array($queryrev))
                                                {
                                         	      $studid[]=$row['studid'];
                                         	}        
                                                
                                                //$studid[] is an array which holds the id numbers of all the students who appered for the test.       
                                                //print_r($studid);                                        
						
						
						///get the total number of students who appeared for the test: $totalstudents
						$totalstudents=count($studid);
						//echo $totalstudents;
						//echo $studid[0];
						
						//Fetching the values from the database from each student 
						
						for ($i=0; $i<$totalstudents; $i++)
						{
							//echo $studid[0];
							$student_id=$studid[$i];
							//echo $student_id; 
							
							//Retrieve user answer from the tidA table one by one for each user who appeared for the test.
							$query_uanswer="SELECT * FROM `$tablename` WHERE date='$date' AND collid='$collid' AND studid='$student_id'";
							$queryuanswer=mysql_query($query_uanswer);
							
							while ($ros_stud=mysql_fetch_array($queryuanswer))
							{
								$quesid[]=$ros_stud['quesid'];
								$answer_student[]=$ros_stud['answer'];
							}
							//$answer_ques[] - This array has all the student answers
							//$quesid[] - This Array has all the question answers
							//The indexes of both these arrays are the same and is very useful.
							
							
							$totalquestions=count($quesid);
							$answertable=$tid.'_ans';
							/*
							print_r($quesid);
							echo "</br>";
							print_r($answer_student);
							*/
							
							//echo "</br>Student ID: $student_id</br>";
							
							//Retrieving Answers from the Testid_ans table for checking for the actual answers
							for($j=0;$j<$totalquestions;$j++)
							{
								$ques_id=$quesid[$j];
								//echo $ques_id;
								
								$query_answer="SELECT * FROM `$answertable` WHERE qid='$ques_id'";
								$queryans=mysql_query($query_answer);
								while ($ans_test=mysql_fetch_array($queryans))
								{
									$answer_test=$ans_test['answer'];
								}
								
								
								//echo "Answer Test for Question is $ques_id: $answer_test</br>";
								//echo "Answer Student: $answer_student[$j]</br>";
								
								$totalanswers=count($answer_test);
								
								//checking whether the student answer matches the test answer
								if(strcasecmp($answer_test,$answer_student[$j])==0)
								{
									//Correct Answer
									//Update query to update  the point column value from 0 to 1 in the TestidA table
									$querypoint="UPDATE `$tablename` SET points='1' WHERE quesid='$ques_id' AND studid='$student_id' AND date='$date' AND collid='$collid'";
									$updatequeryr=mysql_query($querypoint);
								}
								else if (strcasecmp($answer_test,$answer_student[$j])!= 0)
								{
									//Incorrect Answer
									//Update query to update  the point column value to 0 in the TestidA table. The default value is also 0.
									$querypointwrong="UPDATE `$tablename` SET points='0' WHERE quesid='$ques_id' AND studid='$student_id' AND date='$date' AND collid='$collid'";
									$updatequeryw=mysql_query($querypointwrong);
								
								}
								
							}
							
							//Finding the total score for a given student. Here we use the aggregation function SUM  in our query to get the result.
							$query_sum="SELECT SUM(points) FROM `$tablename` WHERE date='$date' AND collid='$collid' AND studid='$student_id'";
							$sumquery=mysql_query($query_sum);
								
							while($sum = mysql_fetch_array($sumquery))
							{
								 $totalscore= $sum['SUM(points)'];
							}
							
							//echo $totalscore;
								
							//Inserting the score obtained in the testscore table.
							//$totalscore - Stores the total score of the given student
								
							$queryscore="INSERT INTO `testscore` VALUES ('', '$date','$collid','$student_id', '$tid', '$totalscore' )";
							$scorequery=mysql_query($queryscore);
							
							unset($quesid);
							unset($answer_student);					
						}
						
						//After the review process is done with then submit an entry into the reviewed table with the information that the test was successfully reviewed
						$queryreviewed="INSERT INTO `reviewed` VALUES ('', '$tid','$date','$collid')";
						$reviewedquery=mysql_query($queryreviewed);
						
						}
						else {
						
						//Test is already reviewed
						//Display the test scores for the given test
						
						}
						
						//Retrieving College name from College Table
						$collegename="SELECT `cname` FROM college WHERE collid='$collid'";
						$query_collegename=mysql_query($collegename);
						while($coll=mysql_fetch_array($query_collegename)){
							$college_name=$coll['cname'];
						}
						
						//Retrieving Test name from onlinelist table
						$testname="SELECT `tname` FROM onlinelist WHERE testcode='$tid'";
						$query_testname=mysql_query($testname);
						while($test=mysql_fetch_array($query_testname)){
							$test_name=$test['tname'];
						}
						
						
						echo "<h3>STUDENT SCORES</h3>TEST: <b>$test_name</b> (ID: $tid) </br> College: <b>$college_name</b> (ID: $collid) </br>Date: <b>$date</b></br>";
						echo "<input type='button' value='Print Page' onclick='window.print()' /></br>";
						$score_display="SELECT * FROM users,testscore WHERE users.uid=testscore.studid AND testscore.date='$date' AND testscore.collid='$collid'";
						$display_query=mysql_query($score_display);
						
						$sno=1;
						echo "
						<table border='1' cellpadding='5'>
						<th> S. NO. </th>
						<th> Student ID. </th>
						<th> Full Name </th>
						<th> Score </th>";
						while ($display=mysql_fetch_array($display_query))
						{
							$stud_scoreid = $display['scoreid'];
							$stud_date = $display['date'];	
							$stud_collid = $display['collid'];	
							$stud_studid = $display['studid'];	
							$stud_tid = $display['tid'];	
							$stud_score = $display['score'];
							$stud_fname=$display['fname'];
							
							//Display the data from the testscore table.
							
							echo"
							
							<tr>
							<td> $sno. </td>
							<td> $stud_studid </td>
							<td> $stud_fname </td>
							<td> $stud_score </td>
							</tr>
							
							";
							$sno++;

						}
						echo "</table>";
						
						/*
						echo "</br><b>Question ID.</b></br>";
						print_r($quesid);
						echo "</br><b>Answer by Students </b></br>";
						print_r($answer_ques);
						echo "</br><b>Answer Test</b></br>";
						print_r($answer_test);
						*/
										
					
					}
					
					else
					{
						echo "You are not authorized to view this page. Please Login!";
					}
					?>					
				</div>
			</div>
			<div id="leftpanel">
				<div align="left" class="graypanel">
                                   <?php
                                    if(isset ($_SESSION['username']) && ($_SESSION['flag']=='a'||$_SESSION['flag']=='r'))
                                                    {
                                                        $pname=$_SESSION['username'];
                                                        echo "Welcome $pname\n";
                                                        echo "<a href='logout.php'> Logout</a>";
                                                        echo"
                                                        </br></br>
                                                        <b>Links:</b></br>";
                                                        
                                                        if($_SESSION['flag']=='a')
                                                        {
                                                        	echo "<a href='./admincc.php'>Home Page</a>";
                                                        }

                                                        elseif($_SESSION['flag']=='r')
                                                        {
                                                        echo "<a href='./review.php'>Home Page</a>";
                                                        }
                                                        
                                                        elseif($_SESSION['flag']=='s')
                                                        {
                                                        echo "<a href='./onlinelist.php'>Home Page</a>";
                                                        }
                                                        
                                                        
                                                        
                                                        
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
