<?php
$host="localhost";
$db = "netland";
$username = "root";
$password = "";

$dsn= "mysql:host=$host;dbname=$db";
try {
    // create a PDO connection with the configuration data
    $conn = new PDO($dsn, $username, $password);
    
    // display a message if connected to database successfully
    if ($conn) {
        // echo "Connected to the <strong>$db</strong> database successfully!";
    }
} catch (PDOException $e) {
    // report error message
    echo $e->getMessage("");
}
if (isset($_POST["login"])) {
    $informatie = $conn->query("SELECT username, password FROM gebruikers");
    $usernameInput = $_POST["username"];
    $passwordInput = $_POST["password"];
    foreach ($informatie as $row) {
        if ($row["username"] === $usernameInput && $row["password"] === $passwordInput) {
            header("refresh: 0; url=index.php");
            exit("You are being logged in!");
        } else {
            echo "N O P E";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
        .login {
            height: 85vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <div class="login">
        <h1>Netland admin panel</h1>
        <form action="login.php" method="POST">
            <input type="text" value="Username" name="username">
            <input type="text" value="Password" name="password">
            <input type="submit" value="Log in" name="login">
        </form>
    </div>
</body>
</html>