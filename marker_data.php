<?php
$dbhost = "127.0.0.1";
$dbuser = "root";
$dbpass = "";
$db = "alarm_kebakaran";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

if(! $conn ) {
    die('Could not connect: ' . mysqli_error());
}

$myArray = array();
if ($result = $conn->query("SELECT * FROM sensor1 where long_1 != 0 and lat_1 != 0")) {
    header('Content-Type: application/json');
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $myArray[] = $row;
    }
    echo json_encode($myArray);
}

$conn->close();
