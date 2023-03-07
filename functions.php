<?php

//check if the user is logged in with the given connection
function check_login($con)
{
    //check if there is a user_id inside the session
    if(isset($_SESSION['user_id']))
    {
        //assign it to id if it is in the database
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        //assign the result to the query and the given con
        $result = mysqli_query($con,$query);
        //check if result is true and if there is at least 1 row in the database
        if($result && mysqli_num_rows($result) > 0)
        {
            //assign the result as the user_data
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    //if its not logged in, head back to login.php and die so the code doesnt continue
    header("Location: login.php");
    die;
}