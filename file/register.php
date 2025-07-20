<?php
    session_start();
    //checks if registered
if(isset($_POST["register"])){
    $username = $_POST["username"];
    $password = $_POST["password"];


    //check if empty inputs
    if(empty($username) || empty($password)){
        echo "Please enter username/password!";
    } else{

        //hash password
        $hashedPassword= password_hash($password, PASSWORD_DEFAULT);
        
        //storing the user
        $_SESSION["users"][$username] = $hashedPassword;

        echo "Registered! <br>";

        //redicrecting if successful
        header("Location: login.php");
        exit();
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
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label>username:</label> <br>
        <input type="text" name="username"> <br>
        <label>password:</label> <br>
        <input type="password" name="password"> <br>
        <input type="submit" name="register" value="Register">
    </form>
</body>
</html>

  
    
