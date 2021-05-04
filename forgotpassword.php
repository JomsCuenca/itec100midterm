<!DOCTYPE html>
<?php
session_start();
$globaluname = $_SESSION['globaluname'];

$conn = mysqli_connect("localhost", "root", "", "itec100db");

$db_user = "root";
$db_pass = "";
$db_name = "itec100db";

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
$db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if(isset($_POST['change'])) {
                if(empty($_POST['unametf']) && empty($_POST['emailtf']) && empty($_POST['passtf']) && empty($_POST['confirmpasstf'])){
                    echo "<script> alert('Please fill all the fields!');window.location='forgotpassword.php'</script>";
                } else {
                    if(empty($_POST['unametf'])){
                        echo "<script> alert('Please input username!');window.location='forgotpassword.php'</script>";
                    } else {
                        if(empty($_POST['passtf'])){
                            echo "<script> alert('Please enter a password!');window.location='forgotpassword.php'</script>";
                        } else {
                            if(empty($_POST['confirmpasstf'])){
                                echo "<script> alert('Please confirm your password!');window.location='forgotpassword.php'</script>";
                            } else {
                                if($_POST['passtf'] != $_POST['confirmpasstf']){
                                    echo "<script> alert('Password did not match!');window.location='forgotpassword.php'</script>";
                                } else {
                                    if (strlen($_POST['passtf']) <8){
                                        echo "<script> alert('Please input more than 8 characters password!');window.location='forgotpassword.php'</script>";
                                    } else {
                                        if(!preg_match("#[A-Z]#",$_POST['passtf'])){
                                            echo "<script> alert('Please input a password with atleast 1 uppercase!');window.location='forgotpassword.php'</script>";
                                        } else {
                                            if(!preg_match("#[a-z]#",$_POST['passtf'])){
                                                echo "<script> alert('Please input a password with atleast 1 of lowercase!');window.location='forgotpassword.php'</script>";
                                            } else {
                                                if(!preg_match("#[0-9]#",$_POST['passtf'])){
                                                    echo "<script> alert('Please input a password with a atleast 1 digit!');window.location='forgotpassword.php'</script>";
                                                } else {
                                                    if(!preg_match("/[\/'^£:$%&!$*()}{@#;`~?<>,|=_+¬-]/",$_POST['passtf'])){
                                                        echo "<script> alert('Please input a password with atleast 1 special character!');window.location='forgotpassword.php'</script>";
                                                    } else {
                                                        $user = $_POST['unametf'];
                                                        $pass2 = $_POST['confirmpasstf'];
                                                                    
                                                        $sql = "UPDATE registration SET Password=? WHERE Username = '".$user."'";
                                                        $stmtinsert = $db->prepare($sql);
                                                        $result = $stmtinsert->execute([$pass2]);

                                                        $sql3 = mysqli_query($conn, "SELECT UserID from registration where Username = '".$user."'") or die (mysqli_error($conn));
                                                        $rw3 = mysqli_fetch_assoc($sql3);

                                                        $act_ID = 0;
                                                        $activity = "Change Password Success";
                                                        $userID = $rw3['UserID'];
                                                        $_SESSION['globaluserID'] = $userID;
                                                        date_default_timezone_set('Asia/Manila');
                                                        $date = date("m-d-Y");
                                                        $time = date("h:i:s"." a");

                                                        $sql_act = "INSERT INTO activity_log (ActivityID, Activity_UserID, Activity, Activity_Date, Activity_Time) values(?, ?, ?, ?, ?)";
                                                        $stmtinsert_act = $db->prepare($sql_act);
                                                        $result_act = $stmtinsert_act->execute([$act_ID, $userID, $activity, $date, $time]);
                                            
                                                            if($result){
                                                                echo "<script> alert('Password successfully changed!');window.location='index.php'</script>";
                                                            } else {
                                                                echo "<script> alert('Password change unsuccessful');window.location='forgotpassword.php'</script>";
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }   
                        }
                    }
                }
            }   
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Joms Registration From</title>
        <link rel="stylesheet" href="styles/forgotstyles.css">
    </head>

    <body>
        <div class="login">
            <h1>Forgot Password</h1>
            <p class="sub">Please fill out all fields!</p>
                <form action="" method="POST">
                    <div class="textfield">
                        <i class="fa fa-user"></i>    
                        <input type="text" name="unametf" placeholder="Enter Username" value="<?php echo $globaluname; ?>">
                    </div>
                    <div class="textfield">
                        <i class="fa fa-unlock-alt"></i>
                        <input type="password" name="passtf" placeholder="Enter New Password" id="pw">
                    </div>
                    <div class="textfield">
                    <i class="fa fa-lock"></i>
                        <input type="password" name="confirmpasstf" placeholder="Confirm Password" id="pw2">
                    </div>
                    <center><input type="checkbox" onclick="myFunction()"> Show password</center>
                <input class="btn" type="submit" name="change" value="Change Password">
                <font size="2px"><center><a href="index.php" style="color:white" target="blank">Login</a></center></font>

                </form>
            </div>
    <script>
        function myFunction() {
            var x = document.getElementById("pw");
            var y = document.getElementById("pw2");
                if (x.type === "password" && y.type === "password") {
                    x.type = "text";
                    y.type = "text";
                } else {
                    x.type = "password";
                    y.type = "password";
                }     
            }
            
    </script>
        
    </body>

</html>

