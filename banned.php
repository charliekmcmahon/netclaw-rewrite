<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php
session_start();
include('db.php');
$sql = "SELECT * FROM `banlist` WHERE `uuid` = '".$_SESSION['UUID']."'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row();
    $value = $row[0] ?? false;
    include('closedb.php');
    if ($value == false) {
        header('Location: index.php');
    }else{
    if ($row[1] >= time()){
        echo "You have been banned for repeatedly dropping the claw into the chute";
        echo "</br>";
        echo "</br>";
        echo "You will be unbanned automatically in ";
        echo ($row[1]-time());
        echo " seconds";
        header("Refresh: 5; URL=index.php");

    }else{
        include('db.php');
        $sql = "DELETE FROM `banlist` WHERE `uuid` = '".$_SESSION['UUID']."'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row();
    $value = $row[0] ?? false;
    include('closedb.php');
    header('Location: queue.php');
    }
    }


?>