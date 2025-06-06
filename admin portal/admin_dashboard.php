<?php
// Start session
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible=IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Management System</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to external CSS -->
    <style>
        body {
            font-family: Arial, sans-serif; /* Clean font */
            background-color: #f0f0f0; /* Light background */
            margin: 0; /* Remove default margin */
            display: flex;
            flex-direction: column;
            align-items: center; /* Center content */
        }
        .main-form {
            max-width: 800px;
            background-color: #ffffff;
            padding: 20px;
            margin: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .main-form img {
            width: 400px; /* Image width */
            height: auto;
            margin-bottom: 10px;
        }
        .main-form p {
            font-size: 16px;
            color: #333;
        }
        .button-form {
            max-width: 400px;
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            margin: 10px;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .button-form:hover {
            background-color: #45a049; /* Hover effect */
        }
        .button-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
    </style>
</head>
<body>
    <!-- Main Form -->
    <div class="main-form">
        <img src="logomother.jpg" alt="System Logo"> <!-- Replace with actual image path -->
        <p>Welcome to the Admin Management System. This platform enables staff to add items to shop and schedule appointments </p>
    </div>

    <!-- Button Forms -->
    <div class="button-container">
        <a href="additem.html" class="button-form">Add items</a>
        <a href="appointment.html" class="button-form">Appointment</a>
        <a href="index.html" class="button-form">Log Out</a>
    </div>
</body>
</html>
