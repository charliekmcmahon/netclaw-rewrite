<?php
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
    include('db.php'); // Remove that user because they haven't been active in 20 seconds
    $sql = "INSERT INTO `banlist` VALUES ('".$_POST['uuid']."', '".(time() + $_POST['time'])."')";
    $result = $mysqli->query($sql);
    include('closedb.php');


}
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<form method = "POST" action="adminban.php">
    <input type="text" id="uuid" name="uuid" />
    <input type="text" id="time" name="time" />
    <input type="submit" />
</form>