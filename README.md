# gmail-login-api
# Gmail Login API Integration in PHP

This repository contains a web application that demonstrates how to integrate Gmail login using the Google API Client Library in PHP. Users can log in using their Google account and access Gmail data after granting the necessary permissions.

## Prerequisites

- PHP web server (e.g., Apache, Nginx)
- Composer (for installing PHP dependencies)
- MySQL database

## Installation

1. Clone the repository: `git clone https://github.com/Akhand2021/gmail-login-api.git`
2. Navigate to the project directory: `cd gmail-login-api`
3. Install PHP dependencies: `composer require google/apiclient`
4. Create a new project on the [Google Developer Console](https://console.developers.google.com/).
5. Configure the OAuth 2.0 credentials for the project and add the redirect URI (e.g., `http://localhost/gmail-login-api/oauth2callback.php`).
6. Copy the Client ID and Client Secret from the Google Developer Console.
7. Update the `login.php` and `oauth2callback.php` files with your Client ID and Client Secret.
8. Create a MySQL database named `mydb` and run the following SQL query to create the `google_credentials` table:

```sql
CREATE TABLE `google_credentials` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `credentials` JSON NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;
```

9. Start your PHP web server.

## Usage

1. Open the application in your web browser.
2. Click on the "Login with Google" button to authenticate with your Google account.
3. Grant the necessary permissions to access Gmail data.
4. You will be redirected to the dashboard page displaying your basic profile information and Gmail messages.

## Acknowledgments

- [Google API Client Library for PHP](https://github.com/googleapis/google-api-php-client)

Please feel free to customize and use this code in your projects. Happy coding!
![image](https://github.com/Akhand2021/gmail-login-api/assets/104663417/0a646aff-5356-48ef-a28f-6f9f3cb19f7c)


