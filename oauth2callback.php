<?php
include "db.php";

// If the "code" parameter is present in the URL, exchange it for an access token
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    // echo $_GET['code'];

    if (!isset($token['error'])) {
        $client->setAccessToken($token);
        $_SESSION['access_token'] = $token;
     
        // Redirect to the main application after successful authentication
        header('Location: dashboard.php');
        exit;
    } else {
        // Handle the error (e.g., log or display the error message)
        // For simplicity, we'll redirect to an error page
        header('Location: error.php');
        exit;
    }
}

// If there's an "error" parameter in the URL, the user denied the consent
if (isset($_GET['error'])) {
    // Handle the error accordingly (e.g., log or display the error message)
    // For simplicity, we'll redirect to an error page
    header('Location: error.php');
    exit;
}

// If the user is not logged in, redirect to the login page
if (!isset($_SESSION['access_token'])) {
    header('Location: login.php');
    exit;
}

