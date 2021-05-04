<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/authstyles.css">
    <meta charset="UTF-8">
    <title>Authentication Code</title>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" integrity="sha256-ihAoc6M/JPfrIiIeayPE9xjin4UWjsx2mjW/rtmxLM4=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="box">
        <div class = "codytitle">Your authentication code is:</div>
        <div class = "cody">
            <?php session_start();
            echo $_SESSION['transcode'];?>
        </div>
        <div class = "codysub">Valid within 5 minutes!</div>
        <div id="display" class = "display"></div>
        <div id="submitted"> </div>
    </div>
</body>
</html>

<script>

function CountDown(duration, display) {
    if (!isNaN(duration)) {
        var timer = duration, minutes, seconds;

        var interVal = setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            $(display).html("<b>" + minutes  + ":" + seconds + "</b>");
            if (--timer < 0) {
                timer = duration;
                SubmitFunction();
                $(display).empty();
                clearInterval(interVal)
            }
        }, 1000);
    }
}
function SubmitFunction(){
    $('#submitted').html('Code has been expired!');
     
     }
 
      CountDown(300,$('#display'));
   
</script>