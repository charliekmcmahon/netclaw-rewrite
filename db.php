<?php
  $db_host = 'ramsom.ddns.net';
  $db_user = 'netclaw-website';
  $db_password = 'Netcl@w123';
  $db_db = 'NetClaw';

  $mysqli = new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db
  );
	
  if ($mysqli->connect_error) {
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
  }
?>