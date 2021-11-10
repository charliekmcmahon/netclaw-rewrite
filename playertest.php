<?php
session_start();




?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <script>
window.onload = function() {
  var right = new XMLHttpRequest();
    right.open("GET","http://ramsom.ddns.net:8081/go");
    right.send();
}
  </script>
  <script data-ad-client="ca-pub-6566266673687796" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800&display=swap" rel="stylesheet">
    <script type="text/javascript" src="buttons.js"></script>
    <script type="text/javascript" src="requests.js"></script>
    <script type="text/javascript" src="control.js"></script>
    <title>NetClaw | Online Claw Machine</title>
  </head>
  <body>
    <div class="title">
      <div id="some_div"></div>
    <script>
        var timeLeft = 30;
        right();
        var elem = document.getElementById('some_div');
        var timerId = setInterval(countdown, 1000);

        function countdown() {
            if (timeLeft == -1) {
                clearTimeout(timerId);
                drop();
                doSomething();
            } else {
                elem.innerHTML = timeLeft + ' seconds remaining!';
                timeLeft--;
            }
        }

        function doSomething() {
          setTimeout(function(){
            window.location.href = 'playertest.php';
         }, 15000);
         clearTimeout(timerId);

        }
    </script>
    <br>
    Please do not drop the claw into or around the prize chute.
    <p>
    <p>
    </div>
    <div class="set">

  <div class="top-container">
    <!--<img class="stream" id="stream" style="-webkit-user-select: none;" src="https://us.stream.proxy.netclaw.com.au/chocolate-front" width="614" height="460">-->
  </div>
<div class="controls">
  <nav class="d-pad">
    <a class="up" onmousedown="up()" onmouseup="stop()"></a>
    <a class="right" onmousedown="right()" onmouseup="stop()"></a>
    <a class="down" onmousedown="down()" onmouseup="stop()"></a>
    <a class="left" onmousedown="left()" onmouseup="stop()"></a>
  </nav>
  <div class="circle-button">
    <a onclick="drop(), doSomething()" class="circle-button" id="circlebutton">DROP</a>
  </div>
</div>


    </div>


  </body>

</html>