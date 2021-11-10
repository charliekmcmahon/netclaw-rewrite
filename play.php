<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="playing.css">

<!-- Prohibit unauthorised use -->
<script>
    if(window==window.top) {
        // Not in an iframe
        window.location.replace("https://www.netclaw.com.au");
    }
</script>

<form action="queue.php">
    <input class="btn btn-primary" type="submit" value="Play!" />
</form>

<?php

$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 20; URL=$url1");
include('db.php'); // Remove any users that haven't been active for 15 seconds
    $sql = "DELETE FROM `newqueue` WHERE `time` < ".(time() - 15)." AND NOT `pos` = 1"; 
    $result = $mysqli->query($sql);
    include('closedb.php');

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
}
include('db.php'); //Count rows in table
    $sql = "SELECT * FROM `newqueue` WHERE 1";
    $result = $mysqli->query($sql);
    $rows = $result->num_rows;
    include('closedb.php');
if ($rows != 0){
echo "Users playing: ";
echo $rows;
echo "</br>";
echo "Estimated queue wait time: ";
echo seconds2human((($rows) * 45));
}else{
echo "No users are playing - no wait time</br>";
}
echo "</br>";
echo "Stats:</br>";
echo "Total machine plays: ";
include('db.php'); // Get the total amount of plays that this machine has had
$sql = "SELECT * FROM `machinestats` WHERE `id` = 2";
$result = $mysqli->query($sql);
$row = $result->fetch_row();
$value = $row[2] ?? false;
include('closedb.php');
echo $value;
echo "</br>";



function seconds2human($ss) {
    $s = $ss%60;
    $m = floor(($ss%3600)/60);
    $h = floor(($ss%86400)/3600);
    $d = floor(($ss%2592000)/86400);
    $M = floor($ss/2592000);
    
    if($h != 0){
        if($d != 0){
            if($m != 0){
                return "$M months, $d days, $h hours, $m minutes, $s seconds";
            }
            return "$d days, $h hours, $m minutes, $s seconds";
        }
        return "$h hours, $m minutes, $s seconds";
    }if($m == 1){
    return "$m minute, $s seconds";
    }else{
    return "$m minutes, $s seconds";
    }
    }

?>