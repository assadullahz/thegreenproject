<?php

function OpenCon()
{
    $dbhost = "localhost";
    // $dbuser = "root";
    // $dbpass = "";
    $dbuser =  getenv('DB_USER');
    $dbpass = getenv('DB_PASS');
    $dbname = getenv('DB_NAME');
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die("Connect failed: %s\n" . $conn->error);
    return $conn;
}


function CloseCon($conn)
{
    $conn->close();
}
