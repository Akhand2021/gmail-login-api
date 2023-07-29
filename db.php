<?php 
session_start();
require 'vendor/autoload.php';
// DB connection
$conn = mysqli_connect('localhost','root','','mydb');
if(!$conn){
    // Check if any error in DB connection 
    // echo "DB connection failed: ". mysqli_connect_errno();
}
// Query to fetch credentials from DB
$query = mysqli_query($conn, "SELECT `id`, `credentials` FROM `google_credentials`");
$row = mysqli_fetch_array($query);
// Getting json value from database converting to std array
$data = json_decode($row['credentials']);
$client_id = $data->web->client_id;
$client_secret = $data->web->client_secret;

// Set up Google API client
$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri('http://localhost/gmail-login-api/oauth2callback.php');
$client->addScope('email');
$client->addScope('profile');