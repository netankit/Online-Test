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
	<title>Add Questions to your Test</title>
        <script type='text/javascript' src='./js/addques.js'></script>

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
					<span class="titletext">Add Questions to your Test!</span>
					</div>
					<div class="bodytext" style="padding:12px;" align="justify">
					<?php
                                        session_start();
                                        $tid=$_SESSION['testcode'];

                                        if(isset ($_SESSION['username']) && ($_SESSION['flag']=='a'||$_SESSION['flag']=='r'))
                                        {
                                        echo"
                                            <b>NOTE: If the question does not contain multiple choices, leave the area blank.</b></br>
                                            <form name='addques' action='addques.php' method='post' onsubmit='return validateform()'>
                                            Question: </br>
                                            <textarea rows='4' cols='80' name='ques' wrap='physical'></textarea></br>
                                            Option A:</br>
                                            <textarea rows='2' cols='80' name='op1' wrap='physical'></textarea></br>
                                            Option B:</br>
                                            <textarea rows='2' cols='80' name='op2' wrap='physical'></textarea></br>
                                            Option C:</br>
                                            <textarea rows='2' cols='80' name='op3' wrap='physical'></textarea></br>
                                            Option D:</br>
                                            <textarea rows='2' cols='80' name='op4' wrap='physical'></textarea></br>
                                            
                                            <b>NOTE:</b> For MCQ type the relevant option IDs.. ie. A,B,C,D seperated with commas no spaces. Similarly for the text answers type in the answer in the box, if more than one answer is there then seperate it using commas and avoid spaces between them.</br>
                                            Answers:</br>
                                            <textarea rows='2' cols='80' name='answer' wrap='physical'></textarea></br>
                                            <table>
                                                <tr>
                                                    <td><input type='submit' name='submit' value='Add Question'></td>
                                                    <td><input type='button' name='doneall' value='Done Adding Questions' onclick='redirect()'></td>
                                                </tr>
                                            </table>
                                            </form>
                                            ";
                                        $submit=$_POST['submit'];
                                        $doneall=$_POST['doneall'];
                                        $ques=$_POST['ques'];
                                        $op1=$_POST['op1'];
                                        $op2=$_POST['op2'];
                                        $op3=$_POST['op3'];
                                        $op4=$_POST['op4'];
                                        $answer=$_POST['answer'];
                                        //echo "$tid, $ques, $op1, $op2, $op3, $op4</br>";
                                        if($submit)
                                        {
                                            include_once './include/config.inc.php';
                                            global $db, $db_host, $db_user, $db_password,$mailsite,$directory;

                                            //Database Connectivity
                                            include_once './include/db.connect.php';
                                            global $connect;

                                            if($op1||$op2||$op3||$op4){
                                                $mcq=y;
                                            }
                                            else
                                                $mcq=n;

                                           //die("Done");
                                           
                                           //Inserting Questions into the testid table as given by the test admin
                                           $myquery="INSERT INTO `$tid` VALUES ('','$ques', '$op1', '$op2', '$op3', '$op4','$mcq')";
                                           $queryques=mysql_query($myquery);
                                           
                                           $selquery="SELECT `qid` FROM `$tid` ORDER BY `qid` DESC LIMIT 1";
                                           $querysel=mysql_query($selquery);
                                           
                                           while ($row=mysql_fetch_array($querysel))
					   {
					   	$qid=$row['qid'];
					   }

                                           
                                           $tid_ans=$tid.'_ans';
                                           //Inserting Answers into the testid_ans table as given by the test admin
                                           $myquery_ans="INSERT INTO `$tid_ans` VALUES ('$qid','$answer')";
                                           $queryquesans=mysql_query($myquery_ans);
                           
                                        }
                                        }
                                        else
                                            echo "You are not authorised to use this page. Please login using an appropriate account.";
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
                                                        <b>Links:</b></br>
                                                        <a href ='./addtest.php'>Add a Test</a></br>
                                                        <a href ='./addreviewer.php'>Add a Reviewer</a></br>
                                                        <a href= './onlinelist.php'>Available Tests</a></br>
                                                        <a href='./activatetest.php'>Activate Test</a></br>
                                                        ";

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
