<?php

//define variables to check connection
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_db";

//checks if the connection has been established, if not die and display a failed to connect message
if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{
    die("failed to connect to db");
}