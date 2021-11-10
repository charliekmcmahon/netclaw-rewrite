<?php
session_start();


include('db.php'); // Check to make sure the user is actually supposed to be here and isn't a cheating bastard
$sql = "SELECT * FROM `newqueue` WHERE `pos` = 1 AND `playing` = 0 AND `UUID` = ".$_SESSION['UUID']."";
$result = $mysqli->query($sql);
$row = $result->fetch_row();
$value = $row[0] ?? false;
include('closedb.php');
if ($value == true) {
  include('db.php'); // Set the player's status to playing so the users in the queue don't boot them out until after 60 seconds
  $sql = "UPDATE `newqueue` SET `playing` = 1 WHERE `UUID` = '".$_SESSION['UUID']."'";
  $result = $mysqli->query($sql);
  include('closedb.php');
  include('db.php'); // Update the time so that the other users don't kick the user out
    $sql = "UPDATE `newqueue` SET `time` = ".time()." WHERE `UUID` = '".$_SESSION['UUID']."'";
    $result = $mysqli->query($sql);
    include('closedb.php');
}else{
  header("Location: error.php");
}
include('db.php'); // Get the total amount of plays that this machine has had
$sql = "SELECT * FROM `machinestats` WHERE `id` = 2";
$result = $mysqli->query($sql);
$row = $result->fetch_row();
$value = $row[2] ?? false;
include('closedb.php');
$plays = $value;
include('db.php'); // Update the machine's total amount of plays by 1
$sql = "UPDATE `machinestats` SET `plays` = ".($plays + 1)." WHERE `id` = 2";
$result = $mysqli->query($sql);
include('closedb.php');



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <script>
    window.onload = function() {
      apiRequest('go');
    }
  </script>
  <script data-ad-client="ca-pub-6566266673687796" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/main.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="buttons.js"></script>
    <script type="text/javascript" src="control.js"></script>
    <title>NetClaw | Online Claw Machine</title>
  </head>
  <body>
    <div class="title">
      <div id="some_div"></div>
    <script>
        var timeLeft = 30;
        var elem = document.getElementById('some_div');
        var timerId = setInterval(countdown, 1000);

        function countdown() {
            if (timeLeft == -1) {
                clearTimeout(timerId);
                apiRequest('drop');
                doSomething();
            } else {
                elem.innerHTML = timeLeft + ' seconds remaining!';
                timeLeft--;
            }
        }

        function doSomething() {
          setTimeout(function(){
            window.location.href = 'cooldown.php';
         }, 15000);
         clearTimeout(timerId);

        }
    </script>
    <br>
    </div>
  </div>
  <p>Press and hold to move the claw. Release to stop.</p>
  <div class="col-8 p-2 mx-auto">
    <div class="controls mx-auto">
    <nav class="d-pad">
      <a class="up" onmousedown="apiRequest('up');" onmouseup="apiRequest('stop');"></a>
      <a class="right" onmousedown="apiRequest('right');" onmouseup="apiRequest('stop');"></a>
      <a class="down" onmousedown="apiRequest('down');" onmouseup="apiRequest('stop');"></a>
      <a class="left" onmousedown="apiRequest('left');" onmouseup="apiRequest('stop');"></a>
    </nav>
    </div>
  </div>
  <div class="col-8 p-2 mx-auto">
    <div class="controls-2 mx-auto">
      <div class="circle-button position-absolute top-50 start-50 translate-middle">
        <a onclick="apiRequest('drop'), doSomething()" class="circle-button" id="circlebutton">DROP</a>
      </div>
    </div>
  </div>

  <script src="requests.js" type="text/javascript"></script>
  </body>

</html>