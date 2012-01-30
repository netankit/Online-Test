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
	<title>Test Review Page</title>
	
	<script type="text/javascript">
	function redirect(){
	    window.location = './evaluate.php';
	}
	
	function showAnswer(str)
	{
	if (str=="")
	  {
	  document.getElementById("txtHint").innerHTML="";
	  return;
	  } 
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET","getanswersheet.php?q="+str,true);
	xmlhttp.send();
	}
	
	
	</script>	
	
	
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
					<span class="titletext">Test Review Central!</span>
					</div>
					<div class="bodytext" style="padding:12px;" align="justify">
                                           <?php
                                            session_start();
                                            if(isset ($_SESSION['username']) && ($_SESSION['flag']=='a'||$_SESSION['flag']=='r'))
                                            {

                                                $date=$_POST['date'];
                                                $collid=$_POST['collid'];
                                                $tid=$_POST['tid'];
                                                $_SESSION['submit']=$_POST['submit'];
                                                $_SESSION['date']=$date;
                                                $_SESSION['tid']=$tid;
                                                $_SESSION['collid'] = $collid;
                                                
                                                
                                                
                                                if ($_SESSION['submit'])
                                                {

                                                    if($_SESSION['date'] && $collid && $_SESSION['tid'])
                                                    {
                                                    
                                                    //Global Variables - include file.
                                                    include_once './include/config.inc.php';
                                                    global $db, $db_host, $db_user, $db_password,$mailsite,$directory;

                                                    //Database Connectivity
                                                    include_once './include/db.connect.php';
                                                    global $connect;
                                                    
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
						
						//Student Answer Sheet
						echo "<h3>STUDENT ANSWER SHEET</h3>TEST: <b>$test_name</b> (ID: $tid) </br> College: <b>$college_name</b> (ID: $collid) </br>Date: <b>$date</b><br/></br>";
                                                    
                                                    
                                                        echo "<b>Test Questions: </b></br>
                                                    <iframe src='./reviewques.php' width='790' height='200'>
                                                    <p>Your browser does not support iframes.</p>
                                                    </iframe>
                                                    ";
                                                       $tablename=$tid.'A';
                                                       $_SESSION['tablename']=$tablename;
                                                       
                                                       
							/*
                                                        
                                                        $querytotal="SELECT * from `$tid`";
                                                        $totalques=mysql_query($querytotal);
                                                        $querycount=mysql_num_rows($totalques);
							
							*/
							echo "
							
							</br> <strong>Evaluate Scores for all the students who appeared for the test</strong>
							</br> <input type='button' name='evaluate' value='Evaluate Scores' onclick='redirect()'>
							
							";
							
                                                        
                                                        
                                                        //Student Answer Sheet code to display the various student answers using an AJAX enabled drop down choosing which the showAnswer() is called.
                                                        $query= "SELECT DISTINCT `studid` FROM `$tablename` WHERE date='$date' AND collid='$collid'";
                                                        $queryrev=mysql_query($query);

                                                        echo "<form>
                                                              <table>
                                                              </br><b>The Drop Down consist of the students who appeared for the above mentioned test.</b>
                                                              <tr>
                                                              <td>Student ID:
                                                              <select name='studselect' onchange='showAnswer(this.value)'>
                                                              <option value=''>Select a Student ID</option>";
                                                        while ($row=mysql_fetch_array($queryrev))
                                                        {
                                                            //$ansid=$row['ansid'];
                                                            //$collid=$row['collid'];
                                                            $studid=$row['studid'];
                                                            //$date=$row['date'];
                                                            //$quesid=$row['quesid'];
                                                            //$answer_ques=$row['answer'];

                                                            /*
                                                            $query_ques= "SELECT `ques` FROM `$tid` WHERE qid='$quesid'";
                                                            $query_ques_out=mysql_query($query_ques);
                                                             */
                                                             
                                                            echo "<option value='$studid'> $studid </option>";
                                                            
                                                            //echo 'Student ID: '.$studid.'</br>';
                                                            //echo 'Question ID: '.$quesid.'</br>';
                                                            //echo 'Question: '.$query_ques_out.'</br>';
                                                            //echo "Answer:</br><textarea rows='6' cols='60'  wrap='physical' disabled='disabled'  style='color: darkblue; background-color: lightyellow'>".$answer_ques.'</textarea></br></br>';
                                                            //echo "----------------------------------------------------------------------------------------------------</br>";
                                                        }
                                                        echo "</select>
                                                              </td>
                                                              </form>
                                                             
                                                             </tr> </table>

                                                             <div id='txtHint'>Answers of the selected student will be displayed here...</div>	 
                                                             ";
                                                    }
                                                }
                                                    else
                                                        echo "Please enter all the details of the test to be Reviewed.";

                                        }
                                        else
                                            echo "You are not authorised to use this page.";
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
