<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="playing.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<?php
    setcookie("machine_id", "2", time() + (86400 * 30), "/"); // Set the machine ID for each machine when this page is duplicated
?>
<?php require('navbar.php'); ?>
<div class="container-md">
    <h2 class="mt-4">Netclaw - Play Now</h2>
    <p>Press the 'play' button to join the queue, or feel free to spectate!</p>
    <?php require('toasts.php'); ?>
    <div class="row mb-3">
        <div class="col-sm-8"><!-- Left (large) column -->
            <h4>$MachineName</h4>
            <img class="stream-playing" style='height: 100%; width: 100%; object-fit: contain' src="https://us.stream.proxy.netclaw.com.au/ramsom/maxi-claw"></img>
        </div>
        <div class="col-lg-4"><!-- Right (small) column -->
            <h4>Controls</h4>
            <iframe class="mt-3" src="play.php" style='height: 100%; width: 100%; object-fit: contain'></iframe>
        </div>
    </div>
</div>
<script src="requests.js" type="text/javascript"></script>
<?php require('footer.php') ?>