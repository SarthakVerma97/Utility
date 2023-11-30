<?php
function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "password";
    $db = "PG_LOGS";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);
    // print_r($conn);
    return $conn;
}

function CloseCon($conn)
{
    $conn->close();
}

$conn = OpenCon();
// echo "Connected Successfully";