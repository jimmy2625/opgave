<?php

session_start();

//if there is a user with the given user_id then unset that user_id
if(isset($_SESSION['user_id']))
{
	unset($_SESSION['user_id']);
}

//will always redirect to the login screen
header("Location: login.php");
die;