<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styling.css">
    <title>Document</title>
</head>
<body>

<div class="login-container">
        <h2>Login Form</h2><br><br>
        <form class="login-form" action="validate.php" method="post">
            <input type="text" placeholder="Username" name="Username" required>
            <input type="password" placeholder="Password" name="Password" required><br><br>
            <button type="submit">Login</button>
            <p class="registerForm1">If not registered, please click the </p>
            <p class="registerForm"><a href="register.php">Register Now</a></p>
        </form>
</body>
</html>