<!DOCTYPE html>
<?php



$db_user = "root";
$db_pass = "";
$db_name = "itec100db";

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
$db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['signup'])) {
        if(empty($_POST['unametf']) && empty($_POST['emailtf']) && empty($_POST['passtf']) && empty($_POST['confirmpasstf'])){
            echo "<script> alert('Please fill all the fields!');window.location='register.php'</script>";
        } else {
            if(empty($_POST['unametf'])){
                echo "<script> alert('Please input username!');window.location='register.php'</script>";
            } else {
                if (empty($_POST['emailtf'])){
                    echo "<script> alert('Please input email!');window.location='register.php'</script>";
                } else {
                    if(empty($_POST['passtf'])){
                        echo "<script> alert('Please enter a password!');window.location='register.php'</script>";
                    } else {
                        if(empty($_POST['confirmpasstf'])){
                            echo "<script> alert('Please confirm your password!');window.location='register.php'</script>";
                        } else {
                            $email1 = $_POST['emailtf'];
                            if (filter_var($email1, FILTER_VALIDATE_EMAIL) == false){
                                echo "<script> alert('Invalid email!');window.location='register.php'</script>";
                            } else {
                                if($_POST['passtf'] != $_POST['confirmpasstf']){
                                    echo "<script> alert('Password did not match!');window.location='register.php'</script>";
                                } else {
                                    if (strlen($_POST['passtf']) <8){
                                        echo "<script> alert('Please input more than 8 characters password!');window.location='register.php'</script>";
                                    } else {
                                        if(!preg_match("#[A-Z]#",$_POST['passtf'])){
                                            echo "<script> alert('Please input a password with atleast 1 uppercase!');window.location='register.php'</script>";
                                        } else {
                                            if(!preg_match("#[a-z]#",$_POST['passtf'])){
                                                echo "<script> alert('Please input a password with atleast 1 of lowercase!');window.location='register.php'</script>";
                                            } else {
                                                if(!preg_match("#[0-9]#",$_POST['passtf'])){
                                                    echo "<script> alert('Please input a password with a atleast 1 digit!');window.location='register.php'</script>";
                                                } else {
                                                    if(!preg_match("/[\/'^£:$%&!$*()}{@#;`~?<>,|=_+¬-]/",$_POST['passtf'])){
                                                        echo "<script> alert('Please input a password with atleast 1 special character!');window.location='register.php'</script>";
                                                    } else {
                                                        $user = $_POST['unametf'];
                                                        $email = $_POST['emailtf'];
                                                        $pass2 = $_POST['confirmpasstf'];
                                                                    
                                                        $sql = "INSERT INTO registration (Username, Email, Password) values (?, ?, ?)";
                                                        $stmtinsert = $db->prepare($sql);
                                                        $result = $stmtinsert->execute([$user, $email, $pass2]);
                                            
                                                            if($result){
                                                                echo "<script> alert('Successfully registered');window.location='index.php'</script>";
                                                            } else {
                                                                echo "<script> alert('Sign up unsuccessful');window.location='register.php'</script>";
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
        }
    }
    
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Joms Registration From</title>
        <link rel="stylesheet" href="styles/regstyles.css">
    </head>

    <body>
        <div class="login">
            <h1>Sign up Form</h1>
            <p class="sub">Please fill out all fields!</p>
                <form action="" method="POST">
                    <div class="textfield">
                        <i class="fa fa-user"></i>    
                        <input type="text" name="unametf" placeholder="Enter Username">
                    </div>
                    <div class="textfield">
                        <i class="fa fa-at"></i>
                        <input type="text" name="emailtf" placeholder="Enter Email">
                    </div>
                    <div class="textfield">
                        <i class="fa fa-unlock-alt"></i>
                        <input type="password" name="passtf" placeholder="Enter Password" id="pw">
                    </div>
                    <div class="textfield">
                    <i class="fa fa-lock"></i>
                        <input type="password" name="confirmpasstf" placeholder="Confirm Password" id="pw2">
                    </div>
                    <center><input type="checkbox" onclick="myFunction()"> Show password</center>
                <input class="btn" type="submit" name="signup" value="Sign up">
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

