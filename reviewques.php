<?php
/*
 * reviewques.php - This file hosts the retrieval of questions from the database. So the only authorised users are: administrators and the reviewers.
 * Please make sure the file is not accessed by any of the student in any case.
 */

session_start();
if(isset ($_SESSION['username']) && ($_SESSION['flag']=='a'||$_SESSION['flag']=='r'))
{
    include_once './include/config.inc.php';
    global $db, $db_host, $db_user, $db_password,$mailsite,$directory;

    //Database Connectivity
    include_once './include/db.connect.php';
    global $connect;

     $tid=$_SESSION['tid'];

     $query="SELECT * FROM `$tid`";
     $queryq=mysql_query($query);
     $countq=mysql_num_rows($queryq);
     $count=1;
     while($myques=mysql_fetch_assoc($queryq))
     {
        $tqid=$myques['qid'];
        $tques=$myques['ques'];
        $top1=htmlspecialchars($myques['op1']);
        $top2=htmlspecialchars($myques['op2']);
        $top3=htmlspecialchars($myques['op3']);
        $top4=htmlspecialchars($myques['op4']);
        $tmcq=$myques['mcq'];

        if ($tmcq=='n'){
        echo "
        Question ID. $tqid.</br>
        <b><textarea rows='8' cols='80' name='question$count' wrap='physical' disabled='disabled'>$tques</textarea></b></br>
        ";
        $count++;
        }

        elseif ($tmcq=='y'){

        echo "
        Question ID. $tqid. $tques</br>";
        if($top1)
            echo "A. $top1<br />";
        if($top2)
            echo "B. $top2<br />";
        if($top3)
            echo "C. $top3<br />";
        if($top4)
            echo "D. $top4<br />
        </br>
        ";
        $count++;
        }
    } //End of While Loop

}


?>
