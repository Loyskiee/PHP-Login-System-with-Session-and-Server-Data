<?php
session_start();
 /*If user is authenticated (isset($_SESSION["authenticated_user"]))

Show welcome message

Display their:

IP address

Browser

Login time

Else: redirect to login */

//checks if user is authenticated
if(!isset($_SESSION["authenticated_user"])){
    //redirect if not
    header("Location:login.php");
    exit();
}
//if authenticated, it will get the session
$username = $_SESSION["authenticated_user"];
$login_info = $_SESSION["login_info"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2><?php echo "Hi, Welcome $username"?></h2> <br>
    <p><strong>Your IP Address:</strong> <?php echo $login_info["ip"]; ?></p>   
    <p><strong>Your Browser:</strong> <?php echo $login_info["browser"]; ?></p>
    <p><strong>Login Time:</strong> <?php echo $login_info["time"]; ?></p>
    <form method="post">
        <input type="submit" name="logout" value="logout">
    </form>
    
</body>
</html>
<?php
    if(isset($_POST["logout"])){
        header("Location: logout.php");
        exit();
    }
?>