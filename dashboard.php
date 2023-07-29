<?php
include "db.php";

// Check if the user is logged in
if (!isset($_SESSION['access_token'])) {
    // Redirect to the login page if the user is not logged in
    header('Location: ./');
    exit;
}

// Your access token
$access_token = $_SESSION['access_token'];
// Set up Google API client
$client = new Google_Client();
$client->setAccessToken($access_token);

// Create a Google_Service_Oauth2 object to interact with the userinfo endpoint
$oauth2 = new Google_Service_Oauth2($client);
try {
    // Call the userinfo endpoint to get the user's basic profile information
    $user = $oauth2->userinfo->get();

} catch (Exception $e) {
    // Handle any errors that might occur
    // echo "Error: " . $e->getMessage();
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
        <img src="<?= $user->picture  ?>" alt="">
        <br>
        <?php
        // Print the user details
        echo "<strong>User ID:</strong> " . $user->id . "<br>";
        echo "<strong>Name:</strong> " . $user->name . "<br>";
        echo "<strong>Email:</strong> " . $user->email . "<br>";
        ?>
        <p>Hello, <?php echo $user->name; ?>! You are now logged in.</p>
        <!-- Add your dashboard content here -->
        <a href="logout.php" class="logout-button">Logout</a>
    </div>
</body>

</html>