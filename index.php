<?php
session_start();
if(isset($_SESSION['access_token']) && $_SESSION['access_token'] !=''){
    header('Location: dashboard.php');
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login with Google</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h1>Login with Google</h1>
        <form action="login.php" method="post">
            <button type="submit" name="login_with_google" class="google-button">Login with Google</button>
        </form>
    </div>
</body>
</html>
