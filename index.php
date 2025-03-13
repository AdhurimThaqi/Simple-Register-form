<?php

    include("database.php");

    // $username = "Patrick";
    // $password = "rock3";
    // $hash = password_hash($password, PASSWORD_DEFAULT);

    // $sql = "INSERT INTO users(user, password)
    //         VALUES('$username', '$hash')";

    // try{
    //     mysqli_query($connection, $sql);
    //     echo"User added successfully!";
    // }
    // catch(mysqli_sql_exception){
    //     echo "Could not add user!";
    // }

    // $sql = "SELECT * FROM users WHERE user = 'spongebob'";
    // $result = mysqli_query($connection, $sql);

    // if(mysqli_num_rows($result) > 0){
    //    while( $row = mysqli_fetch_assoc($result)){
    //     echo"ID: ".$row["id"]. "<br>";
    //     echo"username: ".$row["user"]. "<br>";
    //     echo"Registration Date: ".$row["register_date"]. "<br>";
    //    }
    // }
    // else{
    //     echo "No user found!";
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
    <h2>Welcome to Fakebook!</h2>
    username:<br>
    <input type="text" name="username"><br>
    password:<br>
    <input type="password" name="password"><br>
    <input type="submit" name ="submit" value="register"><br>
    </form>
</body>
</html>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST,"password", FILTER_SANITIZE_SPECIAL_CHARS);
    
        if(empty($username) || empty($password)){
            echo "Please fill out both username and password!";
        }
        else{
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users(user, password)
                    VALUES('$username', '$hash')";
            try{
                mysqli_query($connection, $sql);
                echo"User added successfully!";
            }
            catch(mysqli_sql_exception){
                echo "Could not add user!";
            }
        }
    }

    mysqli_close($connection);

?>