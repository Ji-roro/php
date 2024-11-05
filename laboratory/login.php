<?php
$conn = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "user_registration");
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query(mysql: $conn, query: $query);
    $user = mysqli_fetch_assoc(result: $result);
    if ($user && password_verify( password: $password, hash: $user['password'])) {
        echo "login successful!";
    } else {
        echo "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <h2>login Form</h2>
    <form action="login.php" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" required><br>
        <input type="submit" name="login" value="login">
    </form>
</body>
</html>