<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php
session_start();
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 5; URL=$url1");
if ($_SESSION["UUID"] == ""){
    $_SESSION["UUID"] = rand(1000000, 9999999);
}
setcookie("user_uuid", $_SESSION["UUID"], time() + (86400 * 30), "/");
include('db.php');
$sql = "SELECT * FROM `banlist` WHERE `uuid` = '".$_SESSION['UUID']."'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row();
    $value = $row[0] ?? false;
    include('closedb.php');
    if ($value == true) {
header('Location: banned.php');
    }
include('db.php');
    $sql = "SELECT * FROM `newqueue` WHERE `UUID` = '".$_SESSION['UUID']."'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row();
    $value = $row[0] ?? false;
    include('closedb.php');
    if ($value == false) {
        // Insert the user
        //Count rows in the table first
    include('db.php'); //Count rows in table
    $sql = "SELECT * FROM `newqueue` WHERE 1";
    $result = $mysqli->query($sql);
    $rows = $result->num_rows;
    include('closedb.php');



        include('db.php');
        $sql = "INSERT INTO `newqueue` VALUES (".($rows + 2).", '".$_SESSION['UUID']."', 0, ".time().")";
        $result = $mysqli->query($sql);
        include('closedb.php');
    }
    else {
        // The user is already in the queue
    }

    include('db.php'); // Make sure the user doesn't get updated if they are supposed to be playing
    $sql = "SELECT * FROM `newqueue` WHERE `pos` = 1 AND `UUID` = '".$_SESSION['UUID']."'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row();
    $value = $row[0] ?? false;
    include('closedb.php');
    if ($value == false) {
    include('db.php'); // Update the time so that the other users don't kick the user out
    $sql = "UPDATE `newqueue` SET `time` = ".time()." WHERE `UUID` = '".$_SESSION['UUID']."'";
    $result = $mysqli->query($sql);
    include('closedb.php');
    }

    include('db.php');//Count rows in the table
    $sql = "SELECT * FROM `newqueue` WHERE 1";
    $result = $mysqli->query($sql);
    $rows = $result->num_rows;
    include('closedb.php');
    include('db.php');//Get the current position of the user
    $sql = "SELECT * FROM `newqueue` WHERE `UUID` = '".$_SESSION['UUID']."'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row();
    $value = $row[0] ?? false;
    $currentpos = $value;
    include('closedb.php');
    include('db.php'); // Remove any users that haven't been active for 15 seconds
    $sql = "DELETE FROM `newqueue` WHERE `time` < ".(time() - 15)." AND NOT `pos` = 1"; 
    $result = $mysqli->query($sql);
    include('closedb.php');
    if ($currentpos == 1){
    include('db.php'); // Check to see if the playing user is still active or not
        $sql = "SELECT * FROM `newqueue` WHERE `pos` = 1";
        $result = $mysqli->query($sql);
        $row = $result->fetch_row();
        $value = $row[3] ?? false;
        $uuidtodelete = $row[1];
        include('closedb.php');
            if ((time() - $value) >= 57) {
                include('db.php'); // Remove that user because they haven't been active in 20 seconds
                $sql = "DELETE FROM `newqueue` WHERE `UUID` = '".$uuidtodelete."'";
                $result = $mysqli->query($sql);
                include('closedb.php');
                header('Location: queue.php'); // Reload the page to re-add the user to the queue
            }
        }
    
    if ($currentpos >= 2){

        include('db.php'); // Check to see if the user in front is still active
        $sql = "SELECT * FROM `newqueue` WHERE `pos` = ".($currentpos - 1)."";
        $result = $mysqli->query($sql);
        $row = $result->fetch_row();
        $value = $row[3] ?? false;
        $uuidtodelete = $row[1];
        include('closedb.php');
        if($row[0] == 1 && $row[2] == 1){
            if ((time() - $value) >= 57) {
                include('db.php'); // Remove that user because they haven't been active in 20 seconds
                $sql = "DELETE FROM `newqueue` WHERE `UUID` = '".$uuidtodelete."'";
                $result = $mysqli->query($sql);
                include('closedb.php');
            }
        }
    include('db.php'); // Check to see if the user in front is still there
    $sql = "SELECT * FROM `newqueue` WHERE `pos` = ".($currentpos - 1)."";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row();
    $value = $row[0] ?? false;
    include('closedb.php');
    if ($value == false) {
        include('db.php'); // Increment the user's position as no one is in that postion anymore
        $sql = "UPDATE `newqueue` SET `pos` = ".($currentpos - 1)." WHERE `UUID` = '".$_SESSION['UUID']."'";
        $result = $mysqli->query($sql);
        include('closedb.php');
    }
}
// Re-count the rows and the current postion as the data may have changed
include('db.php');//Count rows in the table
    $sql = "SELECT * FROM `newqueue` WHERE 1";
    $result = $mysqli->query($sql);
    $rows = $result->num_rows;
    include('closedb.php');
    include('db.php');//Get the current position of the user
    $sql = "SELECT * FROM `newqueue` WHERE `UUID` = '".$_SESSION['UUID']."'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row();
    $value = $row[0] ?? false;
    $currentpos = $value;
    include('closedb.php');

if($currentpos == 1){
    header('Location: player.php');
}

echo "You are number ";
echo ($currentpos - 1);
echo " in the queue</br>";
echo "Your ID: ";
echo $_SESSION["UUID"];
echo "</br>";
echo "</br>";
//echo "This machine has a 35 second coil cooldown after each play.";

?>