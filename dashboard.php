<?php
include "db.php";

// Check if the user is logged in
if (!isset($_SESSION['access_token'])) {
    // Redirect to the login page if the user is not logged in
    header('Location: ./');
    exit;
}

// Set up Google API client
$client = new Google_Client();
$client->setAccessToken($_SESSION['access_token']);

// Check if the access token is still valid or needs refreshing
if ($client->isAccessTokenExpired()) {
     // Check if a refresh token is available
     if (isset($_SESSION['access_token'])) {
        // Refresh the access token
        $client->fetchAccessTokenWithRefreshToken($_SESSION['access_token']);
        $_SESSION['access_token'] = $client->getAccessToken();
        $client->setAccessToken($_SESSION['access_token']);
} else {
        // If the refresh token is not available, redirect to the login page
        header('Location: ./');
        exit;
    }
}


// Create a Google_Service_Oauth2 object to interact with the userinfo endpoint
$oauth2 = new Google_Service_Oauth2($client);
try {
    // Call the userinfo endpoint to get the user's basic profile information
    $user = $oauth2->userinfo->get();
} catch (Exception $e) {
    // Handle any errors that might occur
    // You can log or display the error message if needed
    // echo $e->getMessage();
    header('Location: error.php');
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="dashboard-container">
        <h1>Welcome to the Dashboard!</h1>
        <img src="<?= $user->picture ?>" alt="">
        <br>
        <?php
        // Print the user details
        echo "<strong>User ID:</strong> " . $user->id . "<br>";
        echo "<strong>Name:</strong> " . $user->name . "<br>";
        echo "<strong>Email:</strong> " . $user->email . "<br>";
        ?>
        <p>Hello, <?= $user->name ?>! You are now logged in.</p>
        <!-- Add your dashboard content here -->
        <a href="logout.php" class="logout-button">Logout</a>
    </div>
</body>

</html>
