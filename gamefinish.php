<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php
session_start();
include('db.php'); // Check to see if the playing user is still active or not
$sql = "SELECT * FROM `newqueue` WHERE `pos` = 1 AND `playing` = 1 AND `UUID` = '".$_SESSION['UUID']."'";
$result = $mysqli->query($sql);
$row = $result->fetch_row();
$value = $row[3] ?? false;
$uuidtodelete = $row[1];
include('closedb.php');
if ($value == true) {
    include('db.php'); // Update the time so that the other users don't kick the user out
    $sql = "UPDATE `newqueue` SET `time` = 0 WHERE `UUID` = '".$_SESSION['UUID']."'";
    $result = $mysqli->query($sql);
    include('closedb.php');
}
header("Location: play.php");
?>