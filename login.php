<?php

session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //if something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        //check if fields are not empty and the name is not numeric
        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {
            //read from the database, max 1 user
            $query = "select * from users where user_name = '$user_name' limit 1";

            //if the username is the same then true
            $result = mysqli_query($con, $query);

                if($result)
                {
                    //check if the result is true and the database has more than 1 row
                    if($result && mysqli_num_rows($result) > 0)
                    {
                        $user_data = mysqli_fetch_assoc($result);

                        //check if the password is the same as inputted
                        if($user_data['password'] === $password) 
                        {
                            //assign the user_data to the session variable or else the check login will send it back to the login screen
                            $_SESSION['user_id'] = $user_data['user_id'];
                            //redirect to the index/logged in page
                            header("Location: index.php");
                            die;
                        }
                    }
                }
                    
                echo '<script>alert("Incorrect username or password!")</script>';
        } else
        {
            echo '<script>alert("Incorrect username or password!")</script>';
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body class="body">
        <form method="post" class="form">
            <div class="container">
                <div class="img-container">
                    <img src="BC_LOGO.png" style="width:90%">
                </div>
                    <label class="labeltext" for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="user_name" required> <br>

                    <label class="labeltext" for="psw"><b>Password</b></label> 
                    <input type="password" placeholder="Enter Password" name="password" required> 

                    <button type="submit" id="login-button" class='button' value="Login">Login</button>   
            </div>
        </form>
    </body>
</html>