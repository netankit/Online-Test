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
	<title>Thanks for your Submission</title>
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
					<strong>Thanks a lot for your submission! </strong><br />
					<br />
                                        <?php
                                        /*
                                         * Redirect Server Script - We use this script to create answer table for the test created recently.
                                         */


                                        session_start();
                                        $tid=$_SESSION['testcode'];
                                        if(isset ($_SESSION['username']) && ($_SESSION['flag']=='a'||$_SESSION['flag']=='r'))
                                        {

                                       //Global Variables - include file.
                                       include_once './include/config.inc.php';
                                       global $db, $db_host, $db_user, $db_password,$mailsite,$directory;

                                       //Database Connectivity
                                       include_once './include/db.connect.php';
                                       global $connect;

                                       
                                        

                                       /* NOTE: This code works properly. We are exloring a differnt behaviour
                                        * for answer table. The answer table created using the following code
                                        * creates coulmns dynamically according to each answer submitted i.e. ques1
                                        * has answer stored in the table named testidA  as a seperate column
                                        * with name ans1 and for rest of the questions in columns ans2, ans3 and so on
                                        */

                                        /*

                                        $querytotal="SELECT * from `$tid`";
                                        $totalques=mysql_query($querytotal);
                                        $querycount=mysql_num_rows($totalques);
                                        //echo $querycount;

                                        $anscols="";
                                        for($countloop=1;$countloop<=$querycount;$countloop++){
                                        $ansno='ans'.$countloop;
                                        $ansloop='`'.$ansno.'` TEXT NOT NULL,';
                                        $anscols=$anscols.$ansloop;
                                        }

                                        $anstable=$tid.'A';
                                        $sql_ans = "CREATE TABLE `$db`.`$anstable` (
                                        `ansid` BIGINT(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                                        ".$anscols."
                                        `collid` BIGINT(100) NOT NULL,
                                        `studid` BIGINT(100) NOT NULL,
                                        `date` VARCHAR(15) NOT NULL
                                        )ENGINE = MyISAM;";
                                        //echo $sql_ans;
                                        mysql_query($sql_ans,$connect);
                                        
                                        */

                                        /*
                                         * Code V2.0 to creates a common table for all answers pertaining to specifc test.
                                         * The answer table name remains to be in the format testidA. We tend to reside
                                         * the same set of jobs to other sets as well accordingly.
                                         * The Schema for the table: ansid, quesid, answer, collid, studid, date
                                         * Here we might be usign two primary keys for proper identification: quesid and studid
                                         */

                                        $anstable=$tid.'A';
                                        $sql_ans = "CREATE TABLE `$db`.`$anstable` (
                                        `ansid` BIGINT(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                                        `quesid` BIGINT(100) NOT NULL,
                                        `answer` TEXT NOT NULL,
                                        `points` BIGINT(10) NOT NULL,
                                        `collid` VARCHAR(100) NOT NULL,
                                        `studid` BIGINT(100) NOT NULL,
                                        `date` VARCHAR(15) NOT NULL
                                        )ENGINE = MyISAM;";
                                        //echo $sql_ans;
                                        mysql_query($sql_ans,$connect);

                                        /* Code V2.0 Ends Here*/

                                        if($_SESSION['flag']=='a')
                                            $controlcenter='admincc.php';
                                       elseif($_SESSION['flag']=='r')
                                            $controlcenter='review.php';

                                        echo("Thanks for your Submission. You can now go back to your <a href='$controlcenter'>Control Center</a>.");


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
