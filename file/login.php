<?php
session_start();
/*Input: username, password

Use password_verify to check login

If correct:

Save $_SESSION["authenticated_user"]

Save $_SESSION["login_info"]:

IP address: $_SERVER['REMOTE_ADDR']

Browser: $_SERVER['HTTP_USER_AGENT']

Timestamp: date('Y-m-d H:i:s')

If incorrect:

Show error message */


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if user exists in session
    if (isset($_SESSION["users"][$username])) {
        $storedHash = $_SESSION["users"][$username];

        // Verify the password
        if (password_verify($password, $storedHash)) {
            // Correct password: save authenticated session
            $_SESSION["authenticated_user"] = $username;

            // Save login info using $_SERVER
            $_SESSION["login_info"] = [
                "ip" => $_SERVER["REMOTE_ADDR"],
                "browser" => $_SERVER["HTTP_USER_AGENT"],
                "time" => date("Y-m-d H:i:s")
            ];

            header("Location:home.php");
            exit();

        } else {
            echo " Incorrect password!";
        }
    } else {
        echo "Username not found.";
    }

    
   
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
         <label>Enter your username:</label> <br>
            <input type="text" name="username"> <br>
         <label>Enter your password:</label> <br>
             <input type="password" name="password"> <br>
            <input type="submit" name="login" value="login">
    </form>
</body>
</html>