<?php
include "db.php";

// Get the access token from the session (if available)
$access_token = isset($_SESSION['access_token']) ? $_SESSION['access_token'] : null;

// Destroy the session
session_destroy();

// If there's an access token, revoke it
if ($access_token) {
    try {
        // Set the access token in the client
        $client->setAccessToken($access_token);

        // Revoke the access token
        $client->revokeToken();

        // Optionally, unset the access token from the session
        unset($_SESSION['access_token']);
    } catch (Exception $e) {
        // Handle any errors that might occur during token revocation (optional)
        header('Location: error.php');
        exit;
    }
}

// Redirect to the login page or any other page you want to display after logout
header('Location: ./'); // Change the URL to the desired page after logout
exit;

?>
