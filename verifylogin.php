<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Verify Login</title>
        <link rel="stylesheet" href="styles/verstyles.css">
    </head>
    <body>
        <div class="login" id="login">
            <h1>Verify Login</h1>
            
                <form method="POST" action="" >

                    <div class="textfield">
                        <i class="fa fa-key"></i>
                        <input type="text" name="otptf" placeholder="Enter verification code">
                    </div>
                    
                        <input class="btn" type="submit" name="submit" value="Sign in">
                        <font size="2px"><center>Didn't receive code?</center></font>
                        <center><input class="btn" type="submit" name="resend" value="Resend" styles="border-color: red;"></center>
                </form>
        </div>
    </body>
</html>

<?php
    $db_user = "root";
    $db_pass = "";
    $db_name = "itec100db";

    $db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
    $db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn = mysqli_connect("localhost", "root", "", "itec100db");
    session_start();

    if(isset($_POST['submit'])){
        

        date_default_timezone_set('Asia/Manila');
        $timever = date("h:i:s"." a");

        $intcurrent = strtotime($timever);
        $fltcurrent = date('h.i.s', $intcurrent);

        $otptf = $_POST['otptf'];
        $otp = $_SESSION['transcode'];
        $otpexp = $_SESSION['transexp'];
        
        $sql = mysqli_query($conn, "SELECT count(*) as total from codetable where Code = '".$otptf."' and TimeExpires = '".$otpexp."'") or die (mysqli_error($conn));
        $sql2 = mysqli_query($conn, "SELECT TimeExpires from codetable where Code = '".$otptf."'") or die (mysqli_error($conn));

        $rw = mysqli_fetch_array($sql);
        $rw2 = mysqli_fetch_array($sql2);

        $timeexp = $rw2['TimeExpires'];
        $inttimeexp = strtotime($timeexp);

        $_SESSION['Exp'] = $flttimeexp = date('h.i.s', $inttimeexp);

            if(empty($otptf)){
                echo "<script> alert('Please input verification key to login!');</script>";

            } else {
                    if($rw['total'] > 0){
                        if ($fltcurrent > $flttimeexp){
                            echo "<script> alert('Verification code is expired!');</script>";
                        } else {
                            $act_ID = 0;
                            $uname = $_SESSION['globaluname'];
                            $userID = $_SESSION['globaluserID'];
                            $activity = "Login Success";
                            date_default_timezone_set('Asia/Manila');
                            $date = date("m-d-Y");
                            $time = date("h:i:s"." a");

                            $sql_act = "INSERT INTO activity_log (ActivityID, Activity_UserID, Activity, Activity_Date, Activity_Time) values(?, ?, ?, ?, ?)";
                            $stmtinsert_act = $db->prepare($sql_act);
                            $result_act = $stmtinsert_act->execute([$act_ID, $userID, $activity, $date, $time]);
                            
                            echo "<script> alert('Success!');window.location='Home.php'</script>";
                            
                        } 
                    } else {
                    echo "<script> alert('Invalid key!');</script>";
                    }
            } 
    }

    if(isset($_POST['resend'])){
        $db_user = "root";
        $db_pass = "";
        $db_name = "itec100db";
    
        $db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
        $db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
        $_SESSION['transcode'] = $code = rand(999999, 111111);
        $uname2 = $_SESSION['globaluname'];
    
        date_default_timezone_set('Asia/Manila');
        $date = date("m-d-Y");
        $time = date("h:i:s"." a");
    
        $minutes_to_add = 5;
        $time2 = new DateTime();
        $time2->add(new DateInterval('PT' . $minutes_to_add . 'M'));
        $_SESSION['transexp'] = $timeexp = $time2->format("h:i:s"." a");
        //$_SESSION['transexp'] =  strtotime($timeexp);
    
        $sql = "INSERT INTO codetable (Username, Code, Date, TimeIssued, TimeExpires) values(?, ?, ?, ?, ?)";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$uname2, $code, $date, $time, $timeexp]);
    
        echo '(<script> window.open("authentication.php"); </script>)';
    
    }
?>



