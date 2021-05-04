<?php
session_start();

$db_user = "root";
$db_pass = "";
$db_name = "itec100db";

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
$db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $act_ID = 0;
    $uname = $_SESSION['globaluname'];
    $userID = $_SESSION['globaluserID'];
    $activity = "Logout";
    date_default_timezone_set('Asia/Manila');
    $date = date("m-d-Y");
    $time = date("h:i:s"." a");

    $sql_act = "INSERT INTO activity_log (ActivityID, Activity_UserID, Activity, Activity_Date, Activity_Time) values(?, ?, ?, ?, ?)";
    $stmtinsert_act = $db->prepare($sql_act);
    $result_act = $stmtinsert_act->execute([$act_ID, $userID, $activity, $date, $time]);
    
    echo "<script> alert('Logout Success!');window.location='index.php'</script>";

$db->close();

?>