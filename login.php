<?php
include "db.php";

// If the "login_with_google" button is clicked, redirect to the Google OAuth consent screen
if (isset($_POST['login_with_google'])) {
    $authUrl = $client->createAuthUrl();
    header('Location: ' . $authUrl);
    exit;
}
?>
