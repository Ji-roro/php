<?php
$conn = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "registration_db");
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash(password: $_POST['password'], algo: PASSWORD_BCRYPT);

    $query = "INSERT INTO users (username, email, password) VALUE ('$username', '$email', '$password')";
    $result = mysqli_query(mysql: $conn, querry: $querry);
    
    if ($result) {
        echo "Registration successfull";
    } else {
        echo "Error: " . mysqli_error(mysql: $conn);
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Registration Form</h2>
    <form action="register.php" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" name="username" required><br>
        <label for="email">Email:</label><br>
        <input type="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" required><br>
        <input type="submit" name="register" value="Register">
    </form>
</body>
</html>