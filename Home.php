<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="stylesheet" href="styles/homestyles.css">
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
</head>
<body>
    <h1>WELCOME!, <label><?php session_start(); echo $_SESSION['globaluname']; ?></label></H1>

    <div class="myaccount">
       
        <label for="settings_icon"> <span name="settings_icon" class="iconify" data-icon="ic:baseline-manage-accounts" data-inline="false"></span>My Account</label>
        <ul class=ulaccount id="ulacc">
            <li><button onclick="showTable()">Activity Logs</button></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <table id="activity_table">
        <tr>
            <th>ActivityID</th>
            <th>Activity_UserID</th>
            <th>Activity</th>
            <th>Activity_Date</th>
            <th>Activity_Time</th>
            <th>UserID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
</body>
</html>

<?php
    $conn = mysqli_connect("localhost", "root", "", "itec100db");
    $notadminID = $userID = $_SESSION['globaluserID'];

    if($_SESSION['globaluname'] == "ADMIN"){
        $sql = "SELECT * FROM `activity_log` INNER JOIN registration ON activity_log.Activity_UserID = registration.UserID ORDER BY activity_log.ActivityID DESC";
        $res=mysqli_query($conn, $sql);
    } else {
        $sql = "SELECT * FROM `activity_log` INNER JOIN registration ON activity_log.Activity_UserID = registration.UserID WHERE registration.UserID=$notadminID ORDER BY activity_log.ActivityID DESC";
        $res=mysqli_query($conn, $sql);
    }

    
        while($row = mysqli_fetch_array($res)){
?>
    <tbody>
        <tr>
            <td> <?php echo $row['ActivityID'] ?> </td>
            <td> <?php echo $row['Activity_UserID'] ?> </td>
            <td> <?php echo $row['Activity'] ?> </td>
            <td> <?php echo $row['Activity_Date'] ?> </td>
            <td> <?php echo $row['Activity_Time'] ?> </td>
            <td> <?php echo $row['UserID'] ?> </td>
            <td> <?php echo $row['Username'] ?> </td>
            <td> <?php echo $row['Email'] ?> </td>
            <td> <?php echo $row['Password'] ?> </td>
        </tr>
    </tbody>
<?php
        }
    echo  "</table>";
 
?>

<script>
    function showTable(){
        document.getElementById("activity_table").style.display="block";
    }
</script>
