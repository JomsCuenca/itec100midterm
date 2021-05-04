
<?php
    //for inserting code into database
    $db_user = "root";
    $db_pass = "";
    $db_name = "itec100db";

    $db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
    $db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    /**$sql = "INSERT INTO codetable (Code) values(?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$code]);**/

    //for login database
    $conn = mysqli_connect("localhost", "root", "", "itec100db");
    

    if(isset($_POST['submit'])){


        $uname = $_POST['unametf'];
        $password = $_POST['passtf'];
        
        $sql=mysqli_query($conn, "SELECT count(*) as total from registration where Username = '".$uname."'") or die (mysqli_error($conn));
        $sql2=mysqli_query($conn, "SELECT count(*) as total from registration where Password = '".$password."'") or die (mysqli_error($conn));


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
                            $code = rand(999999, 111111);

                            date_default_timezone_set('Asia/Manila');
                            $date = date("m-d-Y");
                            $time = date("h:i:s"." a");
                            

                            $minutes_to_add = 5;
                            $time2 = new DateTime();
                            $time2->add(new DateInterval('PT' . $minutes_to_add . 'M'));
                            $timeexp = $time2->format("h:i:s"." a");


                            $sql = "INSERT INTO codetable (Username, Code, Date, TimeIssued, TimeExpires) values(?, ?, ?, ?, ?)";
                            $stmtinsert = $db->prepare($sql);
                            $result = $stmtinsert->execute([$uname, $code, $date, $time, $timeexp]);

                            
                            //echo '(<script> window.open("verification.php"); </script>)';
                            echo $code;

                              /**
                            //ENTERRR CODEEEEE
                                function prompt($prompt_msg){
                                    echo("<script type='text/javascript'> var answer = prompt('".$prompt_msg."'); </script>");
                            
                                }
                            
                                //program
                                $prompt_msg = "Please enter verification code.";
                                $codetype = prompt($prompt_msg);
                            
                                //Codeee queryyyy
                                $sql3=mysqli_query($conn, "SELECT count(*) as total1 from codetable where Code = '".$codetype."'") or die (mysqli_error($conn));
                                $rw3 = mysqli_fetch_array($sql3);
                                    if ($rw3['total1'] > 0) {
                                        echo "<script> alert('Login Success');window.location='index.php'</script>";
                                    } else {
                                        echo "<script> alert('Invalid verification code');window.location='index.php'</script>";

                                    }**/

                        } else {
                            echo "<script> alert('Wrong Password!');window.location='index.php'</script>";
                        }
                    } else{
                        echo "<script> alert('User does not exist!');window.location='index.php'</script>";
                    }   
                }
            }
        }         
    }

?>