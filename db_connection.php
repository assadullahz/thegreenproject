<?php
function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    // $dbuser = "thegree6_webmaster";
    // $dbpass = "S1f4FX9YQWYg";
    $dbname = "thegree6_web";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die("Connect failed: %s\n" . $conn->error);
    return $conn;
}


function CloseCon($conn)
{
    $conn->close();
}
