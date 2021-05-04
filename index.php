<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Joms Login</title>
        <link rel="stylesheet" href="styles/styles.css">
        
    </head>

    <body>
        <div class="login" id="login">
            <h1>Login</h1>
                <form method="POST" action="" >
                    <div class="textfield">
                        <i class="fa fa-user"></i>    
                        <input type="text" name="unametf" placeholder="Enter Username">
                        <!-- pang change ng require text <input type="text" name="unametf" placeholder="Enter Username" required oninvalid="this.setCustomValidity('Please enter your username!')" oninput="this.setCustomValidity('')">-->

                    </div>
                    
                    <div class="textfield">
                        <i class="fa fa-unlock-alt"></i>
                        <input type="password" name="passtf" placeholder="Enter Password" id="pw">
                    </div>
                        <input type="checkbox" onclick="myFunction()"> &nbsp; &nbsp;Show Password
                        <input class="btn" type="submit" name="submit" value="Sign in">
                        <font size="2px"><a href="register.php" style="color:white" target="blank">Sign up</a></font> <input type="submit" value="Forgot Password?" id="forgot" name="forgot_btn">
                </form>
        </div>

        <div id="enter-code-prompt"></div>
        <div id="enter-code-alert"></div>

    
    <script>
        function myFunction() {
            var x = document.getElementById("pw");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }

            function promptFunction() {
                $('#login').simplePrompt({
                    message: "please input code",
                    success: function(result){
                        $('#login').simpleAlert({
                            message: "good"
                        })
                    }, cancel: function(result){
                        $('#login').simpleAlert({
                            message: "bad"
                        })
                    }
                })
            }

            
    </script>
        
    </body>
    

</html>


<?php

    session_start();
    //connection for inserting code into database
    $db_user = "root";
    $db_pass = "";
    $db_name = "itec100db";

    $db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
    $db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //for login database
    $conn = mysqli_connect("localhost", "root", "", "itec100db");
    

    if(isset($_POST['submit'])){


        $_SESSION['globaluname'] = $_POST['unametf'];
        $uname = $_POST['unametf'];
        $password = $_POST['passtf'];

        $sql=mysqli_query($conn, "SELECT count(*) as total from registration where Username = '".$uname."'") or die (mysqli_error($conn));
        $sql2=mysqli_query($conn, "SELECT count(*) as total from registration where Password = '".$password."'") or die (mysqli_error($conn));
        
        $sql3 = mysqli_query($conn, "SELECT UserID from registration where Username = '".$uname."'") or die (mysqli_error($conn));
        $rw3 = mysqli_fetch_assoc($sql3);


        $rw = mysqli_fetch_array($sql);
        $rw2 = mysqli_fetch_array($sql2);

        //$result=mysqli_query($sql);
        if(empty($uname) && empty($password)){
            header("Refresh: 0; url=index.php");
            echo "<script> alert('Please input login information!');window.location='index.php'</script>";
            
        } else {
            if(empty($uname)){
                echo "<script> alert('No username!!');window.location='index.php'</script>";
            } else {
                if(empty($password)){
                    echo "<script> alert('No password!!');window.location='index.php'</script>";
                } else {
                    if($rw['total'] > 0){
                        if($rw2['total'] > 0){
                            //echo '(<script type="text/javascript">location.href = 'verifylogin.php';</script>)';
                            $ID = 0;
                            
                            $_SESSION['transcode'] = $code = rand(999999, 111111);

                            date_default_timezone_set('Asia/Manila');
                            $date = date("m-d-Y");
                            $time = date("h:i:s"." a");
                 
                            $minutes_to_add = 5;
                            $time2 = new DateTime();
                            $time2->add(new DateInterval('PT' . $minutes_to_add . 'M'));
                            $_SESSION['transexp'] = $timeexp = $time2->format("h:i:s"." a");
                            //$_SESSION['transexp'] =  strtotime($timeexp);

                            $sql = "INSERT INTO codetable (ID, Username, Code, Date, TimeIssued, TimeExpires) values(?, ?, ?, ?, ?, ?)";
                            $stmtinsert = $db->prepare($sql);
                            $result = $stmtinsert->execute([$ID, $uname, $code, $date, $time, $timeexp]);


                                //queries for activity log(login)
                                $act_ID = 0;
                                $activity = "Login Attempt";
                                $userID = $rw3['UserID'];
                                $_SESSION['globaluserID'] = $userID;
                                $sql_act = "INSERT INTO activity_log (ActivityID, Activity_UserID, Activity, Activity_Date, Activity_Time) values(?, ?, ?, ?, ?)";
                                $stmtinsert_act = $db->prepare($sql_act);
                                $result_act = $stmtinsert_act->execute([$act_ID, $userID, $activity, $date, $time]);
                            
                            //echo '(<script> window.open("authentication.php"); </script>)';
                            //header("Location: verifylogin.php");
                            echo '<script type="text/javascript">';
                            echo 'window.location.href = "verifylogin.php";';
                            echo 'window.open("authentication.php");';
                            echo '</script>';

                        } else {
                            echo "<script> alert('Wrong Password!');window.location='index.php'</script>";
                        }
                    } else{
                        echo "<script> alert('User does not exist!');window.location='index.php'</script>";
                    }   
                }
            }
        }         
    } else if (isset($_POST['forgot_btn'])){
        $uname = $_POST['unametf'];
       
        if(empty($uname)){
            echo '<script> alert("Please input first your username"); </script>';
        } else {

            $_SESSION['globaluname'] = $_POST['unametf'];
            
            $sql=mysqli_query($conn, "SELECT count(*) as total from registration where Username = '".$uname."'") or die (mysqli_error($conn));
            $rw = mysqli_fetch_array($sql);

            if($rw['total'] > 0){
                $sql3 = mysqli_query($conn, "SELECT UserID from registration where Username = '".$uname."'") or die (mysqli_error($conn));
                $rw3 = mysqli_fetch_assoc($sql3);

                $act_ID = 0;
                $activity = "Change Password Attempt";
                $userID = $rw3['UserID'];
                $_SESSION['globaluserID'] = $userID;
                date_default_timezone_set('Asia/Manila');
                $date = date("m-d-Y");
                $time = date("h:i:s"." a");

                $sql_act = "INSERT INTO activity_log (ActivityID, Activity_UserID, Activity, Activity_Date, Activity_Time) values(?, ?, ?, ?, ?)";
                $stmtinsert_act = $db->prepare($sql_act);
                $result_act = $stmtinsert_act->execute([$act_ID, $userID, $activity, $date, $time]);

                echo '<script> window.location.href = "forgotpassword.php"; </script>';

            } else {
                echo '<script> alert("Username does not exist!"); </script>';
            }
            
        }
        
        
    }

?>




